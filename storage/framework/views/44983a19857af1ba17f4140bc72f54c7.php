<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sliders</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('slider.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active">Sliders</li>
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
            <h3 class="card-title">Sliders Table</h3>
            <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-primary float-right">Add Slider</a>
          </div>
          <div class="card-body">
            <table id="slidersTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Welcome Text</th>
                  <th>Heading</th>
                  <th>Button Name</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($slider->id); ?></td>
                    <td><?php echo e($slider->welcome_text); ?></td>
                    <td><?php echo e($slider->heading); ?></td>
                    <td><?php echo e($slider->button_name); ?></td>
                    <td>
                      <img src="<?php echo e(asset( $slider->slider_image)); ?>" alt="Slider Image" width="100">
                    </td>
                    <td>
                      <a href="<?php echo e(route('slider.edit', $slider->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                      <form action="<?php echo e(route('slider.destroy', $slider->id)); ?>" method="POST" style="display: inline;">
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
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/sliders/index.blade.php ENDPATH**/ ?>