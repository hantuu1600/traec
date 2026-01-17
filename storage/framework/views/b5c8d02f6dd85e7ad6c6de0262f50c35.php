

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Activity Logs</h1>
                <p class="text-sm text-base-content/60">Pantau aktivitas pengguna sistem.</p>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="p-4 border-b border-base-200">
                    <form method="GET">
                        <input type="text" name="search" class="input input-bordered w-full max-w-xs"
                            placeholder="Cari user atau aktivitas..." value="<?php echo e(request('search')); ?>">
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full text-sm">
                        <thead>
                            <tr class="bg-base-200">
                                <th>Waktu</th>
                                <th>User</th>
                                <th>Aksi</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="whitespace-nowrap text-base-content/60">
                                        <?php echo e(\Carbon\Carbon::parse($log->created_at)->format('Y-m-d H:i:s')); ?>

                                    </td>
                                    <td>
                                        <div class="font-bold"><?php echo e($log->user_name); ?></div>
                                        <div class="text-xs opacity-60"><?php echo e($log->user_email); ?></div>
                                    </td>
                                    <td><span class="badge badge-outline"><?php echo e($log->action ?? 'LOG'); ?></span></td>
                                    <td>
                                        <div class="truncate max-w-xs" title="<?php echo e($log->description); ?>">
                                            <?php echo e($log->description); ?>

                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.logs.show', $log->id)); ?>"
                                            class="btn btn-xs btn-ghost">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 opacity-50">Tidak ada log.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="p-4"><?php echo e($logs->links()); ?></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/logs/index.blade.php ENDPATH**/ ?>