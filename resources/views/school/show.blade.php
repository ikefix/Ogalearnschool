@extends('layouts.school')

{{-- @section('title', 'Student Dashboard') --}}

@section('schoolcontent')



<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold">{{ $course->title }}</h2>
        <p class="text-muted">By <strong>{{ $course->author->name ?? 'Unknown' }}</strong></p>
    </div>

    <div class="mb-5">
        <h4 class="text-primary mb-2">📚 What You’ll Learn</h4>
        <div class="bg-light p-3 rounded border">
            {!! nl2br(e($course->what_youll_learn)) !!}
        </div>
    </div>

    <div class="mb-5">
        <h4 class="text-success mb-2">🎯 Outcomes</h4>
        <div class="bg-light p-3 rounded border">
            {!! nl2br(e($course->course_outcomes)) !!}
        </div>
    </div>

    <div class="mb-5">
        <h4 class="text-dark mb-2">📝 Course Content</h4>
        <div class="p-3 border rounded ck-content sturborn">
            {!! $course->content !!}
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <button 
            id="like-btn"
            class="btn btn-sm {{ session("liked_course_{$course->id}") ? 'btn-primary' : 'btn-outline-primary' }}"
            data-course-id="{{ $course->id }}">
            👍 <span id="like-count">{{ $course->likes }}</span> Like{{ $course->likes != 1 ? 's' : '' }}
        </button>



        <span class="text-muted">👀 {{ $course->views }} Views</span>
    </div>


    <hr class="my-5">

    <div class="mt-5">
        <h4 class="mb-4">💬 Comments ({{ $course->comments->count() }})</h4>

        @foreach ($course->comments as $comment)
            <div class="d-flex mb-4">
                {{-- Profile picture --}}
                <div class="me-3">
                    @if ($comment->user && $comment->user->profile_photo)
                        <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" 
                            alt="Profile Picture" 
                            class="rounded-circle shadow" 
                            width="30" height="30"
                            style="object-fit: cover;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name ?? 'User') }}&size=50" 
                            alt="Default Avatar" 
                            class="rounded-circle shadow" 
                            width="30" height="30"
                            style="object-fit: cover;">
                    @endif
                </div>

                {{-- Comment content --}}
                <div class="comment-shadow">
                    <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                    <p>{{ $comment->content }}</p>
                    <p class="text-muted small">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
         {{-- Add new comment --}}
    <div class="mt-5">
        <h5>Add a Comment</h5>
        <form action="{{ route('student.course.comment', $course->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="3" placeholder="Write your comment here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeBtn = document.getElementById('like-btn');
        const courseId = likeBtn.getAttribute('data-course-id');
        const likeKey = `liked_course_${courseId}`;
        const likeCount = document.getElementById('like-count');

        // Set initial state
        if (localStorage.getItem(likeKey)) {
            likeBtn.classList.remove('btn-outline-primary');
            likeBtn.classList.add('btn-primary');
        }

        likeBtn.addEventListener('click', function () {
            const liked = localStorage.getItem(likeKey);

            const url = liked 
                ? "{{ route('student.unlike.course', $course->id) }}" 
                : "{{ route('student.like.course', $course->id) }}";

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({})
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    likeCount.textContent = data.likes;

                    if (liked) {
                        localStorage.removeItem(likeKey);
                        likeBtn.classList.remove('btn-primary');
                        likeBtn.classList.add('btn-outline-primary');
                    } else {
                        localStorage.setItem(likeKey, true);
                        likeBtn.classList.remove('btn-outline-primary');
                        likeBtn.classList.add('btn-primary');
                    }
                }
            })
            .catch(err => console.error('Error toggling like:', err));
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const courseId = {{ $course->id }};
        const viewKey = `viewed_course_${courseId}`;

        if (!localStorage.getItem(viewKey)) {
            fetch(`/courses/${courseId}/track-view`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                localStorage.setItem(viewKey, 'true');
                console.log('🔁 View counted and stored locally');
            })
            .catch(error => console.error('❌ Error counting view:', error));
        } else {
            console.log('🛑 View already counted for this user');
        }
    });
</script>



@endsection
