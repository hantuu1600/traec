<div class="card bg-base-100 shadow-sm border border-base-300">
    <div class="card-body px-6 py-6 space-y-6">

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr class="text-secondary text-center">
                        <th>No</th>
                        <th>Course Name</th>
                        <th>Study Program</th>
                        <th>Semester</th>
                        <th>Credits</th>
                        <th>Meeting Total</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <?php echo e($slot); ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
<?php /**PATH D:\traec\resources\views/components/teaching-table.blade.php ENDPATH**/ ?>