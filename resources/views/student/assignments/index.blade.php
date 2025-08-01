@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h3 class="mb-4 text-primary fw-bold">
        📚 My Assignments
    </h3>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($assignments as $assignment)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 text-dark fw-semibold">{{ $assignment->title }}</h5>
                    <small class="text-muted">{{ $assignment->course->title }}</small>
                </div>
                <div>
                    <span class="badge bg-warning text-dark">📅 Due: {{ \Carbon\Carbon::parse($assignment->due_date)->format('M d, Y') }}</span>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-3">{{ $assignment->instructions }}</p>

                @php
                    $submission = $assignment->submissions->where('user_id', auth()->id())->first();
                @endphp

                @if ($submission)
                    <div class="alert alert-success">
                        ✅ You’ve already submitted this assignment.
                    </div>

                    @if($submission->content)
                        <div class="mb-2">
                            <strong>📝 Your Answer:</strong>
                            <div class="bg-light border rounded p-2">{{ $submission->content }}</div>
                        </div>
                    @endif

                    @if($submission->file_path)
                        <div class="mb-2">
                            <strong>📂 Submitted File:</strong>
                            <a href="{{ Storage::url($submission->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                                View File
                            </a>
                        </div>
                    @endif

                @else
                    <button class="btn btn-outline-primary toggle-form-btn mt-3" data-target="#form-{{ $assignment->id }}">
                        🔽 Open Submission Form
                    </button>

                    <div id="form-{{ $assignment->id }}" class="assignment-form mt-3" style="display: none;">
                        <form method="POST" action="{{ route('student.assignments.submit', $assignment->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold">✍️ Answer (Optional)</label>
                                <textarea name="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Write your answer here..."></textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">📎 Upload File (Optional)</label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">
                                📤 Submit Assignment
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-info shadow-sm">
            There are no assignments available at the moment.
        </div>
    @endforelse
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.toggle-form-btn');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const formId = this.getAttribute('data-target');
                const formDiv = document.querySelector(formId);

                if (formDiv.style.display === 'none') {
                    formDiv.style.display = 'block';
                    this.textContent = '🔼 Close Submission Form';
                } else {
                    formDiv.style.display = 'none';
                    this.textContent = '🔽 Open Submission Form';
                }
            });
        });
    });
</script>
@endsection

