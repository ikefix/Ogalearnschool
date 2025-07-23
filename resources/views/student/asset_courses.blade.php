@extends('layouts.student')

@section('studentcontent')
<div class="container py-5">
    <h2 class="mb-4 text-center text-gradient">📚 Available Courses with Downloadable Assets</h2>

    @if ($courses->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            🚫 No courses with assets are available at the moment. Check back later!
        </div>
    @else
        <div class="row justify-content-center">
            @foreach ($courses as $course)
                <div class="col-md-8">
                    <div class="card course-card mb-4 shadow-sm border-0">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $course->title }}</h5>
                                <small class="text-muted">Click below to view/download course assets</small>
                            </div>
                            <a href="{{ route('student.assets.view', $course->id) }}" class="btn btn-asset">
                                View Assets <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Custom Styling --}}
<style>
    .text-gradient {
        font-weight: 700;
        background: linear-gradient(90deg, #198754, #0d6efd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .course-card {
        border-left: 6px solid #198754;
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .course-card:hover {
        box-shadow: 0 6px 25px rgba(25, 135, 84, 0.2);
        transform: translateY(-4px);
    }

    .btn-asset {
        background: linear-gradient(135deg, #198754, #0d6efd);
        color: white;
        font-weight: bold;
        border-radius: 30px;
        padding: 0.5rem 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-asset:hover {
        background: #157347;
        text-decoration: none;
    }
</style>

{{-- Bootstrap Icons CDN (if not already loaded) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
