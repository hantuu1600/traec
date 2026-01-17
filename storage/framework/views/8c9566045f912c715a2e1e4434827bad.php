<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'title' => 'Tracker Academic',
  'subtitle' => 'Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.',
]));

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

foreach (array_filter(([
  'title' => 'Tracker Academic',
  'subtitle' => 'Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="relative overflow-hidden hero-dashboard">

    
    <div class="relative mx-auto max-w-4xl px-6 pt-16 pb-2 text-center">
        <h1 class="text-6xl font-extrabold tracking-tight text-primary">
            <?php echo e($title); ?>

        </h1>

        <p class="mt-5 text-xl text-secondary max-w-2xl mx-auto">
            &quot;<?php echo e($subtitle); ?>&quot;
        </p>

        <div class="mt-12">
            <?php echo e($slot); ?>

        </div>
    </div>
</section>
<?php /**PATH D:\traec\resources\views/components/hero-dashboard.blade.php ENDPATH**/ ?>