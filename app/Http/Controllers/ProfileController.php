<?php

namespace App\Http\Controllers;

use App\Helpers\DriveUploadHelper;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function upload(Request $request)
{
    $request->validate([
        'profile_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ]);

    $user = Auth::user();

    // Upload to Cloudinary and get secure URL
    $uploadedFileUrl = Cloudinary::upload($request->file('profile_photo')->getRealPath(), [
        'folder' => 'profile_photos',
        'public_id' => 'user_' . $user->id . '_profile'
    ])->getSecurePath();

    // Save the URL in the database
    $user->profile_photo = $uploadedFileUrl;
    $user->save();

    return back()->with('success', 'Profile photo uploaded to Cloudinary successfully.');
}

    public function studentForm()
    {
        return view('student.profile-picture');
    }

    public function schoolForm()
    {
        return view('school.profile-picture');
    }
    

public function ChatForm()
{
    return view('school.chat-room');
}

public function CommentForm()
{
    return view('school.manage_courses');
}

    public function delete()
{
    $user = Auth::user();

    if ($user->profile_photo && \Storage::disk('public')->exists($user->profile_photo)) {
        \Storage::disk('public')->delete($user->profile_photo);
    }

    $user->profile_photo = null;
    $user->save();

    return back()->with('success', 'Profile picture deleted successfully.');
}


}

