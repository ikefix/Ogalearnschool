@extends('layouts.student')

@section('studentcontent')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<div class="container py-5 text-center">
    <h2 class="fw-bold mb-4 text-black">Join Our Community</h2>
    <p class="text-muted mb-5">
        Connect with fellow students, mentors, and professionals.  
        Stay updated, share ideas, and grow together.
    </p>

    <div class="d-flex justify-content-center flex-wrap gap-4">
        <!-- WhatsApp -->
        <a href="https://chat.whatsapp.com/your-link" target="_blank" class="btn btn-success px-4 py-2">
            <i class="bi bi-whatsapp me-2"></i> WhatsApp Group
        </a>

        <!-- Facebook -->
        <a href="https://facebook.com/your-page" target="_blank" class="btn btn-primary px-4 py-2">
            <i class="bi bi-facebook me-2"></i> Facebook
        </a>

        <!-- YouTube -->
        <a href="https://youtube.com/your-channel" target="_blank" class="btn btn-danger px-4 py-2">
            <i class="bi bi-youtube me-2"></i> YouTube
        </a>

        <!-- Telegram (optional) -->
        <a href="https://t.me/your-link" target="_blank" class="btn btn-info px-4 py-2 text-white">
            <i class="bi bi-telegram me-2"></i> Telegram
        </a>
    </div>
</div>
@endsection
