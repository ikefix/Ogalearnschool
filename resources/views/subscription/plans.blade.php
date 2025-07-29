@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h2>Subscribe to a Course</h2>

    <form method="POST" action="{{ route('subscription.subscribe') }}">
        @csrf

        <div class="mb-3">
            <label for="course_id" class="form-label">Select Course</label>
            <select name="course_id" class="form-select" required>
                <option value="">-- Choose a Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Subscribe</button>
    </form>
</div>
@endsection
