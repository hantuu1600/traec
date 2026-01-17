<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'stats' => [
    ['label' => 'Total Activities', 'value' => 0, 'icon' => 'total'],
    ['label' => 'Teaching', 'value' => 0, 'icon' => 'teaching'],
    ['label' => 'Research', 'value' => 0, 'icon' => 'research'],
    ['label' => 'Verified', 'value' => 0, 'icon' => 'verified'],
  ],
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
  'stats' => [
    ['label' => 'Total Activities', 'value' => 0, 'icon' => 'total'],
    ['label' => 'Teaching', 'value' => 0, 'icon' => 'teaching'],
    ['label' => 'Research', 'value' => 0, 'icon' => 'research'],
    ['label' => 'Verified', 'value' => 0, 'icon' => 'verified'],
  ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="mx-auto max-w-4xl px-4 py-10">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

    <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $label = $item['label'] ?? '-';
        $value = $item['value'] ?? 0;
        $icon  = $item['icon'] ?? 'total';

        // color per card
        $ring = match($icon) {
          'total' => 'ring-primary/20',
          'teaching' => 'ring-secondary/20',
          'research' => 'ring-primary/15',
          'verified' => 'ring-success/20',
          default => 'ring-base-300',
        };

        $badge = match($icon) {
          'total' => 'badge-primary',
          'teaching' => 'badge-secondary',
          'research' => 'badge-primary',
          'verified' => 'badge-success',
          default => 'badge-neutral',
        };

        // svg inline icons
        $iconSvg = match($icon) {
          'teaching' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-6-3h12"/>',
          'research' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11 3a8 8 0 106.32 12.9l3.39 3.39M10 7h4m-2-2v4"/>',
          'verified' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
          default => '<path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10M7 12h10M7 17h10"/>',
        };
      ?>

      <div class="bg-base-100 border border-base-300 rounded-2xl p-4 shadow-sm ring-1 <?php echo e($ring); ?>">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-sm text-base-content/60"><?php echo e($label); ?></div>
            <div class="mt-1 text-3xl font-extrabold text-base-content"><?php echo e($value); ?></div>
          </div>

          <div class="flex flex-col items-end gap-2">
            <span class="badge <?php echo e($badge); ?> badge-outline"><?php echo e($value); ?></span>

            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-base-200 text-base-content/80">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <?php echo $iconSvg; ?>

              </svg>
            </span>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
</div>
<?php /**PATH D:\traec\resources\views/components/activity-stats.blade.php ENDPATH**/ ?>