<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Manage Admin</h1>
                <p class="text-sm text-base-content/60">Add or remove system admin access.</p>
            </div>
            <a href="<?php echo e(route('superadmin.admins.create')); ?>" class="btn btn-primary">+ Add New Admin</a>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Registered</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="font-bold"><?php echo e($admin->name); ?></td>
                                <td><?php echo e($admin->email); ?></td>
                                <td class="text-center text-sm opacity-60">
                                    <?php echo e($admin->created_at->format('d M Y')); ?>

                                </td>
                                <td class="text-center">
                                    <div class="join">
                                        <a href="<?php echo e(route('superadmin.admins.edit', $admin->id)); ?>"
                                            class="btn btn-xs join-item">Edit</a>
                                        <form action="<?php echo e(route('superadmin.admins.destroy', $admin->id)); ?>" method="POST"
                                            onsubmit="return confirm('Delete this admin access?')">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-xs btn-error join-item">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 opacity-50">No other admins found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4"><?php echo e($admins->links()); ?></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/superadmin/admins/index.blade.php ENDPATH**/ ?>