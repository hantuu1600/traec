@props([
  'title' => 'Tracker Academic',
  'subtitle' => 'Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.',
])

<section class="relative overflow-hidden hero-dashboard">

    {{-- HERO TEXT + SLOT SEARCH --}}
    <div class="relative mx-auto max-w-4xl px-6 pt-16 pb-2 text-center">
        <h1 class="text-6xl font-extrabold tracking-tight text-primary">
            {{ $title }}
        </h1>

        <p class="mt-5 text-xl text-secondary max-w-2xl mx-auto">
            &quot;{{ $subtitle }}&quot;
        </p>

        <div class="mt-12">
            {{ $slot }}
        </div>
    </div>
</section>
