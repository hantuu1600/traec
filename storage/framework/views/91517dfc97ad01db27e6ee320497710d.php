<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manage Lecturers</h1>
            <p class="text-gray-500 text-sm">Validate, add, and manage all lecturer data.</p>
        </div>
        <a href="<?php echo e(route('admin.lecturers.create')); ?>" class="btn btn-primary text-white">
            + Add Lecturer
        </a>
    </div>

    
    <div class="mb-4">
        <form action="<?php echo e(route('admin.lecturers.index')); ?>" method="GET" class="flex gap-2">
            <input type="text" name="q" placeholder="Search by name, NIDN, or study program..." value="<?php echo e(request('q')); ?>"
                class="input input-bordered w-full max-w-sm" />
            <button type="submit" class="btn">Search</button>
        </form>
    </div>

    
    <div class="card bg-base-100 shadow-sm border border-base-200">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr class="bg-base-200">
                        <th class="w-12">No</th>
                        <th>NIDN</th>
                        <th>Lecturer's Name</th>
                        <th>Study Program</th>
                        <th>Email</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-base-50">
                            <th><?php echo e($loop->iteration + $lecturers->firstItem() - 1); ?></th>
                            <td class="font-mono text-sm"><?php echo e($lecturer->nidn); ?></td>
                            <td class="font-bold"><?php echo e($lecturer->name); ?></td>
                            <td><?php echo e($lecturer->prodi); ?></td>
                            <td class="text-sm opacity-75"><?php echo e($lecturer->email); ?></td>
                            <td class="text-right flex justify-end gap-2">
                                <a href="<?php echo e(route('admin.lecturers.edit', $lecturer->id)); ?>"
                                    class="btn btn-xs btn-outline btn-warning">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('admin.lecturers.destroy', $lecturer->id)); ?>" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this lecturer? The data will be soft-deleted.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-xs btn-outline btn-error">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">
                                No lecturer data found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4 border-t border-base-200">
            <?php echo e($lecturers->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/lecturers/index.blade.php ENDPATH**/ ?>