<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['teaching' => null]));

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

foreach (array_filter((['teaching' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Subject</span>
        </label>
        <input type="text" name="course_name" class="input input-bordered w-full"
            value="<?php echo e(old('course_name', $teaching->course_name ?? '')); ?>" placeholder="Example: Algoritma dan Pemrograman"
            required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Study Program</span>
        </label>
        <input type="text" name="study_program" class="input input-bordered w-full"
            value="<?php echo e(old('study_program', $teaching->study_program ?? '')); ?>" placeholder="Example: Informatika"
            required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Semester</span>
        </label>
        <input type="text" name="semester" class="input input-bordered w-full"
            value="<?php echo e(old('semester', $teaching->semester ?? '')); ?>" placeholder="Example: 1-8" required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Credits (SKS)</span>
        </label>
        <input type="number" name="credits" class="input input-bordered w-full"
            value="<?php echo e(old('credits', $teaching->credits ?? '')); ?>" min="1" required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Total Meetings</span>
        </label>
        <input type="number" name="meetings_total" class="input input-bordered w-full"
            value="<?php echo e(old('meetings_total', $teaching->meetings_total ?? '')); ?>" min="1" required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Academic Year</span>
        </label>
        <input type="number" name="year" class="input input-bordered w-full"
            value="<?php echo e(old('year', $teaching->year ?? date('Y'))); ?>" min="1900" max="2100" required>
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">Start Date</span>
        </label>
        <input type="date" name="start_date" class="input input-bordered w-full"
            value="<?php echo e(old('start_date', $teaching->start_date ?? '')); ?>">
    </div>

    
    <div class="form-control">
        <label class="label pb-1">
            <span class="label-text font-medium">End Date</span>
        </label>
        <input type="date" name="end_date" class="input input-bordered w-full"
            value="<?php echo e(old('end_date', $teaching->end_date ?? '')); ?>">
    </div>

</div><?php /**PATH D:\traec\resources\views/components/teaching-form.blade.php ENDPATH**/ ?>