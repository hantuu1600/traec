<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['period']));

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

foreach (array_filter((['period']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form action="<?php echo e($period->id ? route('admin.periods.update', $period->id) : route('admin.periods.store')); ?>"
    method="POST" class="space-y-4">
    <?php echo csrf_field(); ?>
    <?php if($period->id): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="form-control">
        <label class="label px-2"><span class="label-text">Nama Periode</span></label>
        <input type="text" name="name" value="<?php echo e(old('name', $period->name)); ?>" class="input input-bordered"
            placeholder="Contoh: Semester Ganjil 2025/2026" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="form-control">
            <label class="label"><span class="label-text">Tipe Periode</span></label>
            <select name="type" class="select select-bordered" required>
                <option value="SEMESTER" <?php echo e(old('type', $period->type) == 'SEMESTER' ? 'selected' : ''); ?>>Semester
                </option>
                <option value="YEARLY" <?php echo e(old('type', $period->type) == 'YEARLY' ? 'selected' : ''); ?>>Tahunan</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label"><span class="label-text">Tahun Akademik</span></label>
            <input type="text" name="academic_year" value="<?php echo e(old('academic_year', $period->academic_year)); ?>"
                class="input input-bordered" placeholder="2025/2026" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="form-control">
            <label class="label"><span class="label-text">Tanggal Mulai</span></label>
            <input type="date" name="start_date" value="<?php echo e(old('start_date', $period->start_date)); ?>"
                class="input input-bordered" required>
        </div>
        <div class="form-control">
            <label class="label"><span class="label-text">Tanggal Selesai</span></label>
            <input type="date" name="end_date" value="<?php echo e(old('end_date', $period->end_date)); ?>"
                class="input input-bordered" required>
        </div>
    </div>

    <?php if(!$period->id): ?>
        <div class="form-control">
            <label class="label cursor-pointer justify-start gap-4">
                <input type="checkbox" name="is_active" class="checkbox checkbox-primary" value="1" <?php echo e(old('is_active') ? 'checked' : ''); ?> />
                <span class="label-text">Jadikan Periode Aktif</span>
            </label>
        </div>
    <?php endif; ?>

    <div class="flex justify-end gap-2 mt-4">
        <a href="<?php echo e(route('admin.periods.index')); ?>" class="btn">Batal</a>
        <button class="btn btn-primary">Simpan</button>
    </div>
</form><?php /**PATH D:\traec\resources\views/components/period-form.blade.php ENDPATH**/ ?>