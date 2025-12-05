<!DOCTYPE html>
<html lang="en" data-theme="efilling">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Auth Page' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
</head>
<body class="relative min-h-screen flex items-center justify-center p-4"
      style="background-image: url('/images/teal.webp'); background-size: cover; background-position: center;">
    
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

    <main class="relative z-10">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
