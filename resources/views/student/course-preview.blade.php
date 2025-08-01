@extends('layouts.student')

@section('studentcontent')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4">{{ $course->title }}</h2>
        <p><strong>Author:</strong> {{ $course->author->name ?? 'N/A' }}</p>
        <p><strong>Views:</strong> {{ $course->views }}</p>
        <p><strong>Likes:</strong> {{ $course->likes }}</p>
        <p><strong>Price:</strong> ₦{{ number_format($course->price, 2) }}</p>

        <a href="{{ route('student.course.pay', $course->id) }}" class="btn btn-success mt-3">
            🔐 Pay Now to Unlock
        </a>
    </div>
</div>
@endsection
