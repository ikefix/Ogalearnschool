@extends('layouts.school')

@section('schoolcontent')
<div class="container py-4">
    <h3 class="mb-4">📘 Course Assignments</h3>

    <a href="{{ route('school.assignments.create') }}" class="btn btn-primary mb-3">➕ New Assignment</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Course</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->course->title }}</td>
                    <td>{{ $assignment->due_date }}</td>
                    <td>
                        <form action="{{ route('school.assignments.destroy', $assignment->id) }}" method="POST" onsubmit="return confirm('Delete this assignment?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="padding: 3px 20px;">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
