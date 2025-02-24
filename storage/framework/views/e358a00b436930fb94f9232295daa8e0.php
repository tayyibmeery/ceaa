<?php $__env->startSection('title',  $trem->name); ?>

<?php $__env->startSection('content'); ?>

	<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h2><?php echo e($trem->heading); ?></h2>
			</div>
			<div class="row">
				<?php echo $trem->description; ?>

			</div>
		</div>
        <div class="m-t-30">

        </div>
	</section>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/ourtrem.blade.php ENDPATH**/ ?>