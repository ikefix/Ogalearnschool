@extends('layouts.school') {{-- Or your custom school layout if you have one --}}

@section('title', 'School Dashboard')

@section('schoolcontent')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>🎓 School Dashboard</h4>
        </div>
        <div class="card-body">
            <p>Welcome, {{ auth()->user()->name }}!</p>
            <p>From here, you can manage your school's students, courses, and profile.</p>
        </div>
    </div>
</div>
@endsection
