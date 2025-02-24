<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo e(isset($test) ? 'Edit Test' : 'Add Test'); ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('tests.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo e(isset($test) ? 'Edit Test' : 'Add Test'); ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo e(isset($test) ? 'Edit Test Details' : 'Add Test Details'); ?></h3>
          </div>
              <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
          <form
            action="<?php echo e(isset($test) ? route('tests.update', $test->id) : route('tests.store')); ?>"
            method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($test)): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="card-body">
              <div class="form-group">
                <label for="job_post_id">Job Post</label>
                <select
                  class="form-control"
                  id="job_post_id"
                  name="job_post_id"
                  required>
                  <option value="" disabled <?php echo e(!isset($test) ? 'selected' : ''); ?>>Select a job post</option>
                  <?php $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                      value="<?php echo e($jobPost->id); ?>"
                      <?php echo e(old('job_post_id', $test->job_post_id ?? '') == $jobPost->id ? 'selected' : ''); ?>>
                      <?php echo e($jobPost->title); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="test_date">Test Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="test_date"
                  name="test_date"
                  value="<?php echo e(old('test_date', $test->test_date ?? '')); ?>"
                  required>
              </div>
              <div class="form-group">
                <label for="test_time">Test Time</label>
                <input
                  type="time"
                  class="form-control"
                  id="test_time"
                  name="test_time"
                  value="<?php echo e(old('test_time', $test->test_time ?? '')); ?>"
                  required>
              </div>
              <div class="form-group">
                <label for="test_center">Test Center</label>
                <input
                  type="text"
                  class="form-control"
                  id="test_center"
                  name="test_center"
                  placeholder="Enter test center"
                  value="<?php echo e(old('test_center', $test->test_center ?? '')); ?>"
                  required>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo e(isset($test) ? 'Update' : 'Save'); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/test/create.blade.php ENDPATH**/ ?>