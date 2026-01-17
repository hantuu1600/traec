<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-8">

        <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Edit Research Activities','description' => 'Update your research or publication data.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Research Activities','description' => 'Update your research or publication data.']); ?>
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

        <div class="card bg-base-100 border border-base-300">
            <div class="card-body p-4 lg:p-6 space-y-6">
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

        <div class="flex items-center justify-end gap-3 pb-10">
            <a href="<?php echo e(route('lecturer.research.index')); ?>" class="btn btn-outline btn-secondary">
                Cancel
            </a>

            <button form="research-form" type="submit" class="btn btn-primary font-semibold">
                Save Changes
            </button>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let memberIndex = 0;
            const tableBody = document.getElementById('members-table-body');
            const addBtn = document.getElementById('add-member-btn');

            // Data from controller
            const lecturers = <?php echo json_encode($lecturers, 15, 512) ?>;
            const existingMembers = <?php echo json_encode($members ?? [], 15, 512) ?>;

            function createLecturerOptions(selectedId = null) {
                let options = '<option value="">-- Select Lecturer --</option>';
                lecturers.forEach(l => {
                    const selected = l.id == selectedId ? 'selected' : '';
                    options += `<option value="${l.id}" ${selected}>${l.name}</option>`;
                });
                return options;
            }

            function addRow(data = null) {
                const row = document.createElement('tr');
                const i = memberIndex;

                // Determine initial values
                let isInternal = true; // default
                let userId = '';
                let name = '';
                let role = '';

                if (data) {
                    // Existing member
                    userId = data.user_id || '';
                    name = data.name || '';
                    role = data.role || '';
                    if (!userId && name) {
                        isInternal = false;
                    }
                }

                row.innerHTML = `
                            <td>
                                <select class="select select-bordered select-sm w-full mb-1 member-type-select">
                                    <option value="internal" ${isInternal ? 'selected' : ''}>Lecturer (Internal)</option>
                                    <option value="external" ${!isInternal ? 'selected' : ''}>External / Student</option>
                                </select>
                            </td>
                            <td>
                                <div class="member-input-container">
                                    <!-- Internal Input -->
                                    <select name="members[${i}][user_id]" class="select select-bordered select-sm w-full internal-input ${!isInternal ? 'hidden' : ''}" ${!isInternal ? 'disabled' : ''}>
                                        ${createLecturerOptions(userId)}
                                    </select>
                                    <!-- External Input -->
                                    <input type="text" name="members[${i}][name]" 
                                           value="${name}"
                                           class="input input-bordered input-sm w-full external-input ${isInternal ? 'hidden' : ''}" 
                                           placeholder="Full Name" ${isInternal ? 'disabled' : ''}>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="members[${i}][role]"
                                       value="${role}"
                                       class="input input-bordered input-sm w-full"
                                       placeholder="Author / Member">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-outline btn-error remove-member-btn">
                                    Delete
                                </button>
                            </td>
                            `;

                tableBody?.appendChild(row);
                memberIndex++;

                // Event Listeners
                const typeSelect = row.querySelector('.member-type-select');
                const internalInput = row.querySelector('.internal-input');
                const externalInput = row.querySelector('.external-input');

                typeSelect.addEventListener('change', (e) => {
                    const isInt = e.target.value === 'internal';
                    if (isInt) {
                        internalInput.classList.remove('hidden');
                        internalInput.disabled = false;
                        externalInput.classList.add('hidden');
                        externalInput.disabled = true;
                    } else {
                        internalInput.classList.add('hidden');
                        internalInput.disabled = true;
                        externalInput.classList.remove('hidden');
                        externalInput.disabled = false;
                    }
                });
            }

            // Bind Add Button
            addBtn?.addEventListener('click', () => addRow());

            // Bind Remove Button (Delegation)
            tableBody?.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-member-btn')) {
                    e.target.closest('tr')?.remove();
                }
            });

            // Populate Check
            if (existingMembers && existingMembers.length > 0) {
                existingMembers.forEach(member => {
                    addRow(member);
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/research/edit.blade.php ENDPATH**/ ?>