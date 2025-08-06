@extends('layouts.student')

@section('studentcontent')

<style>
    .course-card {
        transition: transform 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .course-icon-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(13, 110, 253, 0.9);
        padding: 10px 20px;
        border-radius: 50%;
        font-size: 1.5rem;
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1rem;
        font-weight: 600;
    }

    .course-link:hover {
        color: #0d6efd;
    }
</style>


<div class="container py-5">
    <h2 class="mb-5 text-center text-gradient">🎓 Explore Your Courses</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($courses as $course)
<div class="col">
    <a href="{{ route('student.show', $course->slug) }}" class="text-decoration-none text-dark">
        <div class="card h-100 border-0 shadow-sm rounded course-card">
            <div class="position-relative">
                @if($course->thumbnail)
                    @php
                        $isCloudinary = Str::startsWith($course->thumbnail, ['http://', 'https://']);
                        $thumbnailUrl = $isCloudinary ? $course->thumbnail : asset('storage/' . $course->thumbnail);
                    @endphp
                    <img src="{{ $thumbnailUrl }}" class="card-img-top rounded-top" alt="{{ $course->title }}">
                @else
                    <img src="https://via.placeholder.com/300x200.png?text=No+Image" class="card-img-top rounded-top" alt="No image">
                @endif


                <!-- Icon overlay -->
                <div class="course-icon-overlay">
                    <i class="bi bi-journal-code text-white"></i>
                </div>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title mb-2">
                    {{ \Illuminate\Support\Str::limit($course->title, 50) }}
                </h5>
                <p class="text-muted small mb-1">
                    👨‍🏫 <strong>{{ $course->author->name }}</strong><br>
                    👁️ {{ $course->views }} views
                </p>
            </div>
        </div>
    </a>
</div>

    @empty
        <div class="alert alert-warning text-center py-4 col-12">
            🚧 No courses available yet. Stay tuned!
        </div>
    @endforelse
</div>



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
