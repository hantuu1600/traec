<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['research']));

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

foreach (array_filter((['research']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form id="research-form" method="POST"
    action="<?php echo e($research->id ? route('lecturer.research.update', $research->id) : route('lecturer.research.store')); ?>"
    class="space-y-6">
    <?php echo csrf_field(); ?>
    <?php if($research->id): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Research Title</span>
            </label>
            <input type="text" name="title" class="input input-bordered w-full"
                value="<?php echo e(old('title', $research->title)); ?>" required>
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Research Type (ID)</span>
            </label>
            <input type="number" name="type_id" class="input input-bordered w-full"
                value="<?php echo e(old('type_id', $research->type_id)); ?>">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Level / Rank (ID)</span>
            </label>
            <input type="number" name="rank_id" class="input input-bordered w-full"
                value="<?php echo e(old('rank_id', $research->rank_id)); ?>">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Role</span>
            </label>
            <input type="text" name="role" class="input input-bordered w-full"
                value="<?php echo e(old('role', $research->role)); ?>" placeholder="Author / Member">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Publisher</span>
            </label>
            <input type="text" name="publisher" class="input input-bordered w-full"
                value="<?php echo e(old('publisher', $research->publisher)); ?>">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">Year</span>
            </label>
            <input type="number" name="year" class="input input-bordered w-full"
                value="<?php echo e(old('year', $research->year)); ?>">
        </div>

        
        <div class="form-control">
            <label class="label pb-1">
                <span class="label-text font-medium">DOI</span>
            </label>
            <input type="text" name="doi" class="input input-bordered w-full" value="<?php echo e(old('doi', $research->doi)); ?>">
        </div>

        
        <div class="form-control md:col-span-2">
            <label class="label pb-1">
                <span class="label-text font-medium">Publication Link</span>
            </label>
            <input type="url" name="link" class="input input-bordered w-full"
                value="<?php echo e(old('link', $research->link)); ?>">
        </div>

        
        <div class="md:col-span-2 space-y-3 pt-4 border-t border-base-200">
            <div class="flex items-center justify-between gap-3">
                <h3 class="text-md font-semibold text-secondary">Research Members</h3>

                <button type="button" id="add-member-btn" class="btn btn-sm btn-outline btn-primary">
                    + Add Member
                </button>
            </div>

            <div class="overflow-x-auto rounded-box border border-base-300">
                <table class="table table-sm bg-base-100">
                    <thead>
                        <tr>
                            <th class="w-32">Type</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th class="text-center w-20">Action</th>
                        </tr>
                    </thead>
                    <tbody id="members-table-body"></tbody>
                </table>
            </div>
            <p class="text-sm text-base-content/60">
                Add lecturers (Internal) or students/external parties (External).
            </p>
        </div>
    </div>
</form><?php /**PATH D:\traec\resources\views/components/research-form.blade.php ENDPATH**/ ?>