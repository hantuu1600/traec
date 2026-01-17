<?php $__env->startSection('content'); ?>
    <div class="container mx-auto max-w-4xl py-6">
        <div class="flex flex-col gap-2 mb-8">
            <h1 class="text-3xl font-bold text-secondary">Lecturer Profile</h1>
            <p class="text-base-content/60">Manage your personal and academic information.</p>
        </div>

        <?php if(session('success')): ?>
            <div role="alert" class="alert alert-success mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-1">
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body items-center text-center">
                        <div class="avatar placeholder mb-4">
                            <div class="bg-primary text-primary-content rounded-full w-24">
                                <span class="text-3xl font-bold"><?php echo e(substr($user->name, 0, 1)); ?></span>
                            </div>
                        </div>
                        <h2 class="card-title text-lg"><?php echo e($user->name); ?></h2>
                        <p class="text-sm text-base-content/60"><?php echo e($user->email); ?></p>
                        <div class="badge badge-outline mt-2"><?php echo e($user->role); ?></div>

                        <div class="divider"></div>

                        <a href="<?php echo e(route('password.edit')); ?>" class="btn btn-outline btn-sm w-full gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Change Password
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="md:col-span-2">
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body">
                        <h3 class="card-title text-lg mb-4">Edit Information</h3>

                        <form action="<?php echo e(route('lecturer.profile.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Full Name (with Degree)</span>
                                    </label>
                                    <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                        class="input input-bordered w-full <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required />
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-error text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">NIDN</span>
                                    </label>
                                    <input type="text" name="nidn" value="<?php echo e(old('nidn', $user->nidn)); ?>"
                                        class="input input-bordered w-full <?php $__errorArgs = ['nidn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required />
                                    <?php $__errorArgs = ['nidn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-error text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">WhatsApp Number</span>
                                    </label>
                                    <input type="text" name="phonenumber"
                                        value="<?php echo e(old('phonenumber', $user->phonenumber)); ?>"
                                        class="input input-bordered w-full <?php $__errorArgs = ['phonenumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required />
                                    <?php $__errorArgs = ['phonenumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-error text-xs mt-1"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Institution Email</span>
                                    </label>
                                    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                                        class="input input-bordered w-full <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        required />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-error text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="divider md:col-span-2 my-0"></div>

                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Functional Position</span>
                                    </label>
                                    <select name="position" class="select select-bordered w-full">
                                        <option value="Asisten Ahli" <?php echo e(old('position', $user->position) == 'Asisten Ahli' ? 'selected' : ''); ?>>Asisten Ahli</option>
                                        <option value="Lektor" <?php echo e(old('position', $user->position) == 'Lektor' ? 'selected' : ''); ?>>Lektor</option>
                                        <option value="Lektor Kepala" <?php echo e(old('position', $user->position) == 'Lektor Kepala' ? 'selected' : ''); ?>>Lektor Kepala</option>
                                        <option value="Guru Besar" <?php echo e(old('position', $user->position) == 'Guru Besar' ? 'selected' : ''); ?>>Guru Besar</option>
                                        <option value="Tenaga Pengajar" <?php echo e(old('position', $user->position) == 'Tenaga Pengajar' ? 'selected' : ''); ?>>Tenaga Pengajar</option>
                                    </select>
                                </div>

                                
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Study Program</span>
                                    </label>
                                    <select name="prodi" class="select select-bordered w-full" required>
                                        <option value="" disabled>Select Study Program</option>
                                        <?php $__currentLoopData = $prodis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($prodi); ?>" <?php echo e(old('prodi', $user->prodi) == $prodi ? 'selected' : ''); ?>>
                                                <?php echo e($prodi); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                
                                <div class="form-control md:col-span-2">
                                    <label class="label">
                                        <span class="label-text font-medium">Faculty</span>
                                    </label>
                                    <select name="faculty" class="select select-bordered w-full" required>
                                        <option value="" disabled>Select Faculty</option>
                                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($faculty); ?>" <?php echo e(old('faculty', $user->faculty) == $faculty ? 'selected' : ''); ?>>
                                                <?php echo e($faculty); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-control mt-8">
                                <button type="submit" class="btn btn-primary w-full md:w-auto md:self-end px-8">
                                    Save Change
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/profile.blade.php ENDPATH**/ ?>