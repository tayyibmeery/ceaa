<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Social Icons</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo e(route('socialicon.create')); ?>" class="btn btn-primary float-sm-right">Create Social Icon</a>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Social Icons</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon Name</th>
                  <th>URL</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $socialIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialIcon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($socialIcon->social_icon_name); ?></td>
                    <td><a href="<?php echo e($socialIcon->social_icon_url); ?>" target="_blank"><?php echo e($socialIcon->social_icon_url); ?></a></td>
                    <td>
                      <a href="<?php echo e(route('socialicon.edit', $socialIcon->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                      <form action="<?php echo e(route('socialicon.destroy', $socialIcon->id)); ?>" method="POST" style="display:inline-block;">
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
            <?php echo e($socialIcons->links()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/socialicons/index.blade.php ENDPATH**/ ?>