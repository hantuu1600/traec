<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-8">

        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-base-content"><?php echo e($activity->title); ?></h1>
                <div class="flex flex-wrap items-center gap-2 mt-2">
                    <span class="badge badge-lg <?php echo e($activity->status == 'VERIFIED' ? 'badge-success' : ($activity->status == 'REJECTED' ? 'badge-error' : ($activity->status == 'SUBMITTED' ? 'badge-info' : 'badge-ghost'))); ?>">
                        <?php echo e($activity->status); ?>

                    </span>
                    <span class="text-sm text-base-content/60 border-l border-base-300 pl-2 ml-1">
                        Dibuat: <?php echo e(\Carbon\Carbon::parse($activity->created_at)->format('d M Y')); ?>

                    </span>
                </div>
            </div>

            <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                <a href="<?php echo e(route('lecturer.community-service.edit', $activity->id)); ?>" class="btn btn-outline btn-warning">
                    Edit Data
                </a>
            <?php endif; ?>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg border-b border-base-200 pb-2 mb-4">Activity Information</h2>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4">
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Target Partners</dt>
                                <dd class="font-medium mt-1"><?php echo e($activity->partner ?? '-'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Location</dt>
                                <dd class="font-medium mt-1"><?php echo e($activity->location ?? '-'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Start Date</dt>
                                <dd class="font-medium mt-1"><?php echo e($activity->start_date ? \Carbon\Carbon::parse($activity->start_date)->format('d M Y') : '-'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">End Date</dt>
                                <dd class="font-medium mt-1"><?php echo e($activity->end_date ? \Carbon\Carbon::parse($activity->end_date)->format('d M Y') : '-'); ?></dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-xs text-base-content/60 uppercase font-semibold">Your Role</dt>
                                <dd class="font-medium mt-1"><?php echo e($activity->role ?? '-'); ?></dd>
                            </div>
                        </dl>
                    </div>
                </div>

                
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg border-b border-base-200 pb-2 mb-4">Team Members</h2>
                        <div class="overflow-x-auto">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="font-medium"><?php echo e($member->name); ?></td>
                                        <td><?php echo e($member->role); ?></td>
                                        <td><span class="badge badge-sm badge-ghost">Member</span></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr><td colspan="3" class="text-center text-base-content/50">Tidak ada anggota tim.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="space-y-6">
                 <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-lg mb-4">Supporting Evidence</h2>
                        
                        
                        <div class="space-y-3 mb-6">
                            <?php $__empty_1 = true; $__currentLoopData = $evidences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex items-start justify-between p-3 bg-base-200/50 rounded-lg group">
                                    <div class="overflow-hidden">
                                        <a href="<?php echo e(Storage::url($ev->file_path)); ?>" target="_blank" class="link link-primary font-medium truncate block">
                                            <?php echo e($ev->file_name); ?>

                                        </a>
                                        <?php if($ev->description): ?>
                                            <p class="text-xs text-base-content/60 mt-1 truncate"><?php echo e($ev->description); ?></p>
                                        <?php endif; ?>
                                        <div class="text-[10px] text-base-content/40 mt-1 uppercase">
                                            <?php echo e($ev->created_at); ?>

                                        </div>
                                    </div>
                                    <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                                        <form action="<?php echo e(route('lecturer.community-service.evidence.delete', ['id' => $activity->id, 'evidenceId' => $ev->id])); ?>" method="POST" onsubmit="return confirm('Hapus bukti ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-square btn-xs btn-ghost text-error opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-6 text-sm text-base-content/50 border-2 border-dashed border-base-200 rounded-box">
                                    No evidence has been uploaded yet.
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <?php if(in_array($activity->status, ['DRAFT', 'REJECTED'])): ?>
                            <button onclick="upload_modal.showModal()" class="btn btn-outline btn-sm w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                Unggah Bukti
                            </button>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="card bg-base-100 border border-base-300">
                    <div class="card-body">
                         <h2 class="card-title text-lg mb-2">Action</h2>
                         
                         <?php if($activity->status == 'DRAFT'): ?>
                             <p class="text-sm text-base-content/60 mb-4">Make sure the data and evidence are complete before submitting verification.</p>
                             <form action="<?php echo e(route('lecturer.community-service.submit', $activity->id)); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <button type="submit" class="btn btn-primary w-full" <?php echo e($evidences->isEmpty() ? 'disabled' : ''); ?>>
                                     Submit Verification
                                 </button>
                             </form>
                         <?php elseif($activity->status == 'REJECTED'): ?>
                             <div class="alert alert-error text-xs mb-4">
                                 <span>Rejected. Please fix and submit again.</span>
                             </div>
                             <form action="<?php echo e(route('lecturer.community-service.submit', $activity->id)); ?>" method="POST">
                                 <?php echo csrf_field(); ?>
                                 <button type="submit" class="btn btn-primary w-full" <?php echo e($evidences->isEmpty() ? 'disabled' : ''); ?>>
                                     Submit Again
                                 </button>
                             </form>
                         <?php elseif($activity->status == 'SUBMITTED'): ?>
                             <div class="alert alert-info text-xs">
                                 <span>Waiting for admin verification.</span>
                             </div>
                         <?php elseif($activity->status == 'VERIFIED'): ?>
                              <div class="alert alert-success text-xs">
                                 <span>Data has been verified.</span>
                             </div>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <dialog id="upload_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Upload Supporting Evidence</h3>
            <p class="py-2 text-sm text-base-content/70">Format: PDF, JPG, PNG (Max 2MB)</p>
            
            <form action="<?php echo e(route('lecturer.community-service.evidence.upload', $activity->id)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                <?php echo csrf_field(); ?>
                <div class="form-control">
                    <input type="file" name="evidence_file" class="file-input file-input-bordered w-full" required />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text">Description (Optional)</span></label>
                    <input type="text" name="description" class="input input-bordered w-full" placeholder="Example: Final Report" />
                </div>
                <div class="modal-action">
                    <button type="button" class="btn" onclick="upload_modal.close()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/community-service/show.blade.php ENDPATH**/ ?>