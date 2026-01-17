<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Support Activity','description' => 'Manage your academic support activities.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Support Activity','description' => 'Manage your academic support activities.']); ?>
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
                <div class="p-4 border-b border-base-200 flex justify-between items-center bg-base-100 rounded-t-box">
                    <form method="GET" class="join">
                        <input type="text" name="search" class="input input-bordered join-item w-64"
                            placeholder="Search Activity..." value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-primary join-item">Search</button>
                    </form>
                    <a href="<?php echo e(route('lecturer.support.create')); ?>" class="btn btn-primary">+ Add Support Activity</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr class="bg-base-200">
                                <th class="w-16 text-center">No</th>
                                <th>Types & Roles</th>
                                <th>Description</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover">
                                    <td class="text-center font-medium opacity-60"><?php echo e($activities->firstItem() + $key); ?></td>
                                    <td>
                                        <div class="font-bold"><?php echo e($item->organization ?? 'N/A'); ?></div>
                                        <div class="text-xs opacity-60"><?php echo e($item->role); ?></div>
                                    </td>
                                    <td>
                                        <div class="truncate max-w-xs text-sm" title="<?php echo e($item->description); ?>">
                                            <?php echo e($item->description); ?>

                                        </div>
                                    </td>
                                    <td class="text-center text-sm">
                                        <?php echo e(\Carbon\Carbon::parse($item->activity_date)->format('d M Y')); ?>

                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge <?php echo e($item->status == 'VERIFIED' ? 'badge-success' : ($item->status == 'REJECTED' ? 'badge-error' : ($item->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost'))); ?>">
                                            <?php echo e($item->status); ?>

                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="join">
                                            <a href="<?php echo e(route('lecturer.support.show', $item->id)); ?>"
                                                class="btn btn-xs btn-outline join-item">Detail</a>
                                            <?php if(in_array($item->status, ['DRAFT', 'REJECTED'])): ?>
                                                <a href="<?php echo e(route('lecturer.support.edit', $item->id)); ?>"
                                                    class="btn btn-xs btn-ghost join-item text-warning">Edit</a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-8 opacity-50">There is no data on supporting
                                        activities yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-base-200"><?php echo e($activities->links()); ?></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/support/index.blade.php ENDPATH**/ ?>