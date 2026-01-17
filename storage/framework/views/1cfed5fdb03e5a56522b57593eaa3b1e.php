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

<?php
    $get = function ($row, string $key, $default = null) {
        return is_array($row) ? $row[$key] ?? $default : data_get($row, $key, $default);
    };

    $badgeClass = function (?string $status) {
        return match (strtoupper((string) $status)) {
            'SUBMITTED' => 'badge-info',
            'VERIFIED' => 'badge-success',
            'REJECTED' => 'badge-error',
            'RETURNED' => 'badge-warning',
            default => 'badge-ghost',
        };
    };
?>

<div class="w-full">
    <div class="rounded-2xl border border-base-300 bg-base-100 shadow-sm">
        <div class="flex flex-col gap-1 p-6">
            <h2 class="text-lg font-semibold text-secondary">Activity Requests</h2>
            <p class="text-sm text-base-content/60">Review and approve lecturer activity submissions</p>
        </div>

        <div class="px-6 pb-6 overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="text-base-content/60">
                        <th>Lecturer</th>
                        <th>Prodi</th>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Period</th>
                        <th>Evidence</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $id = (int) $get($row, 'id', 0);
                            $category = strtoupper((string) $get($row, 'category', ''));
                            $lecturer = (string) $get($row, 'lecturer', '-');
                            $prodi = (string) $get($row, 'prodi', '-');
                            $title = (string) $get($row, 'title', '-');
                            $period = (string) $get($row, 'period', '-');
                            $evidence = (int) $get($row, 'evidence_count', 0);
                            $submittedAt = (string) $get($row, 'submitted_at', '-');
                            $status = strtoupper((string) $get($row, 'status', ''));
                            $badge = $badgeClass($status);

                            $canAction = $status === 'SUBMITTED';

                            $viewRoute =
                                $id && $category
                                    ? route('admin.document-request.show', ['category' => $category, 'id' => $id])
                                    : '#';
                            $approveRoute =
                                $id && $category
                                    ? route('admin.document-request.approve', ['category' => $category, 'id' => $id])
                                    : '#';
                            $rejectRoute =
                                $id && $category
                                    ? route('admin.document-request.reject', ['category' => $category, 'id' => $id])
                                    : '#';
                        ?>

                        <tr class="hover:bg-base-200/40">
                            <td class="font-semibold text-secondary">
                                <?php echo e($lecturer); ?>

                            </td>

                            <td>
                                <span
                                    class="badge badge-outline whitespace-normal h-auto py-1.5 leading-snug text-center max-w-48">
                                    <?php echo e($prodi); ?>

                                </span>
                            </td>

                            <td>
                                <div class="font-medium line-clamp-1"><?php echo e($title); ?></div>
                                <div class="text-xs text-base-content/60"><?php echo e($submittedAt); ?></div>
                            </td>

                            <td>
                                <span class="badge badge-ghost"><?php echo e($category ?: '—'); ?></span>
                            </td>

                            <td class="text-sm whitespace-nowrap"><?php echo e($period); ?></td>

                            <td>
                                <span class="badge badge-neutral"><?php echo e($evidence); ?></span>
                            </td>

                            <td>
                                <span class="badge <?php echo e($badge); ?>"><?php echo e($status ?: '—'); ?></span>
                            </td>

                            <td class="text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="<?php echo e($viewRoute); ?>" class="btn btn-sm btn-ghost">
                                        View
                                    </a>

                                    <?php if($canAction): ?>
                                        <button class="btn btn-sm bg-primary text-white border-0"
                                            onclick="document.getElementById('approve-<?php echo e($category); ?>-<?php echo e($id); ?>').showModal()">
                                            Approve
                                        </button>

                                        <button class="btn btn-sm btn-outline btn-error"
                                            onclick="document.getElementById('reject-<?php echo e($category); ?>-<?php echo e($id); ?>').showModal()">
                                            Reject
                                        </button>

                                        <dialog id="approve-<?php echo e($category); ?>-<?php echo e($id); ?>" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Approve request?</h3>
                                                <p class="text-sm text-base-content/70 mt-1">
                                                    This will mark the submission as <span
                                                        class="font-semibold">VERIFIED</span>.
                                                </p>

                                                <div class="modal-action">
                                                    <form method="dialog">
                                                        <button class="btn">Cancel</button>
                                                    </form>

                                                    <form method="POST" action="<?php echo e($approveRoute); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <button
                                                            class="btn bg-primary text-white border-0">Approve</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>

                                        <dialog id="reject-<?php echo e($category); ?>-<?php echo e($id); ?>" class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Reject request?</h3>
                                                <p class="text-sm text-base-content/70 mt-1">
                                                    Add a short reason so the lecturer can fix it.
                                                </p>

                                                <form method="POST" action="<?php echo e($rejectRoute); ?>"
                                                    class="mt-4 space-y-3">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>

                                                    <textarea name="reason" class="textarea textarea-bordered w-full" rows="3" placeholder="Reason (required)"
                                                        required></textarea>

                                                    <div class="modal-action">
                                                        <form method="dialog">
                                                            <button class="btn" type="submit">Cancel</button>
                                                        </form>

                                                        <button type="submit" class="btn btn-outline btn-error">
                                                            Reject
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </dialog>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="py-10 text-center text-base-content/60">
                                No activity requests found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\traec\resources\views/components/request-activity-table.blade.php ENDPATH**/ ?>