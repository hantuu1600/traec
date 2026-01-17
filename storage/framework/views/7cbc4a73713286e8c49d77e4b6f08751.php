

<?php $__env->startSection('content'); ?>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="<?php echo e(route('admin.lecturers.index')); ?>" class="btn btn-ghost btn-sm">
                &larr; Kembali
            </a>
            <h1 class="text-2xl font-bold">Edit Data Dosen</h1>
        </div>

        <div class="card bg-base-100 shadow-md border border-base-300">
            <form action="<?php echo e(route('admin.lecturers.update', $lecturer->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-body space-y-4">

                    
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Nama Lengkap</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name', $lecturer->name)); ?>"
                            class="input input-bordered w-full" required />
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">NIDN</span></label>
                            <input type="text" name="nidn" value="<?php echo e(old('nidn', $lecturer->nidn)); ?>"
                                class="input input-bordered w-full" required />
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-semibold">Program Studi</span></label>
                            <input type="text" name="prodi" value="<?php echo e(old('prodi', $lecturer->prodi)); ?>"
                                class="input input-bordered w-full" required />
                        </div>
                    </div>

                    
                    <div class="form-control">
                        <label class="label"><span class="label-text font-semibold">Email</span></label>
                        <input type="email" name="email" value="<?php echo e(old('email', $lecturer->email)); ?>"
                            class="input input-bordered w-full" required />
                    </div>

                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Password Baru</span>
                            <span class="label-text-alt text-gray-500">(Kosongkan jika tidak ingin mengubah)</span>
                        </label>
                        <input type="password" name="password" placeholder="Minimal 6 karakter"
                            class="input input-bordered w-full" />
                    </div>

                    <div class="card-actions justify-end mt-6">
                        <button type="submit" class="btn btn-primary text-white w-full md:w-auto">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/lecturers/edit.blade.php ENDPATH**/ ?>