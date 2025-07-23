<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionReviewController extends Controller
{
    public function index()
    {
        $submissions = Submission::with(['assignment.course', 'student'])
            ->whereHas('assignment.course', function ($query) {
                $query->where('school_id', auth()->user()->id);
            })
            ->get();

        return view('school.submissions.index', compact('submissions'));
    }

    public function updateStatus(Request $request, Submission $submission)
    {
        $request->validate([
            'status' => 'required|in:pass,fail',
        ]);

        $submission->status = $request->status;
        $submission->save();

        return back()->with('success', 'Student assignment marked as ' . $submission->status);
    }
}
