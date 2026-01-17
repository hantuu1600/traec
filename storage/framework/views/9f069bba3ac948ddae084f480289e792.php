<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'number',
    'id',
    'title',
    'typeId',
    'rankId',
    'role',
    'publisher',
    'year',
    'doi',
    'link',
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
    'title',
    'typeId',
    'rankId',
    'role',
    'publisher',
    'year',
    'doi',
    'link',
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
    <td class="text-center"><?php echo e($title); ?></td>
    <td class="text-center"><?php echo e($typeId); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($rankId); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($role); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($publisher); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($year); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($doi); ?></td>
    <td class="text-center whitespace-nowrap"><?php echo e($link); ?></td>
    <td class="text-center font-bold"><?php echo e($status); ?></td>

    <td class="text-center space-x-2">
        <a href="<?php echo e(route('lecturer.research.edit', $id)); ?>"
           class="btn btn-xs btn-outline btn-warning">
            Edit
        </a>
        <label
            for="research-member-modal-<?php echo e($id); ?>"
            class="btn btn-xs btn-outline btn-success cursor-pointer"
        >
            View
        </label>
    </td>
</tr>
<?php /**PATH D:\traec\resources\views/components/research-row.blade.php ENDPATH**/ ?>