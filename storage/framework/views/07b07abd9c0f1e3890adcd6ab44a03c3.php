<?php $__env->startSection("title", "My Profile"); ?>

<?php $__env->startSection("content"); ?>

<section class="bg-light">
    <div class="container py-5">
        <!-- Success Message -->
        <?php if(session("success")): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Success!</strong>
                <span class="ms-2"><?php echo e(session("success")); ?></span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Error Message -->
        <?php if(session("error")): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Error!</strong>
                <span class="ms-2"><?php echo e(session("error")); ?></span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Profile Header -->
        <div class="mb-4 rounded bg-white p-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-0">My Profile</h2>
                    <p class="text-muted">Manage your personal information and applications</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-center gap-2">
                        <a href="<?php echo e(route("profile.edit")); ?>" class="btn btn-success shadow-sm">
                            <i class="fas fa-edit me-1"></i>Edit Profile
                        </a>
                        <a href="<?php echo e(route("projects.index")); ?>" class="btn btn-outline-success shadow-sm">
                            <i class="fas fa-arrow-left me-1"></i>Back to Jobs
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <!-- Profile Overview -->
            <div class="mb-5 text-center">
                <div class="position-relative d-inline-block mb-3">
                    <img src="<?php echo e(asset( (auth()->user()->profile_picture ?? "default-profile.jpg"))); ?>" alt="Profile Picture" class="rounded-circle border-3 border-success border shadow" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <h3 class="mb-1"><?php echo e(auth()->user()->first_name . " " . auth()->user()->last_name); ?></h3>
                <p class="text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
            </div>

            <div class="row g-4">
                <!-- News Alerts Card -->
                <div class="col-lg-4 py-5">
                    <div class="card mb-1">
                        <div class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
                            <h6 class="mb-0">Latest Updates</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-group-item text-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-2"><?php echo e($post->title); ?></h6>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(asset( $post->advertisement_file)); ?>" class="btn btn-info btn-sm me-2">
                                                Download
                                            </a>
                                            <a href="<?php echo e(route("postsjob.show", $post->id)); ?>" class="btn btn-success btn-sm">
                                                Apply Now
                                            </a>
                                        </div>
                                        <small class="text-muted d-block mt-2 text-center">
                                            Posted:
                                            <?php echo e(\Carbon\Carbon::parse($post->created_at)->format("M/Y h:i A")); ?>

                                        </small>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Applications Summary Card -->
                    <div class="card mb-1">
                        <div class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
                            <h6 class="mb-0">Application Details</h6>
                        </div>
                        <div class="card-body">
                            <table class="table-sm table text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Position</th>
                                        <th>Application Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-start">
                                            <strong><?php echo e($application->jobPost->title); ?></strong>
                                            <br>
                                            <small class="text-muted"><?php echo e($application->jobPost->organization_name); ?></small>
                                        </td>
                                        <td>
                                            <!-- Status Badge -->
                                            <span class="badge <?php echo e($application->status === "pending" ? "badge-warning" : "badge-success"); ?>">
                                                <?php echo e(ucfirst($application->status)); ?>

                                            </span>
                                            <br>
                                            <!-- Application Details -->
                                            <div class="mt-2">
                                                <small class="d-block">
                                                    <strong>Applied:</strong>
                                                    <?php echo e(\Carbon\Carbon::parse($application->submission_date)->format("d M Y")); ?>

                                                </small>
                                                <small class="d-block">
                                                    <strong>Qualification:</strong>
                                                    <?php echo e($application->highest_qualification); ?>

                                                </small>
                                                <small class="d-block">
                                                    <strong>Experience:</strong>
                                                    <?php echo e($application->experience_years); ?>

                                                    years
                                                </small>
                                                <?php if($application->payment_status): ?>
                                                <small class="d-block">
                                                    <strong>Payment:</strong>
                                                    <span class="badge <?php echo e($application->payment_status === "paid" ? "badge-success" : "badge-warning"); ?>">
                                                        <?php echo e(ucfirst($application->payment_status)); ?>

                                                    </span>
                                                </small>
                                                <?php endif; ?>
                                                <?php if($application->reviewer_remarks): ?>
                                                <small class="d-block text-muted">
                                                    <strong>Remarks:</strong>
                                                    <?php echo e($application->reviewer_remarks); ?>

                                                </small>
                                                <?php endif; ?>
                                            </div>
                                            <!-- Document Links -->
                                            <div class="mt-2">
                                                <?php if($application->resume): ?>
                                                <a href="<?php echo e(asset( $application->resume)); ?>" class="btn btn-sm btn-outline-secondary me-1">
                                                    Resume
                                                </a>
                                                <?php endif; ?>
                                                <?php if($application->cover_letter): ?>
                                                <a href="<?php echo e(asset( $application->cover_letter)); ?>" class="btn btn-sm btn-outline-secondary me-1">
                                                    Cover Letter
                                                </a>
                                                <?php endif; ?>
                                                <?php if($application->fees_receipt): ?>
                                                <a href="<?php echo e(asset( $application->fees_receipt)); ?>" class="btn btn-sm btn-outline-secondary">
                                                    Receipt
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No applications found</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tests Card -->
                    <div class="card mb-1">
                        <div class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
                            <h6 class="mb-0">Test Information</h6>
                        </div>
                        <div class="card-body">
                            <table class="table-sm table text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Test Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($application->test): ?>
                                    <tr>
                                        <td><?php echo e($application->jobPost->title); ?></td>
                                        <td>
                                            <div class="mb-2">
                                                <strong class="d-block">Roll Number:
                                                    <?php echo e($application->test->roll_number); ?></strong>
                                                <small class="d-block">Serial:
                                                    <?php echo e($application->test->serial_number); ?></small>
                                            </div>
                                            <div class="mb-2">
                                                <strong>Test Date:</strong>
                                                <?php echo e($application->test->test->test_date); ?><br>
                                                <strong>Time:</strong>
                                                <?php echo e($application->test->test->test_time); ?><br>
                                                <strong>Center:</strong>
                                                <?php echo e($application->test->test->test_center); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No test schedules available</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Results Card -->
                    <div class="card mb-1">
                        <div class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
                            <h6 class="mb-0">Results & Remarks</h6>
                        </div>
                        <div class="card-body">
                            <table class="table-sm table text-center align-middle">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Score & Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($application->result): ?>
                                    <tr>
                                        <td><?php echo e($application->jobPost->title); ?></td>
                                        <td>
                                            <span class="badge <?php echo e($application->result->marks_obtained >= $application->result->total_marks / 2 ? "badge-success" : "badge-danger"); ?>">
                                                Score:
                                                <?php echo e($application->result->marks_obtained); ?>/<?php echo e($application->result->total_marks); ?>

                                            </span>
                                            <br>
                                            <small class="text-muted">
                                                <strong>Remarks:</strong>
                                                <?php echo e($application->result->remarks ?? "No remarks"); ?>

                                            </small>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No results available</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Main Profile Content -->
                <div class="col-lg-8 py-5">
                    
                    <div class="card mb-4">
                        <div class="card-header bg-success d-flex align-items-center justify-content-center py-3 text-center text-white">
                            <h5 class="mb-0">Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <!-- Profile Info Section -->
                            <div class="mb-4 text-center">
                                <div class="mb-3">
                                    <img src="<?php echo e(asset(auth()->user()->profile_picture ?? 'default-profile.jpg')); ?>" alt="avatar" class="rounded-circle border border-2" width="150" height="150">
                                </div>
                                <h4 class="mb-1"><?php echo e(auth()->user()->first_name . " " . auth()->user()->last_name); ?>

                                </h4>
                                <p class="text-muted mb-0"><?php echo e(auth()->user()->email); ?></p>
                            </div>

                            <!-- Personal Information -->
                            <div class="row g-1">
                                <!-- Basic Info -->
                                <div class="col-md-12">
                                    <div class="card h-50 bg-light border-0">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-center">Basic Information</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Father's Name</label>
                                                        <p class="fw-bold mb-1">
                                                            <?php echo e(auth()->user()->father_name ?? "N/A"); ?></p>
                                                    </div>
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">CNIC</label>
                                                        <p class="fw-bold mb-1"><?php echo e(auth()->user()->cnic ?? "N/A"); ?>

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Date of Birth</label>
                                                        <p class="fw-bold mb-1">
                                                            <?php echo e(auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format("d M Y") : "N/A"); ?>

                                                        </p>
                                                    </div>
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Gender</label>
                                                        <p class="fw-bold mb-1">
                                                            <?php echo e(ucfirst(auth()->user()->gender ?? "N/A")); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Info -->
                                <div class="col-md-12">
                                    <div class="card h-50 bg-light border-0">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-center">Contact Information</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Phone Number</label>
                                                        <p class="fw-bold mb-1"><?php echo e(auth()->user()->phone ?? "N/A"); ?>

                                                        </p>
                                                    </div>
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Email Address</label>
                                                        <p class="mb-1"><?php echo e(auth()->user()->email ?? "N/A"); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Address</label>
                                                        <p class="mb-1"><?php echo e(auth()->user()->address ?? "N/A"); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Info -->
                                <div class="col-12">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-center">Location Details</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Province of Domicile</label>
                                                        <p class="mb-1">
                                                            <?php echo e(auth()->user()->province_of_domicile ?? "N/A"); ?></p>
                                                    </div>
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">District of Domicile</label>
                                                        <p class="mb-1">
                                                            <?php echo e(auth()->user()->district_of_domicile ?? "N/A"); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Postal City</label>
                                                        <p class="mb-1"><?php echo e(auth()->user()->postal_city ?? "N/A"); ?>

                                                        </p>
                                                    </div>
                                                    <div class="mb-2 text-center">
                                                        <label class="text-muted small">Postal Address</label>
                                                        <p class="mb-1">
                                                            <?php echo e(auth()->user()->postal_address ?? "N/A"); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Qualifications Summary -->
                                <div class="col-md-12">
                                    <div class="card h-50 bg-light border-0">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-center">Qualifications Summary</h5>
                                            <div class="row">
                                                <?php $__empty_1 = true; $__currentLoopData = auth()->user()->applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="text-muted small">Position Applied</label>
                                                        <p class="fw-bold mb-1"><?php echo e($application->jobPost->title); ?>

                                                        </p>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="text-muted small">Highest
                                                            Qualification</label>
                                                        <p class="mb-1">
                                                            <?php echo e($application->highest_qualification); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="text-muted small">Experience</label>
                                                        <p class="mb-1"><?php echo e($application->experience_years); ?>

                                                            years</p>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <p class="text-muted text-center">No applications submitted yet.
                                                </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Education Details -->
                                <div class="col-md-12">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3 text-center">Education Details</h5>
                                            <div class="table-responsive">
                                                <table class="table-hover table align-middle">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Degree/Certificate</th>
                                                            <th>Institute</th>
                                                            <th>Board/University</th>
                                                            <th>Year</th>
                                                            <th>Grade/CGPA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr class="text-center">
                                                            <td><?php echo e($education->degree_title); ?></td>
                                                            <td><?php echo e($education->institute); ?></td>
                                                            <td><?php echo e($education->board_university); ?></td>
                                                            <td><?php echo e($education->passing_year); ?></td>
                                                            <td>
                                                                <span class="badge bg-success rounded-pill">
                                                                    <?php echo e($education->grade_cgpa); ?>

                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td colspan="5" class="text-muted text-center">
                                                                No education details available
                                                            </td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush("scripts"); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("frontend.layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/profile.blade.php ENDPATH**/ ?>