<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto space-y-8 p-6">

        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Edit Jadwal Pengajaran','description' => 'Perbarui informasi jadwal pengajaran Anda.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Jadwal Pengajaran','description' => 'Perbarui informasi jadwal pengajaran Anda.']); ?>
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

        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body px-6 py-6 space-y-6">

                
                <form id="teaching-edit-form" method="POST" action="<?php echo e(route('lecturer.teaching.update', $teaching->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <?php if (isset($component)) { $__componentOriginal701c847577fcd085b104c370974b30ef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal701c847577fcd085b104c370974b30ef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teaching-form','data' => ['teaching' => $teaching]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teaching-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['teaching' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal701c847577fcd085b104c370974b30ef)): ?>
<?php $attributes = $__attributesOriginal701c847577fcd085b104c370974b30ef; ?>
<?php unset($__attributesOriginal701c847577fcd085b104c370974b30ef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal701c847577fcd085b104c370974b30ef)): ?>
<?php $component = $__componentOriginal701c847577fcd085b104c370974b30ef; ?>
<?php unset($__componentOriginal701c847577fcd085b104c370974b30ef); ?>
<?php endif; ?>

                </form>

            </div>
        </div>

        <div class="flex items-center justify-end gap-4 pt-2 pb-10">
            <a href="<?php echo e(route('lecturer.teaching.index')); ?>" class="btn btn-outline btn-secondary">
                Batal
            </a>

            <button form="teaching-edit-form" type="submit" class="btn btn-primary text-white font-semibold">
                Simpan Perubahan
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/teaching/edit.blade.php ENDPATH**/ ?>