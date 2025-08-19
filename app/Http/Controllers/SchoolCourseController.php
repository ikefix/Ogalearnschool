<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class SchoolCourseController extends Controller
{
    public function manage()
    {
        $schoolId = auth()->id();
        $courses = Course::where('school_id', $schoolId)->latest()->paginate(10);


        return view('school.manage_courses', compact('courses'));
    }

    public function publish($id)
    {
        $course = Course::where('school_id', auth()->id())->findOrFail($id);
        $course->status = 'published';
        $course->save();

        return back()->with('success', 'Course published.');
    }

    public function disable($id)
    {
        $course = Course::where('school_id', auth()->id())->findOrFail($id);
        $course->status = 'draft';
        $course->save();

        return back()->with('success', 'Course disabled.');
    }


public function show($slug)
{
    $course = Course::where('slug', $slug)->firstOrFail();
    return view('school.show', compact('course'));
}








public function like($id)
{
    $course = Course::findOrFail($id);
    $course->increment('likes');

    return response()->json(['success' => true, 'likes' => $course->likes]);
}

public function unlike($id)
{
    $course = Course::findOrFail($id);
    if ($course->likes > 0) {
        $course->decrement('likes');
    }

    return response()->json(['success' => true, 'likes' => $course->likes]);
}
}
