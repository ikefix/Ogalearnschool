@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h3 class="mb-4 text-primary fw-bold">
        📊 Assignment Scores
    </h3>

    @if($submissions->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Assignment Title</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $index => $submission)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $submission->assignment->title }}</td>
                            <td>{{ $submission->assignment->course->title }}</td>
                            <td>
                                @if ($submission->status === 'pass')
                                    <span class="badge bg-success">✅ Passed</span>
                                @else
                                    <span class="badge bg-danger">❌ Failed</span>
                                @endif
                            </td>
                            <td>
                                @if ($submission->status === 'pass')
                                    <span class="text-success">Well done! 🎉</span>
                                @else
                                    <span class="text-danger">Needs improvement.</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info shadow-sm">
            No assignment scores available yet.
        </div>
    @endif
</div>
@endsection
