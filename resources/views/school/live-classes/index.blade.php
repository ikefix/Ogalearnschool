@extends('layouts.school')

@section('schoolcontent')
<div class="container py-4">
    <h4>🎥 Start a Live Class</h4>

    {{-- Start Live Class Buttons --}}
    @foreach ($courses as $course)
        <form method="POST" action="{{ route('live-classes.store') }}" class="mb-3">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit" class="btn btn-success">
                Start Live Class for {{ $course->title }}
            </button>
        </form>
    @endforeach

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    {{-- Live Class Sessions --}}
    <h5 class="mt-4">📋 Your Live Class Sessions</h5>
    <ul class="list-group">
        @php
            $liveClasses = \App\Models\LiveClass::where('school_id', auth()->id())->with('course')->latest()->get();
        @endphp

        @forelse ($liveClasses as $class)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $class->course->title }}</strong>
                    <br>
                    Status: 
                    <span class="badge bg-{{ $class->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($class->status) }}
                    </span>
                </div>

                @if ($class->status === 'active')
                    <form method="POST" action="{{ route('live-classes.end', $class->id) }}" onsubmit="return confirm('End this class?');">
                        @csrf
                        <button class="btn btn-sm btn-danger">End Class</button>
                    </form>
                @endif
            </li>
        @empty
            <li class="list-group-item">No live classes found.</li>
        @endforelse
    </ul>
</div>
@endsection
