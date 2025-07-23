@extends('layouts.school')

@section('schoolcontent')
<h3>Upload Assets for {{ $course->title }}</h3>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('course-assets.store', $course->id) }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="course_id" value="{{ $course->id }}">

    {{-- PDF Uploads --}}
    <div class="mb-3">
        <label>PDF Files</label>
        <div id="pdfInputs">
            <input type="file" name="pdf[]" class="form-control mb-2" accept=".pdf">
        </div>
        <button type="button" id="addPdf" class="btn btn-sm btn-secondary">+ Add another PDF</button>
    </div>

    {{-- Images Upload --}}
    <div class="mb-3">
        <label>Images</label>
        <div id="imageInputs">
            <input type="file" name="image[]" class="form-control mb-2" accept="image/*">
        </div>
        <button type="button" id="addImage" class="btn btn-sm btn-secondary">+ Add another Image</button>
    </div>

    {{-- Video Links --}}
    <div class="mb-3">
        <label>Video Links</label>
        <div id="videoLinks">
            <input type="url" name="video_link[]" class="form-control mb-2" placeholder="https://youtube.com/...">
        </div>
        <button type="button" id="addLink" class="btn btn-sm btn-secondary">+ Add another video link</button>
    </div>

    <button class="btn btn-primary">Upload</button>
</form>

<script>
    document.getElementById('addPdf').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'pdf[]';
        input.accept = '.pdf';
        input.classList.add('form-control', 'mb-2');
        document.getElementById('pdfInputs').appendChild(input);
    });

    document.getElementById('addImage').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'image[]';
        input.accept = 'image/*';
        input.classList.add('form-control', 'mb-2');
        document.getElementById('imageInputs').appendChild(input);
    });

    document.getElementById('addLink').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'url';
        input.name = 'video_link[]';
        input.placeholder = 'https://youtube.com/...';
        input.classList.add('form-control', 'mb-2');
        document.getElementById('videoLinks').appendChild(input);
    });
</script>
@endsection
