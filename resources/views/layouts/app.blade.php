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
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include("includes.nav")

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<!-- Floating WhatsApp Button -->
<!-- Floating WhatsApp Button -->
<!-- Font Awesome (must be loaded first) -->
<a href="https://wa.me/2349152150124" target="_blank"
   style="position: fixed; bottom: 20px; right: 20px; background: #25d366; color: white; border-radius: 50%; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; font-size: 28px; box-shadow: 0 2px 6px rgba(0,0,0,0.3); z-index: 1000;">
   WA
</a>


<!-- Floating WhatsApp Button -->

<!-- Select2 JS -->
</body>
</html>
