<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-lg mx-auto py-6">
        <div class="card bg-base-100 border border-base-300">
            <div class="card-body">
                <h2 class="card-title mb-4">Add new admin</h2>
                <?php if (isset($component)) { $__componentOriginal9041ccfdeb9106469263e548d378d3bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9041ccfdeb9106469263e548d378d3bd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9041ccfdeb9106469263e548d378d3bd)): ?>
<?php $attributes = $__attributesOriginal9041ccfdeb9106469263e548d378d3bd; ?>
<?php unset($__attributesOriginal9041ccfdeb9106469263e548d378d3bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9041ccfdeb9106469263e548d378d3bd)): ?>
<?php $component = $__componentOriginal9041ccfdeb9106469263e548d378d3bd; ?>
<?php unset($__componentOriginal9041ccfdeb9106469263e548d378d3bd); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-admin-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/superadmin/admins/create.blade.php ENDPATH**/ ?>