@extends('layouts.student')

@section('studentcontent')
<div class="container py-5">
    <h2 class="mb-5 text-center text-gradient">🎓 Explore Your Courses</h2>

    @forelse($courses as $course)
        <div class="card course-card mb-4 shadow-lg border-0">
            <div class="row g-0 align-items-center">
                <div class="col-md-2 text-center bg-course-icon d-flex justify-content-center align-items-center">
                    <i class="bi bi-journal-code display-4 text-white"></i>
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h4 class="card-title mb-2">
                            <a href="{{ route('student.show', $course->slug) }}" class="stretched-link text-decoration-none text-dark course-link">
                                {{ $course->title }}
                            </a>
                        </h4>
                        <p class="mb-1 text-muted">
                            👨‍🏫 By <strong>{{ $course->author->name }}</strong> &nbsp;|&nbsp; 👁️ {{ $course->views }} views
                        </p>
                        {{-- <p class="text-secondary small">
                            Keep learning and expanding your knowledge!
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center py-4">
            🚧 No courses available yet. Stay tuned!
        </div>
    @endforelse

    <div class="mt-4 d-flex justify-content-center">
        {{ $courses->links() }}
    </div>
</div>

{{-- Custom Styles --}}
<style>
    .text-gradient {
        font-weight: 800;
        background: linear-gradient(90deg, #6f42c1, #0d6efd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .course-card {
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 25px rgba(13, 110, 253, 0.25);
    }

    .bg-course-icon {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        height: 100%;
        padding: 1rem;
        margin-left: 1rem
    }

    .course-link:hover {
        color: #0d6efd;
        text-decoration: underline;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 600;
    }
</style>

{{-- Bootstrap Icons CDN (optional if not already included) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
