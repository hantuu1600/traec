<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-lg mx-auto py-6">
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body">
                <h2 class="card-title mb-4">Edit Period</h2>
                <?php if (isset($component)) { $__componentOriginal94f2ed15644490cb7a6ca3844a6ff274 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94f2ed15644490cb7a6ca3844a6ff274 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.period-form','data' => ['period' => $period]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('period-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['period' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($period)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94f2ed15644490cb7a6ca3844a6ff274)): ?>
<?php $attributes = $__attributesOriginal94f2ed15644490cb7a6ca3844a6ff274; ?>
<?php unset($__attributesOriginal94f2ed15644490cb7a6ca3844a6ff274); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94f2ed15644490cb7a6ca3844a6ff274)): ?>
<?php $component = $__componentOriginal94f2ed15644490cb7a6ca3844a6ff274; ?>
<?php unset($__componentOriginal94f2ed15644490cb7a6ca3844a6ff274); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/periods/edit.blade.php ENDPATH**/ ?>