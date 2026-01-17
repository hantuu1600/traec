<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'number',
    'id',
    'courseName',
    'studyProgram',
    'semester',
    'credits',
    'meetingsTotal',
    'startDate',
    'endDate',
    'year',
    'status',
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
    'number',
    'id',
    'courseName',
    'studyProgram',
    'semester',
    'credits',
    'meetingsTotal',
    'startDate',
    'endDate',
    'year',
    'status',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<tr>
    <td class="text-center"><?php echo e($number); ?></td>
    <td class="text-center"><?php echo e($courseName); ?></td>
    <td class="text-center"><?php echo e($studyProgram); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($semester); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($credits); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($meetingsTotal); ?></td>
    <td class="text-center">
        <?php echo e(\Carbon\Carbon::parse($startDate)->format('d M Y')); ?>

    </td>
    <td class="text-center">
        <?php echo e(\Carbon\Carbon::parse($endDate)->format('d M Y')); ?>

    </td>
    <td class="text-center"><?php echo e($year); ?></td>
    <td class="text-center font-bold"><?php echo e($status); ?></td>

    <td class="text-center space-x-2">
        <a href="<?php echo e(route('lecturer.teaching.request.edit', $id)); ?>" class="btn btn-md btn-outline btn-warning">
            Request Edit
        </a>
    </td>
</tr>
<?php /**PATH D:\traec\resources\views/components/teaching-row.blade.php ENDPATH**/ ?>