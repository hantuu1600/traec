

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginaldb0d8ba27df61239bd34435200930eeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb0d8ba27df61239bd34435200930eeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.login-form','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('login-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb0d8ba27df61239bd34435200930eeb)): ?>
<?php $attributes = $__attributesOriginaldb0d8ba27df61239bd34435200930eeb; ?>
<?php unset($__attributesOriginaldb0d8ba27df61239bd34435200930eeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb0d8ba27df61239bd34435200930eeb)): ?>
<?php $component = $__componentOriginaldb0d8ba27df61239bd34435200930eeb; ?>
<?php unset($__componentOriginaldb0d8ba27df61239bd34435200930eeb); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>