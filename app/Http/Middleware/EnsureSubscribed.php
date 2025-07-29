<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Course;


class EnsureSubscribed
{
public function handle(Request $request, Closure $next)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    // If the route has a course_id or slug
    $course = $request->route('course') ?? $request->route('slug');

    if ($course) {
        $courseId = is_object($course) ? $course->id : Course::where('slug', $course)->value('id');

        $hasSubscribed = $user->subscriptions()->where('course_id', $courseId)->exists();

        if (!$hasSubscribed) {
            return redirect()->route('subscription.notice');
        }
    }

    return $next($request);
}

}
