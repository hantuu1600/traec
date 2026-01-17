<?php $__env->startSection('content'); ?>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="<?php echo e(route('admin.lecturers.index')); ?>" class="btn btn-ghost btn-sm">
                &larr; Back
            </a>
            <h1 class="text-2xl font-bold">Add New Lecturer</h1>
        </div>

        <div class="card bg-base-100 shadow-md border border-base-300">
            <form action="<?php echo e(route('admin.lecturers.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="card-body space-y-4">

                    
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Full Name</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter full name"
                            class="input input-bordered w-full" required />
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">NIDN</span></label>
                            <input type="text" name="nidn" value="<?php echo e(old('nidn')); ?>" placeholder="Enter NIDN"
                                class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Study Program</span></label>
                            <input type="text" name="prodi" value="<?php echo e(old('prodi')); ?>" placeholder="Example: Informatika"
                                class="input input-bordered w-full" required />
                        </div>
                    </div>

                    
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Email</span></label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="email@widyatama.ac.id"
                            class="input input-bordered w-full" required />
                    </div>

                    
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Password</span></label>
                        <input type="password" name="password" placeholder="Minimum 6 characters"
                            class="input input-bordered w-full" required />
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="submit" class="btn btn-primary text-white w-full md:w-auto">Save Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/lecturers/create.blade.php ENDPATH**/ ?>