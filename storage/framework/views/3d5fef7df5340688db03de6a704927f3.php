<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'rows' => [],
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
  'rows' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="mx-auto max-w-fit px-4 text-secondary mb-10">
    <div class="bg-base-100 border border-base-300 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-4 flex items-center justify-between gap-3">
        <div>
        <h2 class="text-lg font-bold text-base-content">Activity List</h2>
        <p class="text-sm text-base-content/60">Monitor your academic activity status</p>
        </div>

    </div>

    <div class="overflow-x-auto">
        <?php if(request('q') || request('filter')): ?>
            <div class="px-4 pb-2 text-sm text-base-content/70">
                Showing results
                <?php if(request('q')): ?>
                    for "<span class="font-semibold"><?php echo e(request('q')); ?></span>"
                <?php endif; ?>

                <?php if(request('filter') && request('filter') !== 'all'): ?>
                    in <span class="font-semibold capitalize"><?php echo e(request('filter')); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <table class="table">
        <thead>
            <tr class="text-base-content/70">
            <th>Category</th>
            <th>Lecturer</th>
            <th>Activity</th>
            <th>Period</th>
            <th>Date</th>
            <th>Status</th>
            <th>Updated</th>
            <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $category = $row['category'] ?? '-';
                $lecturer = $row['lecturer'] ?? '-';
                $title    = $row['title'] ?? '-';
                $period   = $row['period'] ?? '-';
                $date     = $row['date'] ?? '-';
                $status   = strtoupper($row['status'] ?? 'DRAFT');
                $updated  = $row['updated'] ?? '-';

                $badge = match($status) {
                'DRAFT' => 'badge-ghost',
                'SUBMITTED' => 'badge-info',
                'VERIFIED' => 'badge-success',
                'REJECTED' => 'badge-error',
                default => 'badge-ghost'
                };
            ?>

            <tr class="hover">
                <td>
                <span class="badge badge-outline">
                    <?php echo e($category); ?>

                </span>
                </td>

                <td>
                <div class="flex flex-col">
                    <span class="font-semibold"><?php echo e($lecturer); ?></span>
                </div>
                </td>

                <td class="font-semibold">
                <div class="max-w-[420px] truncate"><?php echo e($title); ?></div>
                </td>

                <td class="text-base-content/80"><?php echo e($period); ?></td>

                <td class="text-base-content/70"><?php echo e($date); ?></td>

                <td>
                <span class="badge <?php echo e($badge); ?>"><?php echo e($status); ?></span>
                </td>

                <td class="text-base-content/70"><?php echo e($updated); ?></td>

                <td class="text-right">
                <div class="flex justify-end gap-2">
                    <?php
                        $viewRoute = match($category) {
                            'Teaching' => route('lecturer.teaching.show', $row['id'] ?? 0),
                            'Research' => route('lecturer.research.show', $row['id'] ?? 0),
                            'Community Service' => route('lecturer.community-service.show', $row['id'] ?? 0),
                            'Support' => route('lecturer.support.show', $row['id'] ?? 0),
                            default => '#'
                        };
                    ?>
                    <a href="<?php echo e($viewRoute); ?>" class="btn btn-md btn-ghost">View</a>
                </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8" class="text-center py-10 text-base-content/60">
                No activities found.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        </table>
    </div>

    
    <div class="p-4 border-t border-base-300">
        <?php if(method_exists($rows, 'links')): ?>
            <?php echo e($rows->links()); ?>

        <?php else: ?>
            <div class="text-sm text-base-content/60">
                Showing <?php echo e(count($rows)); ?> items
            </div>
        <?php endif; ?>
    </div>
    </div>
</div>

<?php /**PATH D:\traec\resources\views/components/activity-table-lecturer.blade.php ENDPATH**/ ?>