<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>


<section>
    <div class="container ">
        <?php $__currentLoopData = $cores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $core): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($index % 2 == 0): ?>
        <div class="row m-t-30">
            <div class="col-md-6">
                <div class="heading-text heading-section">
                    <h2><?php echo e($core->heading); ?></h2>
                </div>
                <strong class="m-t-30" style="font-size: 17px;">
                    <?php echo $core->description; ?>

                </strong>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-5 mt-3 mt-md-0">
                <img style="width: 100%;" src="<?php echo e(asset($core->image)); ?>">
            </div>
        </div>
       <br>
        <?php else: ?>

        <div class="row m-t-50">
            <div class="col-md-5 mb-3 mb-md-0">
                <img style="width: 100%;" src="<?php echo e(asset($core->image)); ?>">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="heading-text heading-section">
                    <h2><?php echo e($core->heading); ?></h2>
                </div>
                <strong class="m-t-30" style="font-size: 17px;">
                    <?php echo $core->description; ?>

                </strong>
            </div>
        </div>
      <br>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class=" m-t-30"></div>
</section>





<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/vision.blade.php ENDPATH**/ ?>