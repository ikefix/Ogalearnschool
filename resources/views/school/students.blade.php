@extends('layouts.school') {{-- Or your custom school layout if you have one --}}

@section('title', 'School Dashboard')

@section('schoolcontent')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>🎓 All Students</h4>
        </div>
        <div class="card-body">
            <p>Welcome, {{ auth()->user()->name }}!</p>
            <p>From here, you can manage your school's students, courses, and profile.</p>
        </div>
        <div class="card-body">
                    @if($students->count())
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Joined</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ ucfirst($student->gender) }}</td>
                                            <td>{{ $student->created_at->format('d M, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No students found for your school.</p>
                    @endif
                </div>
    </div>
</div>
@endsection
