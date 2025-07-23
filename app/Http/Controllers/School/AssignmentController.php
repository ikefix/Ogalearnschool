<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;

class AssignmentController extends Controller
{
    public function index()
    {
        $schoolId = auth()->user()->id; // School's user ID

        // Show only assignments for courses created by this school
        $assignments = Assignment::whereHas('course', function ($query) use ($schoolId) {
            $query->where('school_id', $schoolId);
        })->latest()->get();

        return view('school.assignments.index', compact('assignments'));
    }

    public function create()
    {
        $schoolId = auth()->user()->id;

        // Only courses that belong to the school
        $courses = Course::where('school_id', $schoolId)->get();

        return view('school.assignments.create', compact('courses'));
    }

public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'title' => 'required|string|max:255',
        'instructions' => 'required|string',
        'due_date' => 'required|date|after_or_equal:today',
    ]);

    Assignment::create([
        'course_id' => $request->course_id,
        'title' => $request->title,
        'instructions' => $request->instructions,
        'due_date' => $request->due_date,
    'user_id' => auth()->id(), // this line fixes the error
    ]);

    return redirect()->route('school.assignments.index')->with('success', 'Assignment created successfully.');
}

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);

        // Optional: confirm the assignment belongs to the logged-in school's course
        $schoolId = auth()->id();
        if ($assignment->course->school_id !== $schoolId) {
            abort(403);
        }

        $assignment->delete();

        return redirect()->route('school.assignments.index')->with('success', 'Assignment deleted successfully.');
    }
}
