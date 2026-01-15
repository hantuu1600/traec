<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Tremic | {{ $title ?? 'Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans bg-base-100">
    {{-- HEADER --}}
    <x-header-dashboard />

    <div class="flex pt-16 min-h-screen overflow-hidden">
        {{-- SIDEBAR --}}
        <x-lecturer-sidebar />

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto">
            <section class="mx-auto">
                @yield('content')
            </section>

        </main>
    </div>

    {{-- FOOTER --}}
    <x-footer />

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
