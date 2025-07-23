<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom student CSS (where you can move sidebar styles) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/student.css'])

    <style>
        body {
            margin: 0;
            padding-left: 250px; /* Match sidebar width */
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8f9fa;
            padding: 1rem;
            overflow-y: auto;
        }
    </style>

<style>
    .sturborn {
        max-width: 100%;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.8;
        font-size: 16px;
        color: #333;
    }

    .sturborn h2,
    .sturborn h3,
    .sturborn h4 {
        margin-top: 1.5rem;
        color: #1d3557;
    }

    .sturborn p {
        margin-bottom: 1.2rem;
    }

    .sturborn img {
        max-width: 100%;
        height: auto !important;
        border-radius: 10px;
        display: block;
        margin: 1.5rem auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .sturborn ul,
    .sturborn ol {
        margin: 1rem 0;
        padding-left: 1.5rem;
    }

    .sturborn iframe {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 1rem auto;
    }

    .sturborn blockquote {
        border-left: 4px solid #3498db;
        padding-left: 1rem;
        color: #555;
        margin: 1.5rem 0;
        background-color: #f7f9fa;
    }
</style>

    
</head>
<body>
    <div id="app">

         @php
            $user = auth()->user();
        @endphp

        <div class="mb-4"
        style="
            position: fixed;
            display:flex;
            gap:1rem;
            top: 15px;
            right: 20px;
            z-index: 1050;
            background: #ffffff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        ">
            @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                    alt="Profile Picture" 
                    class="rounded-circle shadow" 
                    width="20" height="20"
                    style="object-fit: cover;"
                    >
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=150" 
                    alt="Default Avatar" 
                    class="rounded-circle shadow" 
                    width="20" height="20"
                    style="object-fit: cover;"
                    >
            @endif
            <a id="navbarDropdown" class="nav-link" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
            </a>
        </div>

        {{-- Student Sidebar --}}
        <div class="sidebar">
            @include('includes.student-side-nav')
        </div>

        {{-- Main content area --}}
        <main class="py-4 container-fluid">
            @yield('studentcontent')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
