<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo e(isset($application) ? 'Edit Application' : 'Add Application'); ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('applications.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo e(isset($application) ? 'Edit Application' : 'Add Application'); ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
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
    </div>
      <div class="col-md-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <small><?php echo e(isset($application) ? 'Edit Application Details' : 'Add Application Details'); ?></small>
            </h3>


          </div>
          <form
            action="<?php echo e(isset($application) ? route('applications.update', $application->id) : route('applications.store')); ?>"
            method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($application)): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="card-body">
              <div class="row">
                <!-- Status -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                      <option value="applied" <?php echo e(old('status', $application->status ?? '') == 'applied' ? 'selected' : ''); ?>>Applied</option>
                      <option value="under_review" <?php echo e(old('status', $application->status ?? '') == 'under_review' ? 'selected' : ''); ?>>Under Review</option>
                      <option value="test_scheduled" <?php echo e(old('status', $application->status ?? '') == 'test_scheduled' ? 'selected' : ''); ?>>Test Scheduled</option>
                    </select>
                  </div>
                </div>
                <!-- Payment Status -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="payment_status">Payment Status</label>
                    <select class="form-control" id="payment_status" name="payment_status" required>
                      <option value="pending" <?php echo e(old('payment_status', $application->payment_status ?? '') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                      <option value="paid" <?php echo e(old('payment_status', $application->payment_status ?? '') == 'paid' ? 'selected' : ''); ?>>Paid</option>
                      <option value="failed" <?php echo e(old('payment_status', $application->payment_status ?? '') == 'failed' ? 'selected' : ''); ?>>Failed</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Reviewer Remarks -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="reviewer_remarks">Reviewer Remarks</label>
                    <textarea class="form-control" id="reviewer_remarks" name="reviewer_remarks"
                      rows="4"><?php echo e(old('reviewer_remarks', $application->reviewer_remarks ?? '')); ?></textarea>
                  </div>
                </div>
                <!-- user -->
                <div class="col-md-6">
  <div class="form-group">
    <label for="user_name">Name</label>
    <!-- Display the user Name -->
    <input type="text" class="form-control" id="user_name" name="user_name"
      value="<?php echo e(old('user_name', $application->user->FullName ?? '')); ?>" readonly>
    <!-- Hidden Input to Send user ID -->
    <input type="hidden" id="user_id" name="user_id"
      value="<?php echo e(old('user_id', $application->user->id ?? '')); ?>">
  </div>
</div>

              </div>

              <div class="row">
                <!-- Job Post -->
                <div class="col-md-6">
  <div class="form-group">
    <label for="job_post_title">Job Post</label>
    <!-- Display the Job Post Title -->
    <input type="text" class="form-control" id="job_post_title" name="job_post_title"
      value="<?php echo e(old('job_post_title', $application->jobPost->title ?? '')); ?>" readonly>
    <!-- Hidden Input to Send Job Post ID -->
    <input type="hidden" id="job_post_id" name="job_post_id"
      value="<?php echo e(old('job_post_id', $application->jobPost->id ?? '')); ?>">
  </div>
</div>

                <!-- Resume -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="resume">Resume</label>
                    <input type="text" class="form-control" id="resume" name="resume"
                      value="<?php echo e(old('resume', $application->resume ?? '')); ?>" readonly>
                    <?php if(isset($application) && $application->resume): ?>
                      <p class="mt-2">Current Resume: <a href="<?php echo e(asset( $application->resume)); ?>" target="_blank">View</a></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Cover Letter -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cover_letter">Cover Letter</label>
                    <input type="text" class="form-control" id="cover_letter" name="cover_letter"
                      value="<?php echo e(old('cover_letter', $application->cover_letter ?? '')); ?>" readonly>
                    <?php if(isset($application) && $application->cover_letter): ?>
                      <p class="mt-2">Current Cover Letter: <a href="<?php echo e(asset( $application->cover_letter)); ?>" target="_blank">View</a></p>
                    <?php endif; ?>
                  </div>
                </div>
                <!-- Highest Qualification -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="highest_qualification">Highest Qualification</label>
                    <input type="text" class="form-control" id="highest_qualification" name="highest_qualification"
                      value="<?php echo e(old('highest_qualification', $application->highest_qualification ?? '')); ?>" readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Experience Years -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="experience_years">Experience Years</label>
                    <input type="number" class="form-control" id="experience_years" name="experience_years"
                      value="<?php echo e(old('experience_years', $application->experience_years ?? '')); ?>" readonly>
                  </div>
                </div>
                <!-- Fees Receipt -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fees_receipt">Fees Receipt</label>
                    <input type="text" class="form-control" id="fees_receipt" name="fees_receipt"
                      value="<?php echo e(old('fees_receipt', $application->fees_receipt ?? '')); ?>" readonly>
                    <?php if(isset($application) && $application->fees_receipt): ?>
                      <p class="mt-2">Current Fees Receipt: <a href="<?php echo e(asset( $application->fees_receipt)); ?>" target="_blank">View</a></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Submission Date -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="submission_date">Submission Date</label>
                    <input type="date" class="form-control" id="submission_date" name="submission_date"
                      value="<?php echo e(old('submission_date', $application->submission_date ?? '')); ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo e(isset($application) ? 'Update' : 'Save'); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/application/create.blade.php ENDPATH**/ ?>