<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAsset;

use Illuminate\Http\Request;

class CourseAssetController extends Controller
{


public function showForm(Course $course)
{
    return view('school.asset_upload_form', compact('course'));
}


    public function index()
{
    $school = auth()->user();
    $courses = $school->courses;
    return view('school.assets', compact('courses'));
}



public function store(Request $request, Course $course)
{
    $pdfPaths = [];
    $imagePaths = [];
    $videoLinks = [];

    // PDF Uploads
    if ($request->hasFile('pdf')) {
        foreach ($request->file('pdf') as $file) {
            $pdfPaths[] = $file->store('assets/pdfs', 'public');
        }
    }

    // Image Uploads
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $imagePaths[] = $file->store('assets/images', 'public');
        }
    }

    // Video Links
    if ($request->has('video_link')) {
        foreach ($request->input('video_link') as $link) {
            if (!empty($link)) {
                $videoLinks[] = $link;
            }
        }
    }

    CourseAsset::create([
        'course_id'    => $course->id,
        'pdf_paths'    => json_encode($pdfPaths),
        'image_paths'  => json_encode($imagePaths),
        'video_links'  => json_encode($videoLinks),
    ]);

    return back()->with('success', 'Assets uploaded successfully!');
}










// Show only courses that have assets
public function studentIndex()
{
    $user = auth()->user();

    // Only show courses the student is subscribed to and that have assets
    $courses = $user->subscribedCourses()->has('assets')->get();

    return view('student.asset_courses', compact('courses'));
}

// Show all assets under a selected course
public function studentView(Course $course)
{
    $user = auth()->user();

    // Check if the user is subscribed to the course
    if (!$user->subscribedCourses->contains($course->id)) {
        abort(403, 'You are not subscribed to this course.');
    }

    $assets = $course->assets;

    return view('student.asset_list', compact('course', 'assets'));
}




}
