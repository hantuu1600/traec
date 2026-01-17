<?php $__env->startSection('content'); ?>
<div class="w-full max-w-7xl mx-auto space-y-8">

    
    <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Edit Research Activity','description' => 'Update your research or publication information.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Research Activity','description' => 'Update your research or publication information.']); ?>
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
            <?php if (isset($component)) { $__componentOriginalf6b519ade6b41ce6d299b29f857db919 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf6b519ade6b41ce6d299b29f857db919 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.research-form','data' => ['research' => $research]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('research-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['research' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf6b519ade6b41ce6d299b29f857db919)): ?>
<?php $attributes = $__attributesOriginalf6b519ade6b41ce6d299b29f857db919; ?>
<?php unset($__attributesOriginalf6b519ade6b41ce6d299b29f857db919); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6b519ade6b41ce6d299b29f857db919)): ?>
<?php $component = $__componentOriginalf6b519ade6b41ce6d299b29f857db919; ?>
<?php unset($__componentOriginalf6b519ade6b41ce6d299b29f857db919); ?>
<?php endif; ?>
        </div>
    </div>

    
    <div class="flex items-center justify-end gap-4 pt-2 pb-10">
        <a
            href="<?php echo e(route('lecturer.research.index')); ?>"
            class="btn btn-outline btn-secondary"
        >
            Cancel
        </a>

        <button
            form="research-edit-form"
            type="submit"
            class="btn btn-primary text-white font-semibold"
        >
            Save Changes
        </button>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/research-edit.blade.php ENDPATH**/ ?>