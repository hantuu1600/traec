<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['admin' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['admin' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form action="<?php echo e($admin ? route('superadmin.admins.update', $admin->id) : route('superadmin.admins.store')); ?>"
    method="POST" class="space-y-4">
    <?php echo csrf_field(); ?>
    <?php if($admin): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="form-control">
        <label class="label"><span class="label-text">Full Name</span></label>
        <input type="text" name="name" value="<?php echo e(old('name', $admin->name ?? '')); ?>" class="input input-bordered"
            required>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Email Address</span></label>
        <input type="email" name="email" value="<?php echo e(old('email', $admin->email ?? '')); ?>" class="input input-bordered"
            required>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Password
                <?php echo e($admin ? '(Leave blank if not changing)' : ''); ?></span></label>
        <input type="password" name="password" class="input input-bordered" <?php echo e($admin ? '' : 'required'); ?>>
    </div>

    <div class="form-control">
        <label class="label"><span class="label-text">Confirm Password</span></label>
        <input type="password" name="password_confirmation" class="input input-bordered" <?php echo e($admin ? '' : 'required'); ?>>
    </div>

    <div class="flex justify-end gap-2 mt-6">
        <a href="<?php echo e(route('superadmin.admins.index')); ?>" class="btn">Cancel</a>
        <button class="btn btn-primary">Save Admin</button>
    </div>
</form><?php /**PATH D:\traec\resources\views/components/admin-form.blade.php ENDPATH**/ ?>