@extends('layouts.student')

@section('studentcontent')
<div class="container py-5">
    <h2 class="mb-4 text-center text-gradient">
        📚 Course Assets for <strong>{{ $course->title }}</strong>
    </h2>

    @if ($assets->isEmpty())
        <div class="alert alert-warning text-center shadow-sm">
            🚫 No assets have been uploaded for this course yet.
        </div>
    @else
        <div class="row">
            @foreach ($assets as $asset)
                <div class="col-md-12 mb-4">
                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body">
@if ($asset->pdf_paths && count(json_decode($asset->pdf_paths, true)) > 0)
    <h5 class="mb-3 text-success">📄 PDF Files</h5>
    <ul class="list-unstyled ms-3">
        @foreach (json_decode($asset->pdf_paths, true) as $pdf)
            <li class="mb-1">
                <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                <a href="{{ $pdf }}" target="_blank" class="text-decoration-none">
                    View PDF
                </a>
            </li>
        @endforeach
    </ul>
@endif


                            {{-- Image Files --}}
                            @if ($asset->image_paths && count(json_decode($asset->image_paths, true)) > 0)
                                <h5 class="mt-4 text-primary">🖼️ Image Gallery</h5>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach (json_decode($asset->image_paths, true) as $image)
                                        <img src="{{ $image }}"
                                             alt="Asset Image"
                                             width="130"
                                             class="rounded img-thumbnail border border-secondary shadow-sm"
                                             style="cursor: pointer; transition: 0.3s ease"
                                             data-bs-toggle="modal"
                                             data-bs-target="#imageModal"
                                             data-image="{{ $image }}">
                                    @endforeach
                                </div>
                            @endif

                            {{-- Video Links --}}
                            @if ($asset->video_links && count(json_decode($asset->video_links, true)) > 0)
                                <h5 class="mt-4 text-danger">🎥 Video Resources</h5>
                                <ul class="list-unstyled ms-3">
                                    @foreach (json_decode($asset->video_links, true) as $video)
                                        <li class="mb-1">
                                            <i class="bi bi-play-btn-fill me-2 text-danger"></i>
                                            <a href="{{ $video }}" target="_blank" class="text-decoration-none">
                                                Watch Video
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img src="" id="modalImage" class="img-fluid rounded shadow-lg" alt="Preview">
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .text-gradient {
        font-weight: 700;
        background: linear-gradient(90deg, #198754, #0d6efd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    img.img-thumbnail:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        imageModal.addEventListener('show.bs.modal', function (event) {
            const triggerImage = event.relatedTarget;
            const imageUrl = triggerImage.getAttribute('data-image');
            modalImage.src = imageUrl;
        });
    });
</script>
@endsection
