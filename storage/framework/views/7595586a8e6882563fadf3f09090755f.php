

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto p-6 space-y-6">

        <div class="flex items-start justify-between gap-4">
            <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Request Teaching Update','description' => 'Submit a change request to admin. Your request will be reviewed before any data is updated.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Request Teaching Update','description' => 'Submit a change request to admin. Your request will be reviewed before any data is updated.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f4210d70713eb379067ffc513b30014)): ?>
<?php $attributes = $__attributesOriginal5f4210d70713eb379067ffc513b30014; ?>
<?php unset($__attributesOriginal5f4210d70713eb379067ffc513b30014); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f4210d70713eb379067ffc513b30014)): ?>
<?php $component = $__componentOriginal5f4210d70713eb379067ffc513b30014; ?>
<?php unset($__componentOriginal5f4210d70713eb379067ffc513b30014); ?>
<?php endif; ?>

            <div class="flex gap-2">
                <a href="<?php echo e(route('lecturer.teaching.show', $teaching->id)); ?>" class="btn btn-ghost">
                    Back
                </a>
            </div>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <div>
                    <div class="font-semibold">Please fix the highlighted fields</div>
                    <ul class="list-disc ml-5 text-sm mt-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($err); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            
            <div class="lg:col-span-2">
                <div class="card bg-base-100 shadow-sm border border-base-300">
                    <div class="card-body space-y-6">

                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-semibold">Requested Changes</h2>
                                <p class="text-sm opacity-70">Update only what you need. Admin will validate and approve.
                                </p>
                            </div>
                            <span class="badge badge-outline">Request</span>
                        </div>

                        <form id="teaching-request-form" method="POST"
                            action="<?php echo e(route('lecturer.teaching.request.store', $teaching->id)); ?>">
                            <?php echo csrf_field(); ?>

                            
                            <div class="card bg-base-200 border border-base-300">
                                <div class="card-body p-4">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                                        <div>
                                            <div class="text-sm opacity-70">Course</div>
                                            <div class="font-semibold text-base"><?php echo e($teaching->course_name); ?></div>
                                        </div>

                                        <div class="flex flex-wrap gap-2">
                                            <span class="badge badge-ghost">
                                                <?php echo e($teaching->semester); ?>

                                            </span>
                                            <span class="badge badge-ghost">
                                                <?php echo e($teaching->year); ?>

                                            </span>
                                            <span class="badge badge-outline">
                                                <?php echo e($teaching->status ?? 'Draft'); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Study Program (requested)</span>
                                    </label>
                                    <input type="text" name="study_program"
                                        class="input input-bordered w-full <?php $__errorArgs = ['study_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('study_program', $teaching->study_program)); ?>"
                                        placeholder="e.g. Informatics">
                                    <?php $__errorArgs = ['study_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Semester (requested)</span>
                                    </label>
                                    <input type="text" name="semester"
                                        class="input input-bordered w-full <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('semester', $teaching->semester)); ?>"
                                        placeholder="e.g. Ganjil 2025/2026">
                                    <?php $__errorArgs = ['semester'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Credits (requested)</span>
                                    </label>
                                    <input type="number" min="1" name="credits"
                                        class="input input-bordered w-full <?php $__errorArgs = ['credits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('credits', $teaching->credits)); ?>">
                                    <?php $__errorArgs = ['credits'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Total Meetings (requested)</span>
                                    </label>
                                    <input type="number" min="1" name="meetings_total"
                                        class="input input-bordered w-full <?php $__errorArgs = ['meetings_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('meetings_total', $teaching->meetings_total)); ?>">
                                    <?php $__errorArgs = ['meetings_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Start Date (requested)</span>
                                    </label>
                                    <input type="date" name="start_date"
                                        class="input input-bordered w-full <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('start_date', $teaching->start_date)); ?>">
                                    <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">End Date (requested)</span>
                                    </label>
                                    <input type="date" name="end_date"
                                        class="input input-bordered w-full <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('end_date', $teaching->end_date)); ?>">
                                    <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control md:col-span-2">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Year (requested)</span>
                                    </label>
                                    <input type="number" min="1900" max="2100" name="year"
                                        class="input input-bordered w-full <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('year', $teaching->year)); ?>">
                                    <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-control md:col-span-2">
                                    <label class="label pb-1">
                                        <span class="label-text font-medium">Reason</span>
                                        <span class="label-text-alt opacity-70">Required</span>
                                    </label>
                                    <textarea name="reason"
                                        class="textarea textarea-bordered w-full min-h-[120px] <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> textarea-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Explain what you want to change and why. Be specific."><?php echo e(old('reason')); ?></textarea>

                                    <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <label class="label"><span
                                                class="label-text-alt text-error"><?php echo e($message); ?></span></label>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <label class="label">
                                        <span class="label-text-alt opacity-70">
                                            Tip: mention the exact field(s) and the correct value(s).
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </form>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="<?php echo e(route('lecturer.teaching.show', $teaching->id)); ?>"
                                class="btn btn-outline btn-secondary">
                                Cancel
                            </a>

                            <button form="teaching-request-form" type="submit" class="btn btn-primary">
                                Submit Request
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="lg:col-span-1 space-y-6">

                <div class="card bg-base-100 shadow-sm border border-base-300">
                    <div class="card-body space-y-3">
                        <h3 class="font-semibold">What happens next</h3>

                        <ul class="steps steps-vertical">
                            <li class="step step-primary">Submit request</li>
                            <li class="step">Admin reviews</li>
                            <li class="step">Approved / Rejected</li>
                        </ul>

                        <div class="alert">
                            <span class="text-sm">
                                Requests are not applied immediately. Admin approval is required.
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-sm border border-base-300">
                    <div class="card-body space-y-3">
                        <h3 class="font-semibold">Current values</h3>

                        <div class="grid grid-cols-1 gap-2 text-sm">
                            <div class="flex justify-between gap-3">
                                <span class="opacity-70">Study Program</span>
                                <span class="font-medium text-right"><?php echo e($teaching->study_program); ?></span>
                            </div>
                            <div class="flex justify-between gap-3">
                                <span class="opacity-70">Credits</span>
                                <span class="font-medium"><?php echo e($teaching->credits); ?></span>
                            </div>
                            <div class="flex justify-between gap-3">
                                <span class="opacity-70">Meetings</span>
                                <span class="font-medium"><?php echo e($teaching->meetings_total); ?></span>
                            </div>
                            <div class="flex justify-between gap-3">
                                <span class="opacity-70">Start</span>
                                <span class="font-medium text-right"><?php echo e($teaching->start_date ?? '-'); ?></span>
                            </div>
                            <div class="flex justify-between gap-3">
                                <span class="opacity-70">End</span>
                                <span class="font-medium text-right"><?php echo e($teaching->end_date ?? '-'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100 shadow-sm border border-base-300">
                    <div class="card-body space-y-2">
                        <h3 class="font-semibold">Good request examples</h3>
                        <div class="text-sm opacity-80 space-y-2">
                            <div class="p-3 rounded-lg bg-base-200 border border-base-300">
                                “Please change meetings total from 14 to 16 due to schedule update from department.”
                            </div>
                            <div class="p-3 rounded-lg bg-base-200 border border-base-300">
                                “Start date should be 2026-02-01 and end date 2026-06-15 based on official academic
                                calendar.”
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/teaching/request-edit.blade.php ENDPATH**/ ?>