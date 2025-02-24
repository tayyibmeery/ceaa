<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="mb-4">Roll Number Slips</h1>
    <a href="<?php echo e(route('rollnumber.exports')); ?>" class="btn btn-success float-right">
    <i class="fas fa-file-excel"></i> Export Roll Numbers
</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Candidate Name</th>
                <th>CNIC</th>
                <th>Job Post</th>
                <th>Test Date</th>
                <th>Test Center</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $rollNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($roll->roll_number); ?></td>
                <td><?php echo e($roll->application->user->full_name); ?></td>
                <td><?php echo e($roll->application->user->cnic); ?></td>
                <td><?php echo e($roll->application->jobPost->title); ?></td>
                <td><?php echo e($roll->test->test_date ?? 'N/A'); ?></td>
                <td><?php echo e($roll->test->test_center ?? 'N/A'); ?></td>
                <td>
                    <a href="<?php echo e(route('rollnumber.show', $roll->id)); ?>" class="btn btn-info btn-sm">View</a>
                    <a href="<?php echo e(route('rollnumber.print', $roll->id)); ?>" class="btn btn-warning btn-sm" target="_blank">Print</a>
                    <a href="<?php echo e(route('rollnumber.download', $roll->id)); ?>" class="btn btn-primary btn-sm">Download PDF</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($rollNumbers->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/rollnumberslip/index.blade.php ENDPATH**/ ?>