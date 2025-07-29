<?php

namespace App\Http\Controllers;

use App\Models\Subscription;

use Illuminate\Http\Request;
use App\Models\Course;

class SubscriptionController extends Controller
{
public function showSubscriptionForm()
{
    $courses = Course::where('status', 'published')->get();
    return view('subscription.plans', compact('courses'));
}


public function subscribe(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
    ]);

    $user = auth()->user();

    Subscription::create([
        'user_id' => $user->id,
        'course_id' => $request->course_id,
        'starts_at' => now(),
        'ends_at' => now()->addMonths(1), // or null if unlimited
    ]);

    return redirect()->route('student.dashboard')->with('success', 'Subscribed successfully!');
}


}
