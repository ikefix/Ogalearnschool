<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = Auth::user();

        // Store the uploaded file
        $filePath = $request->file('profile_photo')->store('profile_photos', 'public');

        // Update the user's profile photo
        $user->profile_photo = $filePath;
        $user->save();

        return back()->with('success', 'Profile picture updated successfully.');
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

