<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'filters' => [''],
    'placeholder' => '',
    'action' => '#',
    'method' => 'GET',
    'filterName' => 'filter',
    'queryName' => 'q',
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
    'filters' => [''],
    'placeholder' => '',
    'action' => '#',
    'method' => 'GET',
    'filterName' => 'filter',
    'queryName' => 'q',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="my-6">
    <form action="<?php echo e($action); ?>" method="<?php echo e($method); ?>">
        <div class="mx-auto w-full max-w-2xl rounded-full border border-primary bg-base-100 px-3 py-2 shadow-md">
            <div class="flex items-center gap-2">
 
                
                <div class="shrink-0">
                    <select name="<?php echo e($filterName); ?>"
                            class="select select-ghost select-sm rounded-full bg-base-200/60 focus:outline-none">
                        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(\Illuminate\Support\Str::slug($filter)); ?>"><?php echo e($filter); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                
                <div class="flex-1">
                    <input
                        name="<?php echo e($queryName); ?>"
                        type="text"
                        placeholder="<?php echo e($placeholder); ?>"
                        class="input input-ghost input-sm w-full rounded-full focus:outline-none"
                    />
                </div>

                
                <button
                  type="submit"
                  class="btn btn-sm btn-ghost rounded-full flex items-center justify-center"
                  aria-label="Search"
              >
                  <img
                      src="<?php echo e(asset('images/icons/search-icon.svg')); ?>"
                      alt="Search"
                      class="w-5 h-5 opacity-80 hover:opacity-100 transition"
                  >
                </button>

            </div>
        </div>
    </form>
</div>
<?php /**PATH D:\traec\resources\views/components/search-dashboard.blade.php ENDPATH**/ ?>