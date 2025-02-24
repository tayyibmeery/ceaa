<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Roll Number Slip Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(route('rollnumber.index')); ?>">Roll Number Slips</a></li>
          <li class="breadcrumb-item active">Details</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Candidate Roll Number Slip</h3>
            <div class="card-tools">
              <a href="<?php echo e(route('rollnumber.print', $rollNumber->id)); ?>" class="btn btn-primary">
                <i class="fas fa-print"></i> Print
              </a>
              <a href="<?php echo e(route('rollnumber.download', $rollNumber->id)); ?>" class="btn btn-success">
                <i class="fas fa-download"></i> Download PDF
              </a>
              <a href="<?php echo e(route('rollnumber.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
              </a>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>Roll Number</th>
                <td><?php echo e($rollNumber->roll_number); ?></td>
              </tr>
              <tr>
                <th>Serial Number</th>
                <td><?php echo e($rollNumber->serial_number); ?></td>
              </tr>
              <tr>
                <th>Candidate Name</th>
                <td><?php echo e($rollNumber->application->user->full_name); ?></td>
              </tr>
              <tr>
                <th>CNIC</th>
                <td><?php echo e($rollNumber->application->user->cnic); ?></td>
              </tr>
              <tr>
                <th>Job Post</th>
                <td><?php echo e($rollNumber->application->jobPost->title); ?></td>
              </tr>
              <tr>
                <th>Test Date</th>
                <td><?php echo e($rollNumber->test->test_date ?? 'N/A'); ?></td>
              </tr>
              <tr>
                <th>Test Center</th>
                <td><?php echo e($rollNumber->test->test_center ?? 'N/A'); ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/rollnumberslip/show.blade.php ENDPATH**/ ?>