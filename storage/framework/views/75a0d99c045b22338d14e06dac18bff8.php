<?php $__env->startSection('content'); ?>
<div class="w-full max-w-7xl mx-auto space-y-6">

    
    <div class="flex items-start justify-between gap-4">
        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Research Activities','description' => 'Manage and review your researches.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Research Activities','description' => 'Manage and review your researches.']); ?>
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

        <a
            href="<?php echo e(route('lecturer.research.create')); ?>"
            class="btn btn-primary btn-sm text-white mt-8"
        >
            + Add Research
        </a>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal101c9b7d9d6a6c454e9154b1cd3b3da6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal101c9b7d9d6a6c454e9154b1cd3b3da6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.research-table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('research-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php $__currentLoopData = $researchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal7ea4993c5851e4dfbc326e5e5e66fcd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ea4993c5851e4dfbc326e5e5e66fcd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.research-row','data' => ['number' => $loop->iteration,'id' => $research->id,'title' => $research->title,'typeId' => $research->type_id,'rankId' => $research->rank_id,'role' => $research->role,'publisher' => $research->publisher,'year' => $research->year,'doi' => $research->doi,'link' => $research->link,'status' => $research->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('research-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loop->iteration),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->id),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->title),'typeId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->type_id),'rankId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->rank_id),'role' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->role),'publisher' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->publisher),'year' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->year),'doi' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->doi),'link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->link),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($research->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ea4993c5851e4dfbc326e5e5e66fcd4)): ?>
<?php $attributes = $__attributesOriginal7ea4993c5851e4dfbc326e5e5e66fcd4; ?>
<?php unset($__attributesOriginal7ea4993c5851e4dfbc326e5e5e66fcd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ea4993c5851e4dfbc326e5e5e66fcd4)): ?>
<?php $component = $__componentOriginal7ea4993c5851e4dfbc326e5e5e66fcd4; ?>
<?php unset($__componentOriginal7ea4993c5851e4dfbc326e5e5e66fcd4); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal101c9b7d9d6a6c454e9154b1cd3b3da6)): ?>
<?php $attributes = $__attributesOriginal101c9b7d9d6a6c454e9154b1cd3b3da6; ?>
<?php unset($__attributesOriginal101c9b7d9d6a6c454e9154b1cd3b3da6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal101c9b7d9d6a6c454e9154b1cd3b3da6)): ?>
<?php $component = $__componentOriginal101c9b7d9d6a6c454e9154b1cd3b3da6; ?>
<?php unset($__componentOriginal101c9b7d9d6a6c454e9154b1cd3b3da6); ?>
<?php endif; ?>

    
    <?php $__currentLoopData = $researchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $research): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <input
            type="checkbox"
            id="research-member-modal-<?php echo e($research->id); ?>"
            class="modal-toggle"
        />

        <div class="modal">
            <div class="modal-box max-w-lg">

                <h3 class="font-bold text-lg">
                    Research Members
                </h3>

                <p class="text-sm text-secondary/70 mb-4">
                    <?php echo e($research->title); ?>

                </p>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $members[$research->id] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($member->name); ?></td>
                                <td><?php echo e($member->role); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center text-secondary/60">
                                    No members added.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="modal-action">
                    <label
                        for="research-member-modal-<?php echo e($research->id); ?>"
                        class="btn btn-sm"
                    >
                        Close
                    </label>
                </div>

            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/research.blade.php ENDPATH**/ ?>