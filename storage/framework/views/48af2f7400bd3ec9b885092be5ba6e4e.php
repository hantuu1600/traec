<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-8">
        
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-3xl font-bold text-base-content"><?php echo e($activity->organization ?? 'Support Activity'); ?></h1>
                <div class="flex items-center gap-2 mt-2">
                    <span
                        class="badge badge-lg <?php echo e($activity->status == 'VERIFIED' ? 'badge-success' : ($activity->status == 'REJECTED' ? 'badge-error' : ($activity->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost'))); ?>">
                        <?php echo e($activity->status); ?>

                    </span>
                    <span class="text-sm opacity-60 pl-2 border-l border-base-300">Created:
                        <?php echo e(\Carbon\Carbon::parse($activity->created_at)->format('d M Y')); ?></span>
                </div>
            </div>
            <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                <a href="<?php echo e(route('lecturer.support.edit', $activity->id)); ?>" class="btn btn-warning btn-outline">Edit</a>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-2 card bg-base-100 border border-base-300">
                <div class="card-body">
                    <h3 class="font-bold text-lg mb-4 border-b pb-2">Detail Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs uppercase font-bold opacity-50">Role</label>
                            <p class="font-medium text-lg"><?php echo e($activity->role); ?></p>
                        </div>
                        <div>
                            <label class="text-xs uppercase font-bold opacity-50">Activity Date</label>
                            <p class="font-medium text-lg">
                                <?php echo e(\Carbon\Carbon::parse($activity->activity_date)->format('d M Y')); ?>

                            </p>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-xs uppercase font-bold opacity-50">Description</label>
                            <p class="mt-1 leading-relaxed"><?php echo e($activity->description); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="space-y-6">
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h3 class="font-bold text-lg mb-4">Evidence</h3>
                        <div class="space-y-3">
                            <?php $__empty_1 = true; $__currentLoopData = $evidences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex justify-between items-center p-2 bg-base-200 rounded">
                                    <a href="<?php echo e(Storage::url($ev->file_path)); ?>" target="_blank"
                                        class="link link-primary text-sm truncate w-40"><?php echo e($ev->file_name); ?></a>
                                    <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                                        <form
                                            action="<?php echo e(route('lecturer.support.evidence.delete', ['id' => $activity->id, 'evidenceId' => $ev->id])); ?>"
                                            method="POST" onsubmit="return confirm('Delete?')">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-xs btn-square btn-ghost text-error">X</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center text-sm opacity-50 py-4">There is no evidence yet.</div>
                            <?php endif; ?>
                        </div>
                        <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                            <button onclick="upload_modal.showModal()" class="btn btn-sm btn-outline w-full mt-4">Upload
                                Evidence</button>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h3 class="font-bold text-lg mb-2">Aksi</h3>
                        <?php if($activity->status == 'DRAFT' || $activity->status == 'REJECTED'): ?>
                            <form action="<?php echo e(route('lecturer.support.submit', $activity->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-primary w-full" <?php echo e($evidences->isEmpty() ? 'disabled' : ''); ?>>Submit
                                    Verification</button>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-info text-xs">Status: <?php echo e($activity->status); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <dialog id="upload_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Upload Evidence</h3>
            <form action="<?php echo e(route('lecturer.support.evidence.upload', $activity->id)); ?>" method="POST"
                enctype="multipart/form-data" class="space-y-4 mt-4">
                <?php echo csrf_field(); ?>
                <input type="file" name="evidence_file" class="file-input file-input-bordered w-full" required />
                <input type="text" name="description" class="input input-bordered w-full"
                    placeholder="Description (Optional)" />
                <div class="modal-action">
                    <button type="button" class="btn" onclick="upload_modal.close()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop"><button>close</button></form>
    </dialog>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/support/show.blade.php ENDPATH**/ ?>