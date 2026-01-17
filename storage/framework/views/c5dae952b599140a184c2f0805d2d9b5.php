<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">
        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Add Support','description' => 'Please complete the new support activity form.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Support','description' => 'Please complete the new support activity form.']); ?>
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

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-6">
                <?php if (isset($component)) { $__componentOriginaldaef2dda62c3832ec12c60d5b9527973 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldaef2dda62c3832ec12c60d5b9527973 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.support-form','data' => ['activity' => $activity]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('support-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['activity' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($activity)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldaef2dda62c3832ec12c60d5b9527973)): ?>
<?php $attributes = $__attributesOriginaldaef2dda62c3832ec12c60d5b9527973; ?>
<?php unset($__attributesOriginaldaef2dda62c3832ec12c60d5b9527973); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaef2dda62c3832ec12c60d5b9527973)): ?>
<?php $component = $__componentOriginaldaef2dda62c3832ec12c60d5b9527973; ?>
<?php unset($__componentOriginaldaef2dda62c3832ec12c60d5b9527973); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="<?php echo e(route('lecturer.support.index')); ?>" class="btn btn-outline btn-secondary">Cancel</a>
            <button form="support-form" type="submit" class="btn btn-primary">Save Change</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/support/create.blade.php ENDPATH**/ ?>