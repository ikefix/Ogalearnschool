<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAsset;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; 
use Illuminate\Http\Request;
use Cloudinary\Transformation\Format;

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


public function store(Request $request, $courseId)
{
    $request->validate([
        'pdf.*' => 'nullable|file|mimes:pdf|max:10240', // 10MB per file
        'image.*' => 'nullable|image|max:10240',
        'video_link.*' => 'nullable|url',
    ]);

    $pdfUrls = [];
    $imageUrls = [];

    // Handle PDF Uploads
    if ($request->hasFile('pdf')) {
        foreach ($request->file('pdf') as $pdfFile) {
            if ($pdfFile->isValid()) {
                $uploadedPdf = Cloudinary::uploadFile($pdfFile->getRealPath(), [
                    'folder' => 'course_assets/pdfs',
         'resource_type' => 'raw',       // Required for non-image like PDF
        'type' => 'upload',             // Must be 'upload', not 'authenticated' or 'private'
        'access_mode' => 'public',      // ✅ Makes it accessible
        'use_filename' => true,
        'unique_filename' => true
                            ]);
                $pdfUrls[] = $uploadedPdf->getSecurePath();
            }
        }
    }

    // Handle Image Uploads
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $imageFile) {
            if ($imageFile->isValid()) {
                $uploadedImage = Cloudinary::upload($imageFile->getRealPath(), [
                    'folder' => 'course_assets/images',
                ]);
                $imageUrls[] = $uploadedImage->getSecurePath();
            }
        }
    }

    // Handle Video Links
    $videoLinks = array_filter($request->input('video_link', []));

    // Save to DB
    CourseAsset::create([
        'course_id'   => $courseId,
        'pdf_paths'   => json_encode($pdfUrls),
        'image_paths' => json_encode($imageUrls),
        'video_links' => json_encode($videoLinks),
    ]);

    return back()->with('success', 'Assets uploaded successfully to Cloudinary.');
}




// public function store(Request $request, $courseId)
// {
//     $request->validate([
//         'pdf.*' => 'nullable|file|mimes:pdf|max:10240', // 10MB
//         'image.*' => 'nullable|image|max:10240',
//         'video_link.*' => 'nullable|url',
//     ]);

//     $pdfUrls = [];
//     $imageUrls = [];

//     // Handle PDF Uploads
//     if ($request->hasFile('pdf')) {
//         foreach ($request->file('pdf') as $pdfFile) {
//             $uploadedPdf = Cloudinary::uploadFile(
//                 $pdfFile->getRealPath(),
//                 ['resource_type' => 'raw'] // For PDFs or non-images
//             );
//             $pdfUrls[] = $uploadedPdf->getSecurePath();
//         }
//     }

//     // Handle Image Uploads
//     if ($request->hasFile('image')) {
//         foreach ($request->file('image') as $imageFile) {
//             $uploadedImage = Cloudinary::upload($imageFile->getRealPath());
//             $imageUrls[] = $uploadedImage->getSecurePath();
//         }
//     }

//     // Handle Video Links
//     $videoLinks = $request->input('video_link', []);
//     $videoLinks = array_filter($videoLinks); // remove empty strings

//     // Save to DB
//     CourseAsset::create([
//         'course_id'   => $courseId,
//         'pdf_paths'   => json_encode($pdfUrls),
//         'image_paths' => json_encode($imageUrls),
//         'video_links' => json_encode($videoLinks),
//     ]);

//     return back()->with('success', 'Assets uploaded successfully to Cloudinary.');
// }




// public function store(Request $request, Course $course)
// {
//     $pdfPaths = [];
//     $imagePaths = [];
//     $videoLinks = [];

//     // PDF Uploads
//     if ($request->hasFile('pdf')) {
//         foreach ($request->file('pdf') as $file) {
//             $pdfPaths[] = $file->store('assets/pdfs', 'public');
//         }
//     }

//     // Image Uploads
//     if ($request->hasFile('image')) {
//         foreach ($request->file('image') as $file) {
//             $imagePaths[] = $file->store('assets/images', 'public');
//         }
//     }

//     // Video Links
//     if ($request->has('video_link')) {
//         foreach ($request->input('video_link') as $link) {
//             if (!empty($link)) {
//                 $videoLinks[] = $link;
//             }
//         }
//     }

//     CourseAsset::create([
//         'course_id'    => $course->id,
//         'pdf_paths'    => json_encode($pdfPaths),
//         'image_paths'  => json_encode($imagePaths),
//         'video_links'  => json_encode($videoLinks),
//     ]);

//     return back()->with('success', 'Assets uploaded successfully!');
// }










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
