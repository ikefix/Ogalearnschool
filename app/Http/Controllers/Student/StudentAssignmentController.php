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

    // Fetch assignments where the course belongs to the student's school
    $assignments = Assignment::whereHas('course', function ($query) use ($student) {
        $query->where('school_id', $student->school_id);
    })->with('course')->get();

    return view('student.assignments.index', compact('assignments'));
}


    public function show(Assignment $assignment)
    {
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
