<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Tremic | {{ $title ?? 'Auth Page' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans relative min-h-screen flex items-center justify-center p-4 bg-auth-gradient">

    {{-- Preloader should be the topmost overlay --}}
    @includeIf('components.preloader')

    {{-- Background overlay --}}
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

    <main class="relative z-10 w-full flex items-center justify-center">
        @yield('content')
    </main>

    {{-- Load the correct JS file for preloader --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
