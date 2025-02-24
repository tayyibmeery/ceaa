<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $ourservise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<section>
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2><?php echo e($servise->heading); ?></h2>
        </div>
        <div class="row">
            <p><?php echo $servise->description; ?></p>
        </div>

    </div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/servises.blade.php ENDPATH**/ ?>