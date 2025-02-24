<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo e(isset($slider) ? 'Edit Slider' : 'Add Slider'); ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(route('slider.index')); ?>">Home</a></li>
          <li class="breadcrumb-item active"><?php echo e(isset($slider) ? 'Edit Slider' : 'Add Slider'); ?></li>
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
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
          <div class="card-header">
            <h3 class="card-title"><small><?php echo e(isset($slider) ? 'Edit Slider Details' : 'Add Slider Details'); ?></small></h3>
          </div>
          <form
            action="<?php echo e(isset($slider) ? route('slider.update', $slider->id) : route('slider.store')); ?>"
            method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($slider)): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="card-body">
              <div class="form-group">
                <label for="welcome_text">Welcome Text</label>
                <input
                  type="text"
                  class="form-control"
                  id="welcome_text"
                  name="welcome_text"
                  placeholder="Enter Welcome Text"
                  value="<?php echo e(old('welcome_text', $slider->welcome_text ?? '')); ?>"
                  >
              </div>
              <div class="form-group">
                <label for="heading">Heading</label>
                <input
                  type="text"
                  class="form-control"
                  id="heading"
                  name="heading"
                  placeholder="Enter Heading"
                  value="<?php echo e(old('heading', $slider->heading ?? '')); ?>"
                  >
              </div>
              <div class="form-group">
                <label for="button_name">Button Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="button_name"
                  name="button_name"
                  placeholder="Enter Button Name"
                  value="<?php echo e(old('button_name', $slider->button_name ?? '')); ?>"
                  >
              </div>
              <div class="form-group">
                <label for="slider_image">Slider Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="slider_image"
                  name="slider_image"
                  <?php echo e(isset($slider) ? '' : 'required'); ?>>
                <?php if(isset($slider) && $slider->slider_image): ?>
                  <img src="<?php echo e(asset($slider->slider_image)); ?>" alt="Slider Image" class="mt-3" width="200">
                <?php endif; ?>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><?php echo e(isset($slider) ? 'Update' : 'Save'); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/sliders/create.blade.php ENDPATH**/ ?>