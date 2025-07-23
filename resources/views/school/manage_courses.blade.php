@extends('layouts.school')

@section('title', 'Manage Courses')

@section('schoolcontent')
<div class="container py-4">
    <h3>📚 Manage Your Courses</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Views</th>
                <th>Likes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td><h5><a href="{{ route('school.show', $course->slug) }}">{{ $course->title }}</a></h5></td>
                    <td>
                        <span class="badge bg-{{ $course->status === 'published' ? 'success' : 'secondary' }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </td>
                    <td>{{ $course->views }}</td>
                    <td>{{ $course->likes }}</td>
                    <td>
                        @if($course->status === 'draft')
                            <form action="{{ route('school.courses.publish', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success">Publish</button>
                            </form>
                        @else
                            <form action="{{ route('school.courses.disable', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-warning">Disable</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No courses created yet.</td></tr>
            @endforelse

            {{ $courses->links() }}
        </tbody>
    </table>
</div>
@endsection
