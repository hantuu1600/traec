<?php $__env->startSection('content'); ?>
    <?php
        $q = $filters['q'] ?? request('q', '');
        $semester = $filters['semester'] ?? request('semester', '');
        $status = $filters['status'] ?? request('status', '');
    ?>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

        <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-1">
                <h1 class="text-2xl font-semibold text-secondary">Teaching Schedule</h1>
                <p class="text-sm text-base-content/60">
                    Manage and review your teaching schedules for each semester.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('lecturer.teaching.create')); ?>" class="btn btn-primary btn-sm">
                    Add Teaching
                </a>
            </div>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-4">

                <form method="GET" class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                    <div class="join w-full lg:w-auto">
                        <input type="text" name="q" value="<?php echo e($q); ?>"
                            class="input input-bordered join-item w-full lg:w-80"
                            placeholder="Search course, program, semester, year..." />
                        <button class="btn join-item" type="submit">Search</button>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <select name="semester" class="select select-bordered w-full sm:w-60" onchange="this.form.submit()">
                            <option value="" <?php echo e($semester === '' ? 'selected' : ''); ?>>All Semester</option>
                            <option value="2025/2026 Ganjil" <?php echo e($semester === '2025/2026 Ganjil' ? 'selected' : ''); ?>>
                                2025/2026 Ganjil
                            </option>
                            <option value="2025/2026 Genap" <?php echo e($semester === '2025/2026 Genap' ? 'selected' : ''); ?>>
                                2025/2026 Genap
                            </option>
                        </select>

                        <select name="status" class="select select-bordered w-full sm:w-44" onchange="this.form.submit()">
                            <option value="" <?php echo e($status === '' ? 'selected' : ''); ?>>All Status</option>
                            <option value="Draft" <?php echo e($status === 'Draft' ? 'selected' : ''); ?>>Draft</option>
                            <option value="Submitted" <?php echo e($status === 'Submitted' ? 'selected' : ''); ?>>Submitted</option>
                            <option value="Returned" <?php echo e($status === 'Returned' ? 'selected' : ''); ?>>Returned</option>
                            <option value="Verified" <?php echo e($status === 'Verified' ? 'selected' : ''); ?>>Verified</option>
                        </select>

                        <?php if($q || $semester || $status): ?>
                            <a href="<?php echo e(route('lecturer.teaching.index')); ?>" class="btn btn-ghost">
                                Reset
                            </a>
                        <?php endif; ?>
                    </div>
                </form>

                <?php if($teachings->count() > 0): ?>
                    <div class="overflow-x-auto rounded-box border border-base-300">
                        <table class="table table-zebra bg-base-100">
                            <thead>
                                <tr>
                                    <th class="w-[36%]">Course</th>
                                    <th>Semester</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $teachings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teaching): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="font-medium"><?php echo e($teaching->course_name); ?></div>
                                            <div class="text-sm text-base-content/60 line-clamp-1">
                                                <?php echo e($teaching->study_program); ?>

                                            </div>
                                        </td>
                                        <td><?php echo e($teaching->semester); ?></td>
                                        <td><?php echo e($teaching->year); ?></td>
                                        <td>
                                            <?php if (isset($component)) { $__componentOriginal8c81617a70e11bcf247c4db924ab1b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-badge','data' => ['status' => $teaching->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $attributes = $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $component = $__componentOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <a href="<?php echo e(route('lecturer.teaching.show', $teaching->id)); ?>"
                                                    class="btn btn-ghost btn-xs">
                                                    Detail
                                                </a>

                                                <?php if(strtolower($teaching->status) !== 'verified'): ?>
                                                    <a href="<?php echo e(route('lecturer.teaching.request.edit', $teaching->id)); ?>"
                                                        class="btn btn-outline btn-xs">
                                                        Request Update
                                                    </a>
                                                <?php else: ?>
                                                    <button class="btn btn-ghost btn-xs" disabled
                                                        title="Verified items are locked">
                                                        Locked
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex items-center justify-end">
                        <?php echo e($teachings->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="rounded-box border border-base-300 bg-base-100 p-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="space-y-1">
                                <div class="text-lg font-semibold text-secondary">No teaching schedules found</div>
                                <div class="text-sm text-base-content/60">
                                    Try adjusting your search/filter, or add a new teaching schedule.
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="<?php echo e(route('lecturer.teaching.index')); ?>" class="btn btn-ghost">Reset</a>
                                <a href="<?php echo e(route('lecturer.teaching.create')); ?>" class="btn btn-primary">Add Teaching</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/teaching/index.blade.php ENDPATH**/ ?>