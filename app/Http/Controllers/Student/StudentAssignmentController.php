<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;

class StudentAssignmentController extends Controller
{
public function index()
{
    $student = auth()->user();

    // Only fetch assignments from courses the student is subscribed to
    $assignments = Assignment::whereHas('course', function ($query) use ($student) {
        $query->whereIn('id', $student->subscribedCourses->pluck('id'));
    })->with('course')->get();

    return view('student.assignments.index', compact('assignments'));
}



public function show(Assignment $assignment)
{
    $student = auth()->user();

    // Block access if the user isn't subscribed to the course this assignment belongs to
    if (!$student->subscribedCourses->contains($assignment->course_id)) {
        abort(403, 'You are not subscribed to the course for this assignment.');
    }

    return view('student.assignments.show', compact('assignment'));
}


public function submit(Request $request, Assignment $assignment)
{
    $request->validate([
        'content' => 'nullable|string',
        'file' => 'nullable|file|max:10240', // 10MB max
    ]);

    $data = [
        'assignment_id' => $assignment->id,
        'student_id' => auth()->id(),
        'content' => $request->input('content'),
    ];

    if ($request->hasFile('file')) {
        $data['file_path'] = $request->file('file')->store('submissions', 'public');
    }

    Submission::create($data);

    return back()->with('success', 'Assignment submitted!');
}

}
