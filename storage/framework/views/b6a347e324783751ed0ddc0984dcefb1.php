<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-7xl mx-auto space-y-6 p-6">

        
        <div class="flex items-start justify-between gap-4">
            <?php if (isset($component)) { $__componentOriginal5f4210d70713eb379067ffc513b30014 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f4210d70713eb379067ffc513b30014 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.lecturer-page-header','data' => ['title' => 'Detail Penelitian','description' => 'Lihat detail lengkap data penelitian Anda.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lecturer-page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Penelitian','description' => 'Lihat detail lengkap data penelitian Anda.']); ?>
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
            <div class="flex gap-2">
                <a href="<?php echo e(route('lecturer.research.index')); ?>" class="btn btn-ghost">
                    Back
                </a>
                <?php if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])): ?>
                    <a href="<?php echo e(route('lecturer.research.edit', $research->id)); ?>" class="btn btn-outline btn-warning">
                        Edit Data
                    </a>
                <?php elseif(strtoupper($research->status) == 'VERIFIED'): ?>
                    <a href="<?php echo e(route('lecturer.research.request.edit', $research->id)); ?>" class="btn btn-outline btn-sm">
                        Request Edit
                    </a>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">
                        <div class="text-sm opacity-60">Research Title</div>
                        <div class="font-semibold text-lg"><?php echo e($research->title); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Jenis Penelitian</div>
                        <div class="font-semibold"><?php echo e($research->type_id); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tingkat / Rank</div>
                        <div class="font-semibold"><?php echo e($research->rank_id); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Peran</div>
                        <div class="font-semibold"><?php echo e($research->role); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Penerbit</div>
                        <div class="font-semibold"><?php echo e($research->publisher ?? '-'); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Tahun</div>
                        <div class="font-semibold"><?php echo e($research->year); ?></div>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">DOI</div>
                        <div class="font-semibold"><?php echo e($research->doi ?? '-'); ?></div>
                    </div>

                    <div class="md:col-span-2">
                        <div class="text-sm opacity-60">Link Publikasi</div>
                        <?php if($research->link): ?>
                            <a href="<?php echo e($research->link); ?>" target="_blank"
                                class="link link-primary no-underline hover:underline truncate block">
                                <?php echo e($research->link); ?>

                            </a>
                        <?php else: ?>
                            <div class="font-semibold">-</div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <div class="text-sm opacity-60">Status</div>
                        <div class="mt-1">
                            <?php
                                $status = strtoupper($research->status);
                                $badge = match ($status) {
                                    'DRAFT' => 'badge-ghost',
                                    'SUBMITTED' => 'badge-info',
                                    'VERIFIED' => 'badge-success',
                                    'REJECTED' => 'badge-error',
                                    default => 'badge-ghost'
                                };
                            ?>
                            <span class="badge <?php echo e($badge); ?> badge-lg"><?php echo e($research->status); ?></span>
                        </div>
                    </div>

                </div>

                
                <div class="mt-8 border-t border-base-200 pt-6">
                    <h3 class="font-bold text-md mb-4">Anggota Peneliti</h3>
                    <div class="overflow-x-auto border rounded-lg border-base-200">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Anggota</th>
                                    <th>Peran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($member->name); ?></td>
                                        <td><?php echo e($member->role); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-base-content/60">
                                            Tidak ada anggota tambahan.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        
        <div class="card bg-base-100 shadow-sm border border-base-300">
            <div class="card-body space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-lg">Bukti Kegiatan</h3>
                        <p class="text-sm opacity-70">Unggah dokumen pendukung (Jurnal, Sertifikat, dll).</p>
                    </div>
                    <?php if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])): ?>
                        <button onclick="uploadModal.showModal()" class="btn btn-primary btn-sm text-white">
                            + Unggah Bukti
                        </button>
                    <?php endif; ?>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th class="w-12">#</th>
                                <th>Nama File</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $evidences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $evidence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e(asset('storage/' . $evidence->file_path)); ?>" target="_blank"
                                            class="link link-primary no-underline hover:underline font-medium">
                                            <?php echo e($evidence->file_name); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($evidence->description ?? '-'); ?></td>
                                    <td>
                                        <?php if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])): ?>
                                            <form
                                                action="<?php echo e(route('lecturer.research.evidence.delete', ['id' => $research->id, 'evidenceId' => $evidence->id])); ?>"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus bukti ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-xs btn-error btn-outline">Hapus</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-xs text-base-content/50">Terkunci</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-base-content/60">
                                        Belum ada bukti yang diunggah.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <?php if(in_array(strtoupper($research->status), ['DRAFT', 'REJECTED'])): ?>
                    <div class="pt-4 border-t border-base-200 flex justify-end">
                        <form action="<?php echo e(route('lecturer.research.submit', $research->id)); ?>" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin mengajukan data ini? Data tidak dapat diubah setelah diajukan.');">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success text-white font-bold" <?php echo e($evidences->isEmpty() ? 'disabled' : ''); ?>>
                                Ajukan Verifikasi
                            </button>
                        </form>
                    </div>
                    <?php if($evidences->isEmpty()): ?>
                        <p class="text-xs text-error text-right mt-1">* Harap unggah minimal 1 bukti untuk mengajukan.</p>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>

    </div>

    
    <dialog id="uploadModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Unggah Bukti Kegiatan</h3>
            <p class="py-2 text-sm">Format: PDF, JPG, PNG. Maksimal 2MB.</p>

            <form action="<?php echo e(route('lecturer.research.evidence.upload', $research->id)); ?>" method="POST"
                enctype="multipart/form-data" class="space-y-4 mt-4">
                <?php echo csrf_field(); ?>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Pilih File</span>
                    </label>
                    <input type="file" name="evidence_file" class="file-input file-input-bordered w-full"
                        accept=".pdf,.jpg,.jpeg,.png" required />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Keterangan (Opsional)</span>
                    </label>
                    <input type="text" name="description" placeholder="Contoh: File Jurnal PDF"
                        class="input input-bordered w-full" />
                </div>

                <div class="modal-action">
                    <button type="button" class="btn" onclick="uploadModal.close()">Batal</button>
                    <button type="submit" class="btn btn-primary text-white">Unggah</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/research/show.blade.php ENDPATH**/ ?>