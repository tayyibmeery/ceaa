<!-- resources/views/trems/index.blade.php -->



<?php $__env->startSection('content'); ?>

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>trems</h1>
      </div>
      <div class="col-sm-6">
        <a href="<?php echo e(route('trems.create')); ?>" class="btn btn-primary float-sm-right">Create trem</a>
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
            <h3 class="card-title">List of trems</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>trem Name</th>
                  <th>Slug</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $trems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($trem->name); ?></td>
                    <td><?php echo e($trem->slug); ?></td>
                    <td><?php echo e($trem->heading); ?></td>
                    <td><?php echo $trem->description; ?></td>
                    <td>
                      <a href="<?php echo e(route('trems.edit', $trem->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                      <form action="<?php echo e(route('trems.destroy', $trem->id)); ?>" method="POST" style="display:inline-block;">
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
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/trems/index.blade.php ENDPATH**/ ?>