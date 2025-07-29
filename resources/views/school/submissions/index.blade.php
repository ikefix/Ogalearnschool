@extends('layouts.school')

@section('schoolcontent')
<div class="container py-4">
    <h3 class="mb-4">📩 Assignment Submissions</h3>

    @if($submissions->isEmpty())
        <div class="alert alert-info">No submissions available yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Assignment</th>
                        <th>Course</th>
                        <th>Student</th>
                        <th>Answer</th>
                        <th>Attachment</th>
                        <th>Status</th>
                        <th>Mark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $index => $submission)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $submission->assignment->title }}</td>
                            <td>{{ $submission->assignment->course->title }}</td>
                            <td>{{ $submission->student->name }}</td>
                            <td>{{ $submission->content ?? 'No written answer' }}</td>
                            <td>
                                @if ($submission->file_path)
                                    <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">📎 View File</a>
                                @else
                                    —
                                @endif
                            </td>
                            <td>
                                @if ($submission->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($submission->status == 'pass')
                                    <span class="badge bg-success">✅ Passed</span>
                                @else
                                    <span class="badge bg-danger">❌ Failed</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('school.submissions.updateStatus', $submission->id) }}" class="d-flex gap-2">
                                    @csrf
                                    <button name="status" value="pass" class="btn btn-success" style="padding: 3px 20px;">Pass</button>
                                    <button name="status" value="fail" class="btn btn-danger" style="padding: 3px 20px;">Fail</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
