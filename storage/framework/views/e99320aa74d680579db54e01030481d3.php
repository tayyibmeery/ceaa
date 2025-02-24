<?php $__env->startSection("title", "Roll Number Slip"); ?>

<?php $__env->startSection("content"); ?>

<section class="bg-light py-5">
    <div class="container">
        <!-- Page Header -->
        <div class="mb-4 text-center">
            <h2 class="fw-bold">Roll Number Slip</h2>
            <nav aria-label="breadcrumb">

            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Alert Messages -->
                <?php if(session("error")): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session("error")); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <!-- Roll Number Slips -->
                <?php if($upcomingTests->count() > 0): ?>
                <?php $__currentLoopData = $upcomingTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rollSlip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card rounded-3 mb-4 border-0 shadow-sm">
                    <div class="card-header bg-success d-flex justify-content-between align-items-center py-3 text-white">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-link text-decoration-none me-2 p-0 text-white" data-bs-toggle="collapse" data-bs-target="#rollSlipContent<?php echo e($rollSlip->id); ?>" aria-expanded="true">
                                <i class="fas fa-minus collapse-icon"></i>
                            </button>
                            <h5 class="card-title mb-0">Roll Number Slip</h5>
                        </div>
                        <span class="badge text-success bg-white">
                            <i class="fas fa-clock me-1"></i>Upcoming Test
                        </span>
                    </div>

                    <div class="show collapse" id="rollSlipContent<?php echo e($rollSlip->id); ?>">
                        <div class="card-body p-4">
                            <!-- Job Title -->
                            <div class="mb-4 text-center">
                                <h4 class="mb-1"><?php echo e($rollSlip->application->jobPost->title); ?></h4>
                                <p class="text-muted mb-0">Test Roll Number Slip</p>
                            </div>

                            <!-- Roll Number Details -->
                            <div class="row g-4 mb-4">
                                <div class="col-sm-6">
                                    <div class="rounded border p-3">
                                        <h6 class="text-success mb-3">Roll Number Details</h6>
                                        <table class="table-sm mb-0 table">
                                            <tr>
                                                <th class="text-muted fw-medium" width="40%">Roll Number:
                                                </th>
                                                <td class="fw-bold"><?php echo e($rollSlip->roll_number); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Serial Number:</th>
                                                <td><?php echo e($rollSlip->serial_number); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="rounded border p-3">
                                        <h6 class="text-success mb-3">Test Schedule</h6>
                                        <table class="table-sm mb-0 table">
                                            <tr>
                                                <th width="40%">Date:</th>
                                                <td><?php echo e(\Carbon\Carbon::parse($rollSlip->test->test_date)->format("d M, Y")); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Time:</th>
                                                <td><?php echo e(\Carbon\Carbon::parse($rollSlip->test->test_time)->format("h:i A")); ?>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Candidate Details -->
                            <div class="mb-4 rounded border p-3">
                                <h6 class="text-success mb-3">Candidate Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table-sm mb-0 table">
                                            <tr>
                                                <th width="40%">Name:</th>
                                                <td><?php echo e($user->first_name . " " . $user->last_name); ?></td>
                                            </tr>
                                            <tr>
                                                <th>CNIC:</th>
                                                <td><?php echo e($user->cnic); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Father's Name:</th>
                                                <td><?php echo e($user->father_name); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table-sm mb-0 table">
                                            <tr>
                                                <th width="40%">Province:</th>
                                                <td><?php echo e($user->province_of_domicile); ?></td>
                                            </tr>
                                            <tr>
                                                <th>District:</th>
                                                <td><?php echo e($user->district_of_domicile); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Contact:</th>
                                                <td><?php echo e($user->phone); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Test Center -->
                            <div class="rounded border p-3">
                                <h6 class="text-success mb-3">Test Center</h6>
                                <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i><?php echo e($rollSlip->test->test_center); ?>

                                </p>
                            </div>

                            <!-- Download Button -->
                            <div class="mt-4 text-center">
                                <a href="<?php echo e(route("roll-number-slip.download", $rollSlip->id)); ?>" class="btn btn-success px-4">
                                    <i class="fas fa-download me-2"></i>Download Roll Number Slip
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    No roll number slips found.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush("scripts"); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle collapse icon change
        const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');

        collapseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('.collapse-icon');
                if (icon.classList.contains('fa-minus')) {
                    icon.classList.replace('fa-minus', 'fa-plus');
                } else {
                    icon.classList.replace('fa-plus', 'fa-minus');
                }
            });

            // Also handle when collapse is triggered by other means
            const targetId = button.getAttribute('data-bs-target');
            const collapseElement = document.querySelector(targetId);

            collapseElement.addEventListener('hidden.bs.collapse', function() {
                button.querySelector('.collapse-icon').classList.replace('fa-minus', 'fa-plus');
            });

            collapseElement.addEventListener('shown.bs.collapse', function() {
                button.querySelector('.collapse-icon').classList.replace('fa-plus', 'fa-minus');
            });
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("frontend.layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/roll_slip.blade.php ENDPATH**/ ?>