@props(['status' => 'Draft'])

@php
    $s = strtolower($status);
    $class = match ($s) {
        'draft' => 'badge-outline',
        'submitted' => 'badge-info',
        'returned' => 'badge-warning',
        'verified' => 'badge-success',
        default => 'badge-outline',
    };
@endphp

<span {{ $attributes->merge(['class' => "badge $class"]) }}>
    {{ $status }}
</span>
