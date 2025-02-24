<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo e(isset($result) ? 'Edit Result' : 'Add Result'); ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('results.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo e(isset($result) ? 'Edit Result' : 'Add Result'); ?></li>
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
            <h3 class="card-title"><?php echo e(isset($result) ? 'Edit Result Details' : 'Add Result Details'); ?></h3>
          </div>
          <form
            action="<?php echo e(isset($result) ? route('results.update', $result->id) : route('results.store')); ?>"
            method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($result)): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="card-body">
              <div class="form-group">
                <label for="application_id">Application ID</label>
                <select
                  class="form-control"
                  id="application_id"
                  name="application_id"
                  required>
                  <option value="" disabled <?php echo e(!isset($result) ? 'selected' : ''); ?>>Select an Application</option>
                  <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                      value="<?php echo e($application->id); ?>"
                      <?php echo e(old('application_id', $result->application_id ?? '') == $application->id ? 'selected' : ''); ?>>
                      <?php echo e($application->id); ?>

                    </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="marks_obtained">Marks Obtained</label>
                <input
                  type="number"
                  class="form-control"
                  id="marks_obtained"
                  name="marks_obtained"
                  placeholder="Enter marks obtained"
                  value="<?php echo e(old('marks_obtained', $result->marks_obtained ?? '')); ?>"
                  required>
              </div>
              <div class="form-group">
                <label for="total_marks">Total Marks</label>
                <input
                  type="number"
                  class="form-control"
                  id="total_marks"
                  name="total_marks"
                  placeholder="Enter total marks"
                  value="<?php echo e(old('total_marks', $result->total_marks ?? '')); ?>"
                  required>
              </div>
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea
                  class="form-control"
                  id="remarks"
                  name="remarks"
                  placeholder="Enter remarks"><?php echo e(old('remarks', $result->remarks ?? '')); ?></textarea>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo e(isset($result) ? 'Update' : 'Save'); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/result/create.blade.php ENDPATH**/ ?>