<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Str;

class CourseController extends Controller
{

public function create()
{
    if (auth()->user()->role !== 'school') {
        abort(403, 'Only schools can create courses.');
    }

    return view('courses.create');
}

public function store(Request $request)
{
    if (auth()->user()->role !== 'school') {
        abort(403, 'Only schools can create courses.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0', // ✅ Validate price
        'what_youll_learn' => 'nullable|string',
        'course_outcomes' => 'nullable|string',
        'course_questions' => 'nullable|string',
        'description' => 'nullable|string',
        'content' => 'nullable|string',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $thumbnailPath = $request->hasFile('thumbnail')
        ? $request->file('thumbnail')->store('thumbnails', 'public')
        : null;

    Course::create([
        'school_id' => auth()->id(),
        'author_id' => auth()->id(),
        'title' => $request->title,
        'slug' => Str::slug($request->title) . '-' . uniqid(),
        'price' => $request->price, // ✅ Save price

        'what_youll_learn' => $request->what_youll_learn,
        'course_outcomes' => $request->course_outcomes,
        'course_questions' => $request->course_questions,
        'description' => $request->description,
        'thumbnail' => $thumbnailPath,
        'content' => $request->content,

        'status' => 'draft',
    ]);

    return redirect()->route('courses.create')->with('success', 'Course created successfully.');
}



}



