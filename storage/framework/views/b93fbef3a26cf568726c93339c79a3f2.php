

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        
        <div>
            <h1 class="text-3xl font-bold text-base-content">✅ Verified Documents</h1>
            <p class="text-base-content/60 mt-1">Semua aktivitas yang telah diverifikasi oleh admin</p>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Total Verified</div>
                    <div class="text-2xl font-bold text-success"><?php echo e($stats['total']); ?></div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Teaching</div>
                    <div class="text-2xl font-bold"><?php echo e($stats['teaching']); ?></div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Research</div>
                    <div class="text-2xl font-bold"><?php echo e($stats['research']); ?></div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Community</div>
                    <div class="text-2xl font-bold"><?php echo e($stats['community']); ?></div>
                </div>
            </div>
            <div class="card bg-base-100 border border-base-300">
                <div class="card-body p-4">
                    <div class="text-sm text-base-content/60">Support</div>
                    <div class="text-2xl font-bold"><?php echo e($stats['support']); ?></div>
                </div>
            </div>
        </div>

        
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4">
                <div class="tabs tabs-boxed bg-base-200">
                    <a href="<?php echo e(route('lecturer.verified-documents.index', ['category' => 'all'])); ?>"
                        class="tab <?php echo e($currentCategory == 'all' ? 'tab-active' : ''); ?>">All</a>
                    <a href="<?php echo e(route('lecturer.verified-documents.index', ['category' => 'teaching'])); ?>"
                        class="tab <?php echo e($currentCategory == 'teaching' ? 'tab-active' : ''); ?>">Teaching</a>
                    <a href="<?php echo e(route('lecturer.verified-documents.index', ['category' => 'research'])); ?>"
                        class="tab <?php echo e($currentCategory == 'research' ? 'tab-active' : ''); ?>">Research</a>
                    <a href="<?php echo e(route('lecturer.verified-documents.index', ['category' => 'community'])); ?>"
                        class="tab <?php echo e($currentCategory == 'community' ? 'tab-active' : ''); ?>">Community Service</a>
                    <a href="<?php echo e(route('lecturer.verified-documents.index', ['category' => 'support'])); ?>"
                        class="tab <?php echo e($currentCategory == 'support' ? 'tab-active' : ''); ?>">Support</a>
                </div>
            </div>
        </div>

        
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-0">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr class="text-base-content/70">
                                <th>Category</th>
                                <th>Activity Title</th>
                                <th>Period</th>
                                <th>Verified Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover">
                                    <td>
                                        <span class="badge badge-success badge-outline">
                                            <?php echo e($activity['category']); ?>

                                        </span>
                                    </td>
                                    <td class="font-semibold">
                                        <div class="max-w-md truncate"><?php echo e($activity['title']); ?></div>
                                    </td>
                                    <td class="text-base-content/80"><?php echo e($activity['period']); ?></td>
                                    <td class="text-base-content/70"><?php echo e($activity['date']); ?></td>
                                    <td>
                                        <?php
                                            $viewRoute = match ($activity['category']) {
                                                'Teaching' => route('lecturer.teaching.show', $activity['id']),
                                                'Research' => route('lecturer.research.show', $activity['id']),
                                                'Community Service' => route('lecturer.community-service.show', $activity['id']),
                                                'Support' => route('lecturer.support.show', $activity['id']),
                                                default => '#'
                                            };
                                        ?>
                                        <a href="<?php echo e($viewRoute); ?>" class="btn btn-sm btn-ghost">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-base-content/60">
                                        Belum ada dokumen yang diverifikasi.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <?php if($activities->hasPages()): ?>
                    <div class="p-4 border-t border-base-300">
                        <?php echo e($activities->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/verified-documents/index.blade.php ENDPATH**/ ?>