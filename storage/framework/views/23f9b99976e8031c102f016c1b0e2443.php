

<?php $__env->startSection('content'); ?>
    <div class="p-6 space-y-6">

        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-semibold">Submission History</h1>
                <p class="text-sm opacity-70">Riwayat pengajuan periode</p>
            </div>

            <a href="<?php echo e(route('lecturer.period.status')); ?>" class="btn btn-outline btn-sm">
                Back
            </a>
        </div>

        <div class="card bg-base-200">
            <div class="card-body">

                <div class="flex flex-col lg:flex-row gap-3 mb-4">
                    <input class="input input-bordered w-full lg:w-72" placeholder="Search period..." />
                    <select class="select select-bordered w-full lg:w-52">
                        <option>All status</option>
                        <option>Draft</option>
                        <option>Submitted</option>
                        <option>Returned</option>
                        <option>Verified</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Submitted At</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ganjil 2025/2026</td>
                                <td>10 Jan 2026</td>
                                <td>
                                    <span class="badge badge-info">Submitted</span>
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Genap 2024/2025</td>
                                <td>12 Jul 2025</td>
                                <td>
                                    <span class="badge badge-success">Verified</span>
                                </td>
                                <td>OK</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-lecturer-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\traec\resources\views/pages/lecturer/submissions/index.blade.php ENDPATH**/ ?>