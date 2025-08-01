<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;

class StudentCourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role !== 'student') {
            abort(403);
        }

        $courses = Course::where('school_id', $user->school_id)
            ->where('status', 'published')
            ->latest()
            ->paginate(10);

        return view('student.courses', compact('courses'));
    }

public function show($slug)
{
    $course = Course::where('slug', $slug)->firstOrFail();
    $user = auth()->user();

    // ✅ Check if the user has paid
    if (!$user->hasPaidForCourse($course->id)) {
        return redirect()->route('student.course.preview', $course->slug);
    }

    // ✅ Load course content
    return view('student.show', compact('course'));
}



public function postComment(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'course_id' => $id,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Comment posted successfully!');
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
