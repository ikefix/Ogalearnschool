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

        // ✅ If you moved the courses() relation to School model,
        // this should now fetch courses where this user is the school
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
    $liveClass = LiveClass::findOrFail($id);
    $user = auth()->user();

    // ✅ Check if user is subscribed to this course
    if (!$user->subscribedCourses->contains($liveClass->course_id)) {
        abort(403, 'You are not subscribed to this course.');
    }

    return view('live.student', compact('liveClass'));
}


    // Student live classes listing
    public function studentIndex()
{
    $user = auth()->user();

    // ❗ Use `subscribedCourses`, not `courses`
    $subscribedCourseIds = $user->subscribedCourses->pluck('id');

    $liveClasses = LiveClass::with('course')
        ->whereIn('course_id', $subscribedCourseIds)
        ->where('status', 'active')
        ->get();

    return view('student.live_classes.index', compact('liveClasses'));
}


    public function end($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        $liveClass->update(['status' => 'ended']);

        return redirect()->back()->with('success', 'Live class ended successfully.');
    }
}
