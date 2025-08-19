<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Course;
use App\Models\CoursePayment;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Show activities for students
public function index()
{
    $activities = Activity::orderBy('activity_date', 'asc')->get();

    $events = $activities->map(function ($activity) {
        return [
            'title' => $activity->title,
            'start' => $activity->activity_date,
            'description' => $activity->description,
        ];
    });

    return view('student.activities', [
        'activities' => $activities,
        'events' => $events,
        'todayActivities' => $activities->where('activity_date', now()->toDateString())
    ]);
}


    // Admin view (form + list)
public function manage()
{
    $courses = Course::all();
    $activities = Activity::with('course')->latest()->get();
    return view('school.activities', compact('activities', 'courses'));
}


    // Store new activity
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'activity_date' => 'required|date',
        ]);

        Activity::create($request->all());

        return redirect()->back()->with('success', 'Activity added successfully!');
    }

    // Delete activity
    public function destroy($id)
    {
        Activity::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Activity deleted successfully!');
    }



    public function myCourses()
{
    $courseIds = CoursePayment::where('student_id', auth()->id())
        ->where('status', 'success')
        ->pluck('course_id');

    $courses = Course::whereIn('id', $courseIds)->get();

    return view('student.my-courses', compact('courses'));
}


public function showCourseActivities($id) {
    $course = Course::findOrFail($id);

    // ensure student has paid
    $hasPaid = CoursePayment::where('student_id', auth()->id())
        ->where('course_id', $id)
        ->where('status', 'success')
        ->exists();

    if (! $hasPaid) {
        return redirect()->route('student.my-courses')
            ->with('error', 'You must pay for this course to see activities.');
    }

    $activities = $course->activities()->orderBy('activity_date')->get();

    // Build events array for calendar
    $events = $activities->map(function ($activity) {
        return [
            'title' => $activity->title,
            'start' => $activity->activity_date,
            'description' => $activity->description,
        ];
    });

    // Filter today's activities
    $today = now()->toDateString();
    $todayActivities = $activities->filter(function ($activity) use ($today) {
        return $activity->activity_date == $today;
    });

    return view('student.activities', compact('course', 'events', 'todayActivities'));
}

}
