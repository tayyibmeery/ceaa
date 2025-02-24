<?php $__env->startSection("title", "Apply for Job: " . $jobPost->title); ?>

<?php $__env->startSection("content"); ?>

<section class="bg-light py-5">
    <div class="container">
        <!-- Page Header -->
        <div class="mb-4 text-center">
            <h2>Apply for Job</h2>
            <p class="text-muted"><?php echo e($jobPost->title); ?> - <?php echo e($jobPost->organization_name); ?></p>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <!-- Alert Messages -->
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

                <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Please fix the following errors:</strong>
                    </div>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <?php if($missingFields): ?>
                <div class="alert alert-warning alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Profile Incomplete:</strong>
                        <span class="ms-2">Please update your profile to complete your application.</span>
                    </div>
                    <ul class="mb-3 mt-2">
                        <?php $__currentLoopData = $missingFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($field); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="text-center">
                        <a href="<?php echo e(route("profile.edit")); ?>" class="btn btn-warning">
                            <i class="fas fa-user-edit me-1"></i>Update Profile
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php else: ?>
                <form action="<?php echo e(route("postsjob.apply", $jobPost->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <!-- Profile Picture Section -->
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h5 class="card-title mb-3">Profile Picture</h5>
                            <img src="<?php echo e(asset (auth()->user()->profile_picture ?? "default-profile.jpg")); ?>" alt="Profile Picture" class="rounded-circle border-3 border-success mb-3 border shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-white">
                            <h5 class="card-title mb-0 text-center">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="form-group col-6">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>" class="form-control readonly" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>" class="form-control readonly" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="father_name">Father Name:</label>
                                    <input type="text" id="father_name" name="father_name" value="<?php echo e(auth()->user()->father_name); ?>" class="form-control readonly" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="text" id="dob" name="dob" value="<?php echo e(auth()->user()->date_of_birth); ?>" class="form-control readonly" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="cnic">CNIC</label>
                                    <input type="text" id="cnic" name="cnic" value="<?php echo e(auth()->user()->cnic); ?>" class="form-control readonly" readonly>
                                </div>
                                <div class="form-group col-6">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone" name="phone" value="<?php echo e(auth()->user()->phone); ?>" class="form-control readonly" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="address">Address:</label>
                                    <textarea id="address" name="address" class="form-control readonly" readonly><?php echo e(auth()->user()->address); ?></textarea>
                                </div>

                                <div class="form-group col-6">
                                    <label for="province_of_domicile">Province of Domicile:</label>
                                    <input type="text" id="province_of_domicile" name="province_of_domicile" value="<?php echo e(auth()->user()->province_of_domicile); ?>" class="form-control readonly" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="district_of_domicile">District of Domicile:</label>
                                    <input type="text" id="district_of_domicile" name="district_of_domicile" value="<?php echo e(auth()->user()->district_of_domicile); ?>" class="form-control readonly" readonly>
                                </div>

                                <div class="form-group col-6">
                                    <label for="postal_city">Postal City:</label>
                                    <input type="text" id="postal_city" name="postal_city" value="<?php echo e(auth()->user()->postal_city); ?>" class="form-control readonly" readonly>
                                </div>

                                <div class="form-group col-12">
                                    <label for="postal_address">Postal Address:</label>
                                    <textarea id="postal_address" name="postal_address" class="form-control readonly" readonly><?php echo e(auth()->user()->postal_address); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education Details Section -->
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-white">
                            <h5 class="card-title mb-0 text-center">Education Details</h5>
                        </div>
                        <div class="card-body">
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

                    <!-- Application Details Section -->
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-white">
                            <h5 class="card-title mb-0 text-center">Application Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Highest Qualification</label>
                                        <select name="highest_qualification" class="form-select <?php $__errorArgs = [" highest_qualification"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <option value="">Select Highest Qualification</option>
                                            <?php $__currentLoopData = auth()->user()->educations->sortByDesc("passing_year"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($education->degree_title); ?>">
                                                <?php echo e($education->degree_title); ?>

                                                (<?php echo e($education->institute); ?> - <?php echo e($education->passing_year); ?>)
                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(auth()->user()->educations->isEmpty()): ?>
                                            <option value="" disabled>No education records found</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ["highest_qualification"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php if(auth()->user()->educations->isEmpty()): ?>
                                        <small class="text-danger">
                                            Please add your education details in your profile first.
                                        </small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Years of Experience</label>
                                        <input type="number" name="experience_years" class="form-control <?php $__errorArgs = [" experience_years"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" min="0" step="1" required>
                                        <?php $__errorArgs = ["experience_years"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Required Documents Section -->
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-white">
                            <h5 class="card-title mb-0 text-center">Required Documents</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Resume (PDF, DOC, DOCX)</label>
                                    <input type="file" name="resume" class="form-control <?php $__errorArgs = [" resume"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf,.doc,.docx">
                                    <?php $__errorArgs = ["resume"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Cover Letter (PDF, DOC, DOCX)</label>
                                    <input type="file" name="cover_letter" class="form-control <?php $__errorArgs = [" cover_letter"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf,.doc,.docx">
                                    <?php $__errorArgs = ["cover_letter"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Fees Receipt (PDF, JPG, PNG)</label>
                                    <input type="file" name="fees_receipt" class="form-control <?php $__errorArgs = [" fees_receipt"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf,.jpg,.png">
                                    <?php $__errorArgs = ["fees_receipt"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-center gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane me-1"></i>Submit Application
                        </button>
                        <a href="<?php echo e(route("profile")); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Profile
                        </a>
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush("styles"); ?>
<style>
    .readonly {
        background-color: #f8f9fa;
        cursor: not-allowed;
        pointer-events: none;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .card-header {
        border-bottom: none;
    }

</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("frontend.layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/apply.blade.php ENDPATH**/ ?>