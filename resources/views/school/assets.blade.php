@extends('layouts.school')

@section('schoolcontent')
<div class="container py-4">
    <h3 class="mb-4">📚 Your Courses</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">Course Code: {{ $course->code ?? 'N/A' }}</p>
                        <a href="{{ route('course-assets.form', $course->id) }}" class="btn btn-primary">
                            📎 Upload Assets
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
