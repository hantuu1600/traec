

<?php $__env->startSection('content'); ?>
  
  <?php if (isset($component)) { $__componentOriginal3b01e6dd3517f0077cf5b27131e5fa66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b01e6dd3517f0077cf5b27131e5fa66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-dashboard','data' => ['title' => 'Tracker Academic','subtitle' => 'Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('hero-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tracker Academic','subtitle' => 'Track your daily routines, stay consistent, and turn goals into habits all in one beautiful app.']); ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b01e6dd3517f0077cf5b27131e5fa66)): ?>
<?php $attributes = $__attributesOriginal3b01e6dd3517f0077cf5b27131e5fa66; ?>
<?php unset($__attributesOriginal3b01e6dd3517f0077cf5b27131e5fa66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b01e6dd3517f0077cf5b27131e5fa66)): ?>
<?php $component = $__componentOriginal3b01e6dd3517f0077cf5b27131e5fa66; ?>
<?php unset($__componentOriginal3b01e6dd3517f0077cf5b27131e5fa66); ?>
<?php endif; ?>

  
  <?php if (isset($component)) { $__componentOriginala974b045d29f0dce29af4fd4c33e2bcf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala974b045d29f0dce29af4fd4c33e2bcf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.activity-stats','data' => ['stats' => $stats]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('activity-stats'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala974b045d29f0dce29af4fd4c33e2bcf)): ?>
<?php $attributes = $__attributesOriginala974b045d29f0dce29af4fd4c33e2bcf; ?>
<?php unset($__attributesOriginala974b045d29f0dce29af4fd4c33e2bcf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala974b045d29f0dce29af4fd4c33e2bcf)): ?>
<?php $component = $__componentOriginala974b045d29f0dce29af4fd4c33e2bcf; ?>
<?php unset($__componentOriginala974b045d29f0dce29af4fd4c33e2bcf); ?>
<?php endif; ?>

  
  <?php if (isset($component)) { $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-dashboard','data' => ['filters' => ['All', 'Teaching', 'Research', 'Community Service', 'Support', 'Other'],'placeholder' => 'Search activity...','action' => ''.e(url()->current()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['All', 'Teaching', 'Research', 'Community Service', 'Support', 'Other']),'placeholder' => 'Search activity...','action' => ''.e(url()->current()).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c)): ?>
<?php $attributes = $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c; ?>
<?php unset($__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ac2915b2fdd8f1531597e30ada0003c)): ?>
<?php $component = $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c; ?>
<?php unset($__componentOriginal8ac2915b2fdd8f1531597e30ada0003c); ?>
<?php endif; ?>


  
  <?php if (isset($component)) { $__componentOriginala0f7b3d3a55966a5e4f9a644f6950171 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0f7b3d3a55966a5e4f9a644f6950171 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.activity-table-lecturer','data' => ['rows' => $rows]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('activity-table-lecturer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rows)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0f7b3d3a55966a5e4f9a644f6950171)): ?>
<?php $attributes = $__attributesOriginala0f7b3d3a55966a5e4f9a644f6950171; ?>
<?php unset($__attributesOriginala0f7b3d3a55966a5e4f9a644f6950171); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0f7b3d3a55966a5e4f9a644f6950171)): ?>
<?php $component = $__componentOriginala0f7b3d3a55966a5e4f9a644f6950171; ?>
<?php unset($__componentOriginala0f7b3d3a55966a5e4f9a644f6950171); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/dashboard.blade.php ENDPATH**/ ?>