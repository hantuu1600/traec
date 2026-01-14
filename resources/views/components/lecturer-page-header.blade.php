<div>
    <h1 class="text-2xl md:text-3xl font-extrabold text-secondary mt-7">
        {{ $title }}
    </h1>

    @isset($description)
        <p class="text-sm text-secondary/70">
            {{ $description }}
        </p>
    @endisset
</div>
