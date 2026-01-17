<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status' => 'Draft']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['status' => 'Draft']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $s = strtolower($status);
    $class = match ($s) {
        'draft' => 'badge-outline',
        'submitted' => 'badge-info',
        'returned' => 'badge-warning',
        'verified' => 'badge-success',
        default => 'badge-outline',
    };
?>

<span <?php echo e($attributes->merge(['class' => "badge $class"])); ?>>
    <?php echo e($status); ?>

</span>
<?php /**PATH D:\traec\resources\views/components/status-badge.blade.php ENDPATH**/ ?>