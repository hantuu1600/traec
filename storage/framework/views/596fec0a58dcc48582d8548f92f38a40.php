

<?php $__env->startSection('content'); ?>
  <?php
    // Dummy Data
    $rows = [
      [
        'id' => 1,
        'name' => 'Dr. Andi Pratama, S.Kom., M.T.',
        'nidn' => '0412345678',
        'email' => 'andi@kampus.ac.id',
        'role' => 'LECTURER',
        'study_program' => 'Teknik Informatika',
        'faculty' => 'Fakultas Teknik',
        'updated_at' => '2026-01-02 10:30:00',
        'view_url' => '#',
        'edit_url' => '#',
      ],
      [
        'id' => 2,
        'name' => 'Rina Sari, S.T., M.Kom.',
        'nidn' => '0499999999',
        'email' => 'rina@kampus.ac.id',
        'role' => 'LECTURER',
        'study_program' => 'Sistem Informasi',
        'faculty' => 'Fakultas Teknik',
        'updated_at' => '2025-12-28 09:10:00',
        'view_url' => '#',
        'edit_url' => '#',
      ],
    ];

    $filters = ['All', 'Teknik Informatika', 'Sistem Informasi'];
  ?>

  
  <?php if (isset($component)) { $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-dashboard','data' => ['filters' => $filters,'placeholder' => 'Search by name / NIDN / email','action' => '','method' => 'GET','filterName' => 'filter','queryName' => 'q']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filters),'placeholder' => 'Search by name / NIDN / email','action' => '','method' => 'GET','filterName' => 'filter','queryName' => 'q']); ?>
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

  <div class="mt-6">
    <?php if (isset($component)) { $__componentOriginala16fb75aed32d4945f7af01c0069eaf5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala16fb75aed32d4945f7af01c0069eaf5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-lecturers','data' => ['rows' => $rows,'title' => 'Lecturers','subtitle' => 'Data from users table (role = LECTURER)','addUrl' => '#','filterName' => 'filter','queryName' => 'q']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-lecturers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rows),'title' => 'Lecturers','subtitle' => 'Data from users table (role = LECTURER)','addUrl' => '#','filterName' => 'filter','queryName' => 'q']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala16fb75aed32d4945f7af01c0069eaf5)): ?>
<?php $attributes = $__attributesOriginala16fb75aed32d4945f7af01c0069eaf5; ?>
<?php unset($__attributesOriginala16fb75aed32d4945f7af01c0069eaf5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala16fb75aed32d4945f7af01c0069eaf5)): ?>
<?php $component = $__componentOriginala16fb75aed32d4945f7af01c0069eaf5; ?>
<?php unset($__componentOriginala16fb75aed32d4945f7af01c0069eaf5); ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-admin-layout', ['title' => 'Lecturers'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/admin/lecturers.blade.php ENDPATH**/ ?>