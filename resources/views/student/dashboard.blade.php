@extends('layouts.student')

{{-- @section('title', 'Student Dashboard') --}}

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
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>🎓 Student Dashboard</h4>
        </div>
        <div class="card-body">
            <p>From here, you can manage your school's students, courses, and profile.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toast = document.getElementById('welcomeToast');

        if (toast) {
            toast.classList.add('slide-in');

            // Slide out after 3 seconds
            setTimeout(() => {
                toast.classList.remove('slide-in');
                toast.classList.add('slide-out');

                // Completely hide after animation
                setTimeout(() => {
                    toast.classList.remove('show');
                    toast.style.display = 'none';
                }, 500); // matches .slide-out duration
            }, 3000);
        }
    });
</script>
@endsection
