<?php $__env->startSection('content'); ?>
<div class="w-full max-w-7xl mx-auto space-y-6">

    <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Teaching Schedule','description' => 'Manage and review your teaching schedules for each semester.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Teaching Schedule','description' => 'Manage and review your teaching schedules for each semester.']); ?>
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

    <?php if (isset($component)) { $__componentOriginalcf15d8f490a3b6b488fc82ec732988f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf15d8f490a3b6b488fc82ec732988f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teaching-table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teaching-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-bold text-secondary">
                    Schedule List
                </h2>
                <p class="text-sm text-secondary/60">
                    List of courses you are currently teaching.
                </p>
            </div>
        </div>

        
        <?php $__currentLoopData = $teachings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teaching): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal015d45bc3ea380b71597cc0ae99d284f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal015d45bc3ea380b71597cc0ae99d284f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teaching-row','data' => ['number' => $loop->iteration,'id' => $teaching->id,'courseName' => $teaching->course_name,'studyProgram' => $teaching->study_program,'semester' => $teaching->semester,'credits' => $teaching->credits,'meetingsTotal' => $teaching->meetings_total,'startDate' => $teaching->start_date,'endDate' => $teaching->end_date,'year' => $teaching->year,'status' => $teaching->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teaching-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loop->iteration),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->id),'courseName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->course_name),'studyProgram' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->study_program),'semester' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->semester),'credits' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->credits),'meetingsTotal' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->meetings_total),'startDate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->start_date),'endDate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->end_date),'year' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->year),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaching->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal015d45bc3ea380b71597cc0ae99d284f)): ?>
<?php $attributes = $__attributesOriginal015d45bc3ea380b71597cc0ae99d284f; ?>
<?php unset($__attributesOriginal015d45bc3ea380b71597cc0ae99d284f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal015d45bc3ea380b71597cc0ae99d284f)): ?>
<?php $component = $__componentOriginal015d45bc3ea380b71597cc0ae99d284f; ?>
<?php unset($__componentOriginal015d45bc3ea380b71597cc0ae99d284f); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf15d8f490a3b6b488fc82ec732988f0)): ?>
<?php $attributes = $__attributesOriginalcf15d8f490a3b6b488fc82ec732988f0; ?>
<?php unset($__attributesOriginalcf15d8f490a3b6b488fc82ec732988f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf15d8f490a3b6b488fc82ec732988f0)): ?>
<?php $component = $__componentOriginalcf15d8f490a3b6b488fc82ec732988f0; ?>
<?php unset($__componentOriginalcf15d8f490a3b6b488fc82ec732988f0); ?>
<?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/teaching.blade.php ENDPATH**/ ?>