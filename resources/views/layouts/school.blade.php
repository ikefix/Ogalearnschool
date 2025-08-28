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
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

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
</head>
<body>
    <div id="app">
        <!-- Floating User Dropdown (Top Right) -->
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
            @if (Auth::user()->profile_photo)
                <img src="{{ Auth::user()->profile_photo }}" 
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
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black">
                    {{ Auth::user()->name }}
            </a>
        </div>

        
            <!-- Toggle Button for Mobile -->
            <button class="sidebar-menu" id="sidebarToggle">
                ☰
            </button>

        <div class="sidebar" id="sidebar">
            @include("includes.school-side-nav")
        </div>

        <main class="py-4 container-fluid">
            @yield('schoolcontent')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-visible');
        });
    });
</script>
</body>
</html>

