<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 space-y-6">

        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Community Service','description' => 'Manage community service activities (PKM).']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Community Service','description' => 'Manage community service activities (PKM).']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f4210d70713eb379067ffc513b30014)): ?>
<?php $attributes = $__attributesOriginal5f4210d70713eb379067ffc513b30014; ?>
<?php unset($__attributesOriginal5f4210d70713eb379067ffc513b30014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f4210d70713eb379067ffc513b30014)): ?>
<?php $component = $__componentOriginal5f4210d70713eb379067ffc513b30014; ?>
<?php unset($__componentOriginal5f4210d70713eb379067ffc513b30014); ?>
<?php endif; ?>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="p-4 border-b border-base-200 flex flex-col sm:flex-row gap-4 justify-between items-center">
                    <form method="GET" class="join w-full sm:w-auto">
                        <input type="text" name="search" class="input input-bordered join-item w-full sm:w-64"
                            placeholder="Search services..." value="<?php echo e(request('search')); ?>">
                        <select name="status" class="select select-bordered join-item" onchange="this.form.submit()">
                            <option value="ALL">All Status</option>
                            <option value="DRAFT" <?php echo e(request('status') == 'DRAFT' ? 'selected' : ''); ?>>Draft</option>
                            <option value="SUBMITTED" <?php echo e(request('status') == 'SUBMITTED' ? 'selected' : ''); ?>>Submitted
                            </option>
                            <option value="VERIFIED" <?php echo e(request('status') == 'VERIFIED' ? 'selected' : ''); ?>>Verified
                            </option>
                            <option value="REJECTED" <?php echo e(request('status') == 'REJECTED' ? 'selected' : ''); ?>>Rejected
                            </option>
                        </select>
                        <button class="btn btn-primary join-item">Cari</button>
                    </form>

                    <a href="<?php echo e(route('lecturer.community-service.create')); ?>" class="btn btn-primary">
                        + Add Community Service
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr class="bg-base-200 text-base-content/70">
                                <th class="w-16 text-center">No</th>
                                <th>Activity Title</th>
                                <th>Partner & Location</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center w-24">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover">
                                    <td class="text-center font-medium opacity-60">
                                        <?php echo e($activities->firstItem() + $key); ?>

                                    </td>
                                    <td>
                                        <div class="font-bold truncate max-w-xs" title="<?php echo e($item->title); ?>">
                                            <?php echo e($item->title); ?>

                                        </div>
                                        <div class="text-xs text-base-content/60"><?php echo e($item->role); ?></div>
                                    </td>
                                    <td>
                                        <div class="text-sm"><?php echo e($item->partner ?? '-'); ?></div>
                                        <div class="text-xs text-base-content/60"><?php echo e($item->location ?? '-'); ?></div>
                                    </td>
                                    <td class="text-center text-sm">
                                        <?php if($item->start_date): ?>
                                            <?php echo e(\Carbon\Carbon::parse($item->start_date)->format('d M Y')); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            $badges = [
                                                'DRAFT' => 'badge-ghost',
                                                'SUBMITTED' => 'badge-info',
                                                'VERIFIED' => 'badge-success',
                                                'REJECTED' => 'badge-error',
                                            ];
                                            $labels = [
                                                'DRAFT' => 'Draft',
                                                'SUBMITTED' => 'Submitted',
                                                'VERIFIED' => 'Verified',
                                                'REJECTED' => 'Rejected',
                                            ];
                                        ?>
                                        <div class="badge <?php echo e($badges[$item->status] ?? 'badge-ghost'); ?> gap-1">
                                            <?php echo e($labels[$item->status] ?? $item->status); ?>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="join">
                                            <a href="<?php echo e(route('lecturer.community-service.show', $item->id)); ?>"
                                                class="btn btn-xs btn-outline join-item">
                                                Detail
                                            </a>
                                            <?php if(in_array($item->status, ['DRAFT', 'REJECTED'])): ?>
                                                <a href="<?php echo e(route('lecturer.community-service.edit', $item->id)); ?>"
                                                    class="btn btn-xs btn-ghost join-item text-warning">
                                                    Edit
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-base-content/60">
                                        There is no community service data yet.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-base-200">
                    <?php echo e($activities->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/community-service/index.blade.php ENDPATH**/ ?>