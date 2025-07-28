@extends('layouts.student')

@section('studentcontent')
<!-- Slide-in Welcome Message -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <div class="toast welcome-toast text-white bg-success border-0 show" role="alert" id="welcomeToast">
        <div class="d-flex">
            <div class="toast-body">
                Welcome, {{ auth()->user()->name }}!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- Dashboard Content -->
<div class="container py-4">
    <div class="mb-4 text-center">
        <h2 class="text-primary">🎓 Student Dashboard</h2>
        <p class="text-muted">Welcome to your student panel. Quickly access your tools below.</p>
    </div>

    <div class="row">
        <!-- Courses -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('student.courses') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">📚 My Courses</h5>
                        <p class="card-text text-muted">View and continue your courses.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Assignments -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('student.assignments.index') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">📝 Assignments</h5>
                        <p class="card-text text-muted">Check and submit assignments.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Scores -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('student.scores.index') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">📊 My Scores</h5>
                        <p class="card-text text-muted">View your performance and grades.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Profile -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('student.profile.picture') }}" class="text-decoration-none">
                <div class="card shadow-sm text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title">👤 Profile</h5>
                        <p class="card-text text-muted">Update your personal information.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toast = document.getElementById('welcomeToast');
        if (toast) {
            toast.classList.add('slide-in');
            setTimeout(() => {
                toast.classList.remove('slide-in');
                toast.classList.add('slide-out');
                setTimeout(() => {
                    toast.classList.remove('show');
                    toast.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
</script>
@endsection
