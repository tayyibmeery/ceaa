<?php $__env->startSection('title', 'Search Roll Number Slip'); ?>

<?php $__env->startSection('content'); ?>

<section class="d-flex justify-content-center align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg p-4">
                    <div class="widget clearfix widget-archive notificationSection">
                        <div class="heading-text heading-section text-center mb-4">
                            <h4 class="text-blue">Search Roll Number Slip</h4>
                        </div>
                        <?php if(session('error')): ?>
                        <div class="alert alert-danger mt-4">
                            <?php echo e(session('error')); ?>

                        </div>
                        <?php endif; ?>
                        <!-- Search Form -->
                        <form action="<?php echo e(route('roll-number-slip.search')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row justify-content-center text-center">
                                <div class="col-md-12 mt-3">
                                <h5>Enter the CNIC (Without dashes) then click on Search Button</h5>

                                    <label for="cnic-no" class="fw-bold">CNIC*</label>
                                    <input type="text" class="form-control w-100" id="cnic-no" name="cnic" placeholder="Enter CNIC without -" required>
                                </div>
                                <div class="col-md-6 mt-3 text-center">
                                    <button type="submit" id="get-applicant-list" class="btn btn-info w-100">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .card {
        border-radius: 10px;
        background: #61d874;
    }
    .form-group label {
        font-size: 16px;
    }
    input.form-control {
        width: 100%;
    }
    button {
        display: block;
        margin: 10px auto;
        width: 50%;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Add any JavaScript if needed
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/roll_slip_index.blade.php ENDPATH**/ ?>