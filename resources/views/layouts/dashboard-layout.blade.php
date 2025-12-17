<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Tremic | {{ $title ?? 'Auth Page' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans bg-base-200">
    {{-- HEADER --}}
    <x-header-dashboard />

    <div class="flex pt-16 h-screen overflow-hidden">
        {{-- SIDEBAR --}}
        <x-sidebar-dashboard />

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
