<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['activity']));

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

foreach (array_filter((['activity']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form id="support-form" method="POST"
    action="<?php echo e($activity->id ? route('lecturer.support.update', $activity->id) : route('lecturer.support.store')); ?>"
    class="space-y-6">
    <?php echo csrf_field(); ?>
    <?php if($activity->id): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Organization / Institution</span>
            </label>
            <input type="text" name="organization" class="input input-bordered w-full"
                value="<?php echo e(old('organization', $activity->organization)); ?>"
                placeholder="Example: IEEE, ACM, University Committee">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Role / Position</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="<?php echo e(old('role', $activity->role)); ?>" required
                placeholder="Example: Member, Chairperson, Coordinator">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Implementation date</span>
            </label>
            <input type="date" name="activity_date" class="input input-bordered w-full"
                value="<?php echo e(old('activity_date', $activity->activity_date)); ?>" required>
        </div>

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Activity Description</span>
            </label>
            <textarea name="description" class="textarea textarea-bordered h-24" required
                placeholder="Describe the details of the activity..."><?php echo e(old('description', $activity->description)); ?></textarea>
        </div>
    </div>
</form><?php /**PATH D:\traec\resources\views/components/support-form.blade.php ENDPATH**/ ?>