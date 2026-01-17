<?php $__env->startSection('content'); ?>
<div class="w-full max-w-5xl mx-auto space-y-6">

    <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Add Research Activity','description' => 'Add a new research or publication record.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add Research Activity','description' => 'Add a new research or publication record.']); ?>
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

            <form method="POST" action="<?php echo e(route('lecturer.research.store')); ?>" class="space-y-6">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    
                    <div class="form-control md:col-span-2">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Title</span>
                        </label>
                        <input
                            type="text"
                            name="title"
                            class="input input-bordered w-full"
                            required
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Type</span>
                        </label>
                        <input
                            type="text"
                            name="type_id"
                            class="input input-bordered w-full"
                            required
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Rank</span>
                        </label>
                        <input
                            type="text"
                            name="rank_id"
                            class="input input-bordered w-full"
                            required
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Role</span>
                        </label>
                        <input
                            type="text"
                            name="role"
                            class="input input-bordered w-full"
                            placeholder="Author / Co-Author"
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Publisher</span>
                        </label>
                        <input
                            type="text"
                            name="publisher"
                            class="input input-bordered w-full"
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Year</span>
                        </label>
                        <input
                            type="number"
                            name="year"
                            class="input input-bordered w-full"
                        >
                    </div>

                    
                    <div class="form-control">
                        <label class="label pb-1">
                            <span class="label-text font-medium">DOI</span>
                        </label>
                        <input
                            type="text"
                            name="doi"
                            class="input input-bordered w-full"
                        >
                    </div>

                    
                    <div class="form-control md:col-span-2">
                        <label class="label pb-1">
                            <span class="label-text font-medium">Publication Link</span>
                        </label>
                        <input
                            type="url"
                            name="link"
                            class="input input-bordered w-full"
                        >
                    </div>

                    
                    <div class="md:col-span-2 space-y-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-md font-semibold text-secondary">
                                Research Members
                            </h3>

                            <button
                                type="button"
                                id="add-member-btn"
                                class="btn btn-sm btn-outline btn-primary"
                            >
                                + Add Member
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="members-table-body">
                                    
                                </tbody>
                            </table>
                        </div>

                        <p class="text-sm text-secondary/60">
                            Add lecturers involved in this research.
                        </p>
                    </div>


                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <a href="<?php echo e(route('lecturer.research.index')); ?>"
                       class="btn btn-outline btn-secondary">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary text-white">
                        Save Research
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let memberIndex = 0;
    const tableBody = document.getElementById('members-table-body');
    const addBtn = document.getElementById('add-member-btn');

    addBtn.addEventListener('click', () => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>
                <input
                    type="number"
                    name="members[${memberIndex}][user_id]"
                    class="input input-bordered input-sm w-full"
                    placeholder="User ID"
                    required
                >
            </td>

            <td>
                <input
                    type="text"
                    name="members[${memberIndex}][role]"
                    class="input input-bordered input-sm w-full"
                    placeholder="Author / Co-Author"
                >
            </td>

            <td class="text-center">
                <button
                    type="button"
                    class="btn btn-xs btn-outline btn-error remove-member-btn"
                >
                    Remove
                </button>
            </td>
        `;

        tableBody.appendChild(row);
        memberIndex++;
    });

    tableBody.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-member-btn')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>


<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/research-create.blade.php ENDPATH**/ ?>