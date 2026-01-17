

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal1c08a6b69ef48b9aafed17fc0bba1523 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c08a6b69ef48b9aafed17fc0bba1523 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.register-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('register-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c08a6b69ef48b9aafed17fc0bba1523)): ?>
<?php $attributes = $__attributesOriginal1c08a6b69ef48b9aafed17fc0bba1523; ?>
<?php unset($__attributesOriginal1c08a6b69ef48b9aafed17fc0bba1523); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c08a6b69ef48b9aafed17fc0bba1523)): ?>
<?php $component = $__componentOriginal1c08a6b69ef48b9aafed17fc0bba1523; ?>
<?php unset($__componentOriginal1c08a6b69ef48b9aafed17fc0bba1523); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/register.blade.php ENDPATH**/ ?>