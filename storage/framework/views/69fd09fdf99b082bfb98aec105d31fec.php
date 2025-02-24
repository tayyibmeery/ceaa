<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Results</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('results.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active">Results</li>
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
            <h3 class="card-title">Results Table</h3>
            <a href="<?php echo e(route('results.create')); ?>" class="btn btn-primary float-right">Add Result</a>
            <span></span>
            <a href="<?php echo e(route('results.form')); ?>" class="mr-5 btn btn-primary float-right">Upload/Download result excel</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="resultsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>ID</th>
            <th>Applicant Name</th>
            <th> Job Organization Name</th>
            <th> Roll No</th>
            <th>Job Post</th>
            <th>Test Date</th>
            <th>Test Center</th>
            <th>CNIC</th>
            <th>Marks Obtained</th>
            <th>Total Marks</th>
            <th>Remarks</th>
            <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($result->id); ?></td>
                    <td><?php echo e($result->application->user->first_name); ?> <?php echo e($result->application->user->last_name); ?> S/O <?php echo e($result->application->user->father_name); ?></td>
                    <td><?php echo e($result->application->jobPost->organization_name); ?></td>
                    <td><?php echo e($result->application->rollNumberSlip->roll_number); ?></td>
                    <td><?php echo e($result->application->jobPost->title); ?></td>
                    <td><?php echo e($result->application->tests->test_date); ?></td>
                    <td><?php echo e($result->application->tests->test_center); ?></td>
                    <td><?php echo e($result->application->user->cnic); ?></td>
                    <td><?php echo e($result->marks_obtained); ?></td>
                    <td><?php echo e($result->total_marks); ?></td>
                    <td><?php echo e($result->remarks); ?></td>
                    <td>
                      
                      <a href="<?php echo e(route('results.edit', $result->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                      <form action="<?php echo e(route('results.destroy', $result->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/result/index.blade.php ENDPATH**/ ?>