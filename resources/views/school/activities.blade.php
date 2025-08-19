@extends('layouts.school')

@section('schoolcontent')
<div class="container">
    <h2>Manage Activities</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Activity Form -->
<form action="{{ route('school.activities.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Course</label>
        <select name="course_id" class="form-control" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="activity_date" class="form-control" required>
    </div>

    <button class="btn btn-primary">Add Activity</button>
</form>


    <hr>

    <!-- List Activities -->
<!-- List Activities -->
<h4 class="text-dark">All Activities</h4>
<ul class="list-group">
    @foreach($activities as $activity)
        <li class="list-group-item d-flex justify-content-between align-items-center text-dark">
            <span>
                <strong>{{ $activity->title }}</strong> - {{ $activity->activity_date }}
                <br>
                {{ $activity->description }}
            </span>
            <form action="{{ route('school.activities.delete', $activity->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

</div>
@endsection
