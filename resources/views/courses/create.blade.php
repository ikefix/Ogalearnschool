
@extends('layouts.school')

@section('title', 'Create Course')

@section('schoolcontent')
<div class="container py-4">
    <h3>Create a New Badge</h3>

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

        {{-- Price --}}
        <div class="mb-3">
            <label class="form-label">Course Price (₦)</label>
            <input type="number" name="price" class="form-control" min="0" step="0.01" placeholder="e.g. 5000" required>
        </div>

        {{-- What You'll Learn --}}
        <div class="mb-3">
            <label class="form-label">What You’ll Learn</label>
            <textarea name="what_youll_learn" class="form-control" rows="4" placeholder="e.g.&#10;1. Understand Laravel basics&#10;2. Build a CRUD app"></textarea>
        </div>

        {{-- Course Questions --}}
        <div class="mb-3">
            <label class="form-label">Course Questions</label>
            <textarea name="course_questions" class="form-control" rows="4" placeholder="e.g.&#10;1. What is MVC?&#10;2. What is a migration?"></textarea>
        </div>

<!-- Replace this with your `content-editor` textarea -->
<textarea name="content" id="editor" class="form-control"></textarea>




        {{-- Thumbnail --}}
        <div class="mb-3">
            <label class="form-label">Thumbnail (optional)</label>
            <input type="file" name="thumbnail" class="form-control">
        </div>

        <button class="btn btn-primary">Create Course</button>
    </form>
</div>

{{-- CKEditor --}}
<!-- Include CKEditor 5 Classic build -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload') }}?&_token={{ csrf_token() }}"
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
