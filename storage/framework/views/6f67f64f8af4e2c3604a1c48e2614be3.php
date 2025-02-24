<?php $__env->startSection('content'); ?>

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>About Icons</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo e(route('abouticon.create')); ?>" class="btn btn-primary float-sm-right">Create About Icon</a>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of About Icons</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon Name</th>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $aboutIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aboutIcon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($aboutIcon->about_icon_name); ?></td>
                    <td><?php echo $aboutIcon->about_icon_detail; ?></td>
                    <td>
                      <a href="<?php echo e(route('abouticon.edit', $aboutIcon->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                      <form action="<?php echo e(route('abouticon.destroy', $aboutIcon->id)); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <?php echo e($aboutIcons->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/abouticons/index.blade.php ENDPATH**/ ?>