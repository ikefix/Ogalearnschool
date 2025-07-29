@extends('layouts.student')

@section('studentcontent')
<div class="container py-4">
    <h4>🚀 Live Class: {{ $liveClass->course->title }}</h4>

    <div class="ratio ratio-16x9 border rounded shadow">
        <iframe 
            src="https://ogalearn.whereby.com/demo-3859b172-f62d-469c-883b-51ad2e60960b?roomKey=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZWV0aW5nSWQiOiIxMDY2MTgzMjkiLCJyb29tUmVmZXJlbmNlIjp7InJvb21OYW1lIjoiL2RlbW8tMzg1OWIxNzItZjYyZC00NjljLTg4M2ItNTFhZDJlNjA5NjBiIiwib3JnYW5pemF0aW9uSWQiOiIzMjA4MTYifSwiaXNzIjoiaHR0cHM6Ly9hY2NvdW50cy5zcnYud2hlcmVieS5jb20iLCJpYXQiOjE3NTMyNzk3ODYsInJvb21LZXlUeXBlIjoibWVldGluZ0hvc3QifQ.YLcykR9SCVKjmGzNxjZ1iC3qUUN8v-KKn20dqXSzFYE" 
            allow="camera; microphone; fullscreen; speaker; display-capture"
            style="border: 0; width: 100%; height: 700px;">
        </iframe>
    </div>
</div>
@endsection
