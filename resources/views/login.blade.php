<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>Login | e-Filling Lecturer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200 p-4">

    {{-- PRELOADER --}}
    @include('components.preloader')

    {{-- LOGIN PAGE --}}
    <main class="w-full flex items-center justify-center relative z-10">
        <x-login-form />
    </main>

    {{-- Script --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
