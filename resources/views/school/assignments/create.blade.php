@extends('layouts.school')

@section('title', 'Create Assignment')

@section('schoolcontent')
<div class="container py-4">
    <h3>📝 Create New Assignment</h3>

    <form action="{{ route('school.assignments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Assignment Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions</label>
            <textarea name="instructions" id="instructions" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Assignment</button>
    </form>
</div>
@endsection
