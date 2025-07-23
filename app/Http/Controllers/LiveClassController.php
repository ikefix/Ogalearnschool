<?php

namespace App\Http\Controllers;

use App\Models\LiveClass;
use App\Models\Course;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    public function index()
    {
        $school = auth()->user();
        $courses = $school->courses; // assuming relation exists
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

    public function join($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        return view('live.school', compact('liveClass'));
    }

        public function join2($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        return view('live.student', compact('liveClass'));
    }


    public function studentIndex()
    {
        $liveClasses = LiveClass::with('course')
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
