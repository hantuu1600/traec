<div class="w-full max-w-xl mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300 w-[500px]">
        <div class="card-body space-y-6">

            
            <div class="flex items-center justify-center gap-4">
                <img src="<?php echo e(asset('images/widyatama.webp')); ?>" class="h-12 w-auto" alt="UTama Logo">
                <div class="w-0.5 h-10 bg-secondary opacity-40"></div>
                <img src="<?php echo e(asset('images/logo.webp')); ?>" class="h-12 w-auto" alt="Tremic Logo">
            </div>

            
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">Create New Account</h1>
                <p class="text-sm text-secondary/70">Complete your personal data to start joining
                    <strong>Tremic</strong>.</p>
            </div>

            
            <form id="registerForm" method="POST" action="<?php echo e(route('register.process')); ?>" class="space-y-4" novalidate>
                <?php echo csrf_field(); ?>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Full Name</span>
                    </label>
                    <input type="text" name="name" id="reg_name" value="<?php echo e(old('name')); ?>"
                        placeholder="Example: Budi Santoso, M.Kom" minlength="3" required
                        class="input input-bordered w-full <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p id="regNameError" class="text-sm text-error hidden mt-1">
                        Name must be at least 3 characters.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Institutional Email</span>
                    </label>
                    <input type="email" name="email" id="reg_email" value="<?php echo e(old('email')); ?>"
                        placeholder="dosen@widyatama.ac.id" required
                        class="input input-bordered w-full <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p id="regEmailError" class="text-sm text-error hidden mt-1">
                        Please enter a valid email address.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Password</span>
                    </label>
                    <input type="password" name="password" id="reg_password" placeholder="Minimum 8 characters"
                        minlength="8" required
                        class="input input-bordered w-full <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p id="regPasswordError" class="text-sm text-error hidden mt-1">
                        Password must be at least 8 characters.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">NIDN</span>
                    </label>
                    <input type="text" name="nidn" id="reg_nidn" value="<?php echo e(old('nidn')); ?>"
                        placeholder="Example: 0412345678" pattern="[0-9]+" minlength="6" inputmode="numeric" required
                        class="input input-bordered w-full <?php $__errorArgs = ['nidn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p id="regNidnError" class="text-sm text-error hidden mt-1">
                        NIDN must contain numbers only (min 6 digits).
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Study program</span>
                    </label>
                    <select name="prodi" id="reg_prodi" required
                        class="select select-bordered w-full <?php $__errorArgs = ['prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="" disabled selected>Select Study Program</option>
                        <?php $__currentLoopData = ['Informatika', 'Sistem Informasi', 'Teknik Industri', 'Manajemen', 'Akuntansi', 'Desain Komunikasi Visual', 'Bahasa Inggris']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($prodi); ?>" <?php echo e(old('prodi') == $prodi ? 'selected' : ''); ?>><?php echo e($prodi); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p id="regProdiError" class="text-sm text-error hidden mt-1">
                        Please choose a Prodi.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Faculty</span>
                    </label>
                    <select name="faculty" id="reg_faculty" required
                        class="select select-bordered w-full <?php $__errorArgs = ['faculty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="" disabled selected>Choose your faculty</option>
                        <?php $__currentLoopData = ['Fakultas Teknik', 'Fakultas Bisnis & Manajemen', 'Fakultas Ekonomi', 'Fakultas Seni & Desain', 'Fakultas Bahasa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($faculty); ?>" <?php echo e(old('faculty') == $faculty ? 'selected' : ''); ?>><?php echo e($faculty); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p id="regFacultyError" class="text-sm text-error hidden mt-1">
                        Please choose a Faculty.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Academic Position</span>
                    </label>
                    <select name="position" id="reg_position" required
                        class="select select-bordered w-full <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> select-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="" disabled selected>Select Academic Position</option>
                        <?php $__currentLoopData = ['Dosen', 'Kaprodi', 'Sekprodi', 'Dekan', 'Wakil Dekan', 'Staff Pengajar', 'Peneliti']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($position); ?>" <?php echo e(old('position') == $position ? 'selected' : ''); ?>>
                                <?php echo e($position); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p id="regPositionError" class="text-sm text-error hidden mt-1">
                        Please choose a Position.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">WhatsApp / Phone Number</span>
                    </label>
                    <input type="tel" name="phonenumber" id="reg_phone" value="<?php echo e(old('phonenumber')); ?>"
                        placeholder="Example: 08123456789" minlength="10" maxlength="15" required
                        class="input input-bordered w-full <?php $__errorArgs = ['phonenumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <p id="regPhoneError" class="text-sm text-error hidden mt-1">
                        Phone number must be 10–15 digits (may start with +62).
                    </p>
                </div>

                
                <button type="submit" class="btn btn-primary w-full text-white font-bold text-lg">
                    Register
                </button>

                
                <div class="text-center pt-2">
                    <a href="<?php echo e(route('login')); ?>"
                        class="link link-secondary no-underline hover:underline text-sm font-medium">
                        Already have an account? <span class="text-primary">Login here</span>
                    </a>
                </div>
            </form>

        </div>
    </div>
</div><?php /**PATH D:\traec\resources\views/components/register-form.blade.php ENDPATH**/ ?>