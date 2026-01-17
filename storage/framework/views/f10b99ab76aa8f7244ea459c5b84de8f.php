

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">

        <div class="flex flex-col gap-1">
            <h1 class="text-2xl font-semibold text-secondary">Document Requests</h1>
            <p class="text-sm text-base-content/60">Review submissions from lecturers and verify documents.</p>
        </div>

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-4">
                <?php if (isset($component)) { $__componentOriginal333c62fc7950174a175d2dd4474200e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal333c62fc7950174a175d2dd4474200e5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.request-activity-table','data' => ['rows' => $rows]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('request-activity-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rows)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal333c62fc7950174a175d2dd4474200e5)): ?>
<?php $attributes = $__attributesOriginal333c62fc7950174a175d2dd4474200e5; ?>
<?php unset($__attributesOriginal333c62fc7950174a175d2dd4474200e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal333c62fc7950174a175d2dd4474200e5)): ?>
<?php $component = $__componentOriginal333c62fc7950174a175d2dd4474200e5; ?>
<?php unset($__componentOriginal333c62fc7950174a175d2dd4474200e5); ?>
<?php endif; ?>

                <div class="flex justify-end">
                    <?php echo e($rows->links()); ?>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-admin-layout', ['title' => $title ?? 'Documents'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/document-request.blade.php ENDPATH**/ ?>