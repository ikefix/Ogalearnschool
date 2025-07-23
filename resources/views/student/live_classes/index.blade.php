@extends('layouts.student')

@section('studentcontent')
<div class="container py-5">
    <h2 class="mb-4 text-center text-gradient">📺 Live Classes Available</h2>

    @if($liveClasses->isEmpty())
        <div class="alert alert-warning text-center">
            😕 No live classes are currently available. Please check back later!
        </div>
    @else
        <div class="row justify-content-center">
            @foreach ($liveClasses as $live)
                <div class="col-md-8">
                    <div class="card live-class-card mb-4 shadow-sm border-0">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $live->course->title }}</h5>
                                <small class="text-muted">Click to join the live session</small>
                            </div>
                            <a href="{{ route('live-classes.student', $live->id) }}" class="btn btn-live">
                                Join Now <i class="bi bi-camera-video-fill ms-2"></i>
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
        background: linear-gradient(90deg, #0d6efd, #6f42c1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .live-class-card {
        border-left: 6px solid #0d6efd;
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .live-class-card:hover {
        box-shadow: 0 6px 25px rgba(0, 123, 255, 0.2);
        transform: translateY(-4px);
    }

    .btn-live {
        background: linear-gradient(135deg, #0d6efd, #6610f2);
        color: white;
        font-weight: bold;
        border-radius: 30px;
        padding: 0.5rem 1.2rem;
        transition: all 0.3s ease;
    }

    .btn-live:hover {
        background: #0a58ca;
        text-decoration: none;
    }
</style>

{{-- Bootstrap Icons CDN (if not already loaded) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
