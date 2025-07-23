@extends('layouts.school')

@section('schoolcontent')
<div class="container py-4">
    <h3>📩 Assignment Submissions</h3>

    @foreach ($submissions as $submission)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $submission->assignment->title }} ({{ $submission->assignment->course->title }})</h5>
                <p><strong>Student:</strong> {{ $submission->student->name }}</p>

                <p><strong>Answer:</strong> {{ $submission->content ?? 'No written answer' }}</p>

                @if ($submission->file_path)
                    <p><a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">📎 View Attached File</a></p>
                @endif

                <p><strong>Status:</strong> 
                    @if ($submission->status == 'pending')
                        <span class="text-warning">Pending</span>
                    @elseif ($submission->status == 'pass')
                        <span class="text-success">✅ Passed</span>
                    @else
                        <span class="text-danger">❌ Failed</span>
                    @endif
                </p>

                <form method="POST" action="{{ route('school.submissions.updateStatus', $submission->id) }}">
                    @csrf
                    <div class="d-flex gap-2">
                        <button name="status" value="pass" class="btn btn-success btn-sm">Mark as Pass</button>
                        <button name="status" value="fail" class="btn btn-danger btn-sm">Mark as Fail</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
