@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    {{-- <h2 class="mb-4 fw-bold text-black">My Certificates</h2> --}}

    <div class="container py-5 text-center">
        <h2 class="fw-bold mb-3 text-black">My Certificates</h2>
        <p class="text-muted">You have no certificates yet.</p>
        <a href="{{ route('student.courses') }}" class="btn secondary">Start Learning</a>
    </div>
    {{-- <div class="row">
        Example certificate card
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <img src="{{ asset('images/certificate-icon.png') }}" 
                         alt="Certificate" class="mb-3" width="80">
                    <h5 class="card-title">Full Stack Development</h5>
                    <p class="text-muted">Completed on: Aug 20, 2025</p>
                    <a href="#" class="btn btn-primary btn-sm">View Certificate</a>
                </div>
            </div>
        </div>

        Add more certificates dynamically later
    </div> --}}
</div>
@endsection
