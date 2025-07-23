@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h3 class="mb-4 text-primary fw-bold">
        📊 Assignment Scores
    </h3>

    @forelse ($submissions as $submission)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 text-dark">{{ $submission->assignment->title }}</h5>
                    <small class="text-muted">{{ $submission->assignment->course->title }}</small>
                </div>
                <div>
                    @if ($submission->status === 'pass')
                        <span class="badge bg-success">✅ Passed</span>
                    @else
                        <span class="badge bg-danger">❌ Failed</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0">
                    <strong>Status:</strong>
                    @if ($submission->status === 'pass')
                        <span class="text-success">Well done! 🎉</span>
                    @else
                        <span class="text-danger">Needs improvement.</span>
                    @endif
                </p>
            </div>
        </div>
    @empty
        <div class="alert alert-info shadow-sm">
            No assignment scores available yet.
        </div>
    @endforelse
</div>
@endsection
