<?php

namespace App\Http\Controllers;

use App\Models\LiveClass;
use App\Models\Course;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    // For schools to list their live classes
    public function index()
    {
        $school = auth()->user();

        // Get courses owned by this school
        $courses = Course::where('school_id', $school->id)->get();

        return view('school.live-classes.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate(['course_id' => 'required|exists:courses,id']);

        $meetingName = 'class-' . uniqid();

        $live = LiveClass::create([
            'course_id' => $request->course_id,
            'school_id' => auth()->id(),
            'meeting_name' => $meetingName
        ]);

        return redirect()->route('live-classes.school', $live->id);
    }

    // View for school to join the live class
    public function join($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        return view('live.school', compact('liveClass'));
    }

    // View for student to join the live class
    public function join2($id)
    {
        $user = auth()->user();
        $liveClass = LiveClass::findOrFail($id);

        // ✅ Check if the student has paid for the course
        $isSubscribed = $user->subscribedCourses()
            ->where('courses.id', $liveClass->course_id)
            ->exists();

        if (!$isSubscribed) {
            abort(403, 'Access denied. You have not subscribed to this course.');
        }

        return view('live.student', compact('liveClass'));
    }

    // List live classes for student
    public function studentIndex()
    {
        $user = auth()->user();

        // Get course IDs the student is subscribed to (paid for)
        $subscribedCourseIds = $user->subscribedCourses()->pluck('courses.id');

        // Get active live classes for those courses
        $liveClasses = LiveClass::with('course')
            ->whereIn('course_id', $subscribedCourseIds)
            ->where('status', 'active')
            ->get();

        return view('student.live_classes.index', compact('liveClasses'));
    }

    // End a live class (for school)
    public function end($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        $liveClass->update(['status' => 'ended']);

        return redirect()->back()->with('success', 'Live class ended successfully.');
    }
}
