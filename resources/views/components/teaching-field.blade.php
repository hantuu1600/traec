@props([
    'label',
    'type' => 'text',
    'value' => null,
    'disabled' => false,
])

<div class="form-control">
    <label class="label">
        <span class="label-text">{{ $label }}</span>
    </label>

    @if ($type === 'select')
        <select class="select select-bordered" {{ $disabled ? 'disabled' : '' }}>
            {{ $slot }}
        </select>
    @else
        <input  
            type="{{ $type }}"
            class="input input-bordered"
            value="{{ $value }}"
            {{ $disabled ? 'disabled' : '' }}
        >
    @endif
</div>
