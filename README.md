@extends('layouts.school')

@section('title', 'Create Course')

@section('schoolcontent')
<div class="container py-4">
    <h3>Create a New Course</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Course Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        {{-- What You'll Learn --}}
        <div class="mb-3">
            <label class="form-label">What You’ll Learn</label>
            <textarea name="what_youll_learn" class="form-control" rows="4" placeholder="e.g.&#10;1. Understand Laravel basics&#10;2. Build a CRUD app"></textarea>
        </div>

        {{-- Course Outcomes --}}
        <div class="mb-3">
            <label class="form-label">At the End of the Course (Outcomes)</label>
            <textarea name="course_outcomes" class="form-control" rows="4" placeholder="e.g.&#10;1. Deploy your app&#10;2. Master blade templating"></textarea>
        </div>

        {{-- Course Questions --}}
        <div class="mb-3">
            <label class="form-label">Course Questions</label>
            <textarea name="course_questions" class="form-control" rows="4" placeholder="e.g.&#10;1. What is MVC?&#10;2. What is a migration?"></textarea>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Course Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        {{-- Course Body (Rich Content) --}}
        <div class="mb-3">
            <label class="form-label">Course Body / Content</label>
            <textarea name="content" id="content-editor" class="form-control" rows="10"></textarea>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label class="form-label">Thumbnail (optional)</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        <button class="btn btn-primary">Create Course</button>
    </form>
</div>
{{-- CKEditor CDN --}}
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content-editor', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endsection

