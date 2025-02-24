<?php $__env->startSection('title',  $page->name); ?>

<?php $__env->startSection('content'); ?>

	<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h2><?php echo e($page->heading); ?></h2>
			</div>
			<div class="row">
				<?php echo $page->description; ?>

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

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/plans.blade.php ENDPATH**/ ?>