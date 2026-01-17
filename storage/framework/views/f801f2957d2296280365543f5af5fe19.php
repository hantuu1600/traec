<div class="w-full max-w-md mx-auto">
    <div class="card bg-base-100 shadow-2xl border border-base-300">
        <div class="card-body space-y-6">

            
            <div class="flex items-center justify-center gap-4">

                
                <img src="<?php echo e(asset('images/widyatama.webp')); ?>" class="h-12 w-auto" alt="UTama Logo">

                <div class="w-0.5 h-10 bg-secondary opacity-40"></div>

                
                <img src="<?php echo e(asset('images/logo.webp')); ?>" class="h-12 w-auto" alt="Tremic Logo">
            </div>

            
            <div class="text-center space-y-3">
                <h1 class="text-3xl font-extrabold text-secondary">
                    e-Filling Lecturer
                </h1>

                <p class="text-sm text-secondary/70">
                    Please log in using your Email or NIDN.
                </p>
            </div>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success shadow-sm mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <form id="loginForm" method="POST" action="<?php echo e(route('login.process')); ?>" class="space-y-4" novalidate>
                <?php echo csrf_field(); ?>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Email / NIDN</span>
                    </label>

                    <input type="text" name="login_id" id="login_id" value="<?php echo e(old('login_id')); ?>"
                        placeholder="email@widyatama.ac.id / 041xxxx"
                        class="input input-bordered w-full <?php $__errorArgs = ['login_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                    <p id="loginIdError" class="text-sm text-error hidden mt-1">
                        Please enter a valid email address or numeric NIDN.
                    </p>
                </div>

                
                <div class="form-control">
                    <label class="label mb-1">
                        <span class="label-text text-secondary font-medium">Password</span>
                    </label>

                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="input input-bordered w-full <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                    <p id="passwordError" class="text-sm text-error hidden mt-1">
                        Password must be at least 8 characters long.
                    </p>
                </div>

                
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm checkbox-primary">
                        <span class="text-secondary">Remember me</span>
                    </label>

                    <a href="#" class="text-primary hover:underline font-medium">
                        Forgot password?
                    </a>
                </div>

                
                <div class="space-y-2 pt-3">
                    <button type="submit" class="btn btn-primary w-full text-white font-bold text-lg">
                        Log In
                    </button>
                    <br>
                    <div class="text-center">
                        <p class="text-sm text-secondary/70 inline-block">
                            Don't have an account?
                        </p>
                        <a href="<?php echo e(route('register')); ?>"
                            class="link link-secondary no-underline hover:underline text-sm font-medium ml-1">
                            Register Now
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div><?php /**PATH D:\traec\resources\views/components/login-form.blade.php ENDPATH**/ ?>