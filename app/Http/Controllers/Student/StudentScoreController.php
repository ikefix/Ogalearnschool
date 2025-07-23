<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Submission;

class StudentScoreController extends Controller
{
    public function index()
    {
        $submissions = Submission::with('assignment.course')
            ->where('student_id', auth()->id())
            ->whereIn('status', ['pass', 'fail'])
            ->get();

        return view('student.scores.index', compact('submissions'));
    }
}
