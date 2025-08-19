@extends('layouts.student')

@section('studentcontent')
<div class="container">
    <h2 class="mb-4">My Paid Courses</h2>

    @if($courses->isEmpty())
        <p class="text-muted">You have not purchased any course yet.</p>
    @else
        <ul class="list-group">
@foreach($courses as $course)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $course->title }}</h5>
            <p class="card-text">{{ $course->description }}</p>

            <!-- Link to view activities for this course -->
            <a href="{{ route('student.course.activities', $course->id) }}" 
               class="btn btn-outline-primary btn-sm">
               View Activities
            </a>
        </div>
    </div>
@endforeach

        </ul>
    @endif
</div>
@endsection
