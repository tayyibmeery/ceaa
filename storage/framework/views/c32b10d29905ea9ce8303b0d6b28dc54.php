<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Job Posts</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('job-posts.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active">Job Posts</li>
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
            <h3 class="card-title">Job Posts Table</h3>
            <a href="<?php echo e(route('job-posts.create')); ?>" class="btn btn-primary float-right">Create Job Post</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="jobPostsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Organization Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Requirements</th>
                  <th>Advertisement Date</th>
                  <th>Application Deadline</th>
                  <th>Advertisement File</th>
                  <th>Status</th>
                  <th>Visibility</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($jobPost->id); ?></td>
                    <td><?php echo e($jobPost->organization_name); ?></td>
                    <td><?php echo e($jobPost->title); ?></td>
                    <td><?php echo e($jobPost->description); ?></td>
                    <td><?php echo e($jobPost->requirements); ?></td>
                    <td><?php echo e($jobPost->advertisement_date); ?></td>
                    <td><?php echo e($jobPost->application_deadline); ?></td>
                    <td>
                      <?php if($jobPost->advertisement_file): ?>
                        <a href="<?php echo e(asset('storage/' . $jobPost->advertisement_file)); ?>" target="_blank">View File</a>
                      <?php else: ?>
                        No file uploaded
                      <?php endif; ?>
                    </td>
                    <td><?php echo e(ucfirst($jobPost->status)); ?></td>
                  <td><?php echo e($jobPost->is_visible ? 'Visible' : 'Hidden'); ?></td>

                    <td>
                      
                      <a href="<?php echo e(route('job-posts.edit', $jobPost->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                      <form action="<?php echo e(route('job-posts.destroy', $jobPost->id)); ?>" method="POST" style="display: inline;">
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

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/jobpost/index.blade.php ENDPATH**/ ?>