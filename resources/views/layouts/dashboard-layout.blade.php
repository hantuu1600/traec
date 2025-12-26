<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Tremic | {{ $title ?? 'Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans bg-base-300">
    {{-- HEADER --}}
    <x-header-dashboard />

    <div class="flex pt-16 min-h-screen overflow-hidden">
        {{-- SIDEBAR --}}
        <x-sidebar-dashboard />

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto">

            {{-- HERO + SEARCH --}}
            <x-hero-dashboard
                title="Tracker Academic"
                subtitle="Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app."
            >
                <x-search-dashboard
                    :filters="['All', 'Courses', 'Assignments', 'Lecturers', 'Schedules']"
                    placeholder="Search a goal"
                    action="#"
                />
            </x-hero-dashboard>
            
            {{-- PAGE CONTENT --}}
            <section class="mx-auto max-w-5xl px-6 pt-10 pb-10">
                @yield('content')
            </section>

        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
