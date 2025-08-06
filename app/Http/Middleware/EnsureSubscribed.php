<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class EnsureSubscribed
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Get course ID via route binding or slug
        $courseParam = $request->route('course') ?? $request->route('slug');
        $courseId = is_object($courseParam)
            ? $courseParam->id
            : Course::where('slug', $courseParam)->value('id');

        // Check if the student has already paid for this course
        $hasPaid = $user->coursePayments()
            ->where('course_id', $courseId)
            ->where('status', 'success')
            ->exists();

        if (!$hasPaid) {
            return redirect()->route('student.course.preview', ['slug' => Course::findOrFail($courseId)->slug])
                ->with('error', 'You need to pay for this course to access it.');
        }

        return $next($request);
    }
}
