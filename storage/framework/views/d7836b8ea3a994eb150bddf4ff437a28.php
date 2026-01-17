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

<form id="community-form" method="POST"
    action="<?php echo e($activity->id ? route('lecturer.community-service.update', $activity->id) : route('lecturer.community-service.store')); ?>"
    class="space-y-6">
    <?php echo csrf_field(); ?>
    <?php if($activity->id): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Service Activity Title</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full"
                value="<?php echo e(old('title', $activity->title)); ?>" required placeholder="Name of service activity">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Scheme</span>
            </label>
            <input type="text" name="scheme" class="input input-bordered w-full"
                value="<?php echo e(old('scheme', $activity->scheme)); ?>" placeholder="Program scheme or type">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Location</span>
            </label>
            <input type="text" name="location" class="input input-bordered w-full"
                value="<?php echo e(old('location', $activity->location)); ?>" placeholder="Place of implementation">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Start Date</span>
            </label>
            <input type="date" name="start_date" class="input input-bordered w-full"
                value="<?php echo e(old('start_date', $activity->start_date)); ?>">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">End Date</span>
            </label>
            <input type="date" name="end_date" class="input input-bordered w-full"
                value="<?php echo e(old('end_date', $activity->end_date)); ?>">
        </div>

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Role</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="<?php echo e(old('role', $activity->role)); ?>" placeholder="Leader / Member / Speaker">
        </div>

        
        <div class="md:col-span-2 space-y-3 pt-4 border-t border-base-200">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-md font-semibold text-secondary">Team Members</h3>

                <button type="button" id="add-member-btn" class="btn btn-sm btn-outline btn-primary">
                    + Add Member
                </button>
            </div>

            <div class="overflow-x-auto rounded-box border border-base-300">
                <table class="table table-sm bg-base-100">
                    <thead>
                        <tr>
                            <th class="w-32">Type</th>
                            <th>Member Name</th>
                            <th>Role</th>
                            <th class="text-center w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody id="members-table-body"></tbody>
                </table>
            </div>
            <p class="text-sm text-base-content/60">
                Add internal staff (Internal) or external students/partners (External).
            </p>
        </div>
    </div>
</form><?php /**PATH D:\traec\resources\views/components/community-form.blade.php ENDPATH**/ ?>