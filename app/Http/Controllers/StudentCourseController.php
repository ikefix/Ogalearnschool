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

    return view('student.course-activities', compact('course', 'activities'));
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
