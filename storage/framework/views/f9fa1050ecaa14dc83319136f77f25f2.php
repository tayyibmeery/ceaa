<?php $__env->startSection("title", "Edit Profile"); ?>

<?php $__env->startSection("content"); ?>
<section class="bg-white py-4">
    <div class="container py-5">
        <div class="mb-4 text-center">
            <h2>Edit Profile</h2>
            <p class="text-muted">Update your personal information and education details</p>
        </div>
        <form action="<?php echo e(route("profile.update")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
            <div class="row">
                <div class="col-lg-4">
                    <!-- Profile Picture Card -->
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-center text-white">
                            <h5 class="mb-0">Profile Picture</h5>
                        </div>
                        <div class="card-body text-center">

                            <div class="mb-3">
                                <img src="<?php echo e(asset( (auth()->user()->profile_picture ?? "default-profile.jpg"))); ?>" class="rounded-circle mb-3 border border-2" width="150" height="150" id="preview-image">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control <?php $__errorArgs = [" profile_picture"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="profile_picture" name="profile_picture" onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                <?php $__errorArgs = ["profile_picture"];
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

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header bg-success py-3 text-center text-white">
                            <h5 class="mb-0">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <!-- Success Message -->
                            <?php if(session("success")): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <?php echo e(session("success")); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <!-- Error Message -->
                            <?php if(session("error")): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <?php echo e(session("error")); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>

                            <!-- Validation Errors -->
                            <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>



                            <!-- Basic Information -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" first_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name" value="<?php echo e(old("first_name", auth()->user()->first_name)); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" last_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" value="<?php echo e(old("last_name", auth()->user()->last_name)); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" father_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="father_name" value="<?php echo e(old("father_name", auth()->user()->father_name)); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control <?php $__errorArgs = [" date_of_birth"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_of_birth" value="<?php echo e(old("date_of_birth", auth()->user()->date_of_birth)); ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select <?php $__errorArgs = [" gender"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" <?php echo e(old("gender", auth()->user()->gender) === "male" ? "selected" : ""); ?>>
                                            Male</option>
                                        <option value="female" <?php echo e(old("gender", auth()->user()->gender) === "female" ? "selected" : ""); ?>>
                                            Female</option>
                                        <option value="other" <?php echo e(old("gender", auth()->user()->gender) === "other" ? "selected" : ""); ?>>
                                            Other</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">CNIC</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" cnic"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cnic" value="<?php echo e(old("cnic", auth()->user()->cnic)); ?>" placeholder="XXXXX-XXXXXXX-X">
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Contact Information -->
                            <h5 class="mb-3">Contact Information</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Change Password</label>
                                    <input type="password" class="form-control <?php $__errorArgs = [" password"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Leave blank to keep current password">
                                    <?php $__errorArgs = ["password"];
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

                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" phone"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old("phone", auth()->user()->phone)); ?>">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control <?php $__errorArgs = [" address"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" rows="2"><?php echo e(old("address", auth()->user()->address)); ?></textarea>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Location Details -->
                            <h5 class="mb-3">Location Details</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Province of Domicile</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" province_of_domicile"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="province_of_domicile" value="<?php echo e(old("province_of_domicile", auth()->user()->province_of_domicile)); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">District of Domicile</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" district_of_domicile"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="district_of_domicile" value="<?php echo e(old("district_of_domicile", auth()->user()->district_of_domicile)); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal City</label>
                                    <input type="text" class="form-control <?php $__errorArgs = [" postal_city"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="postal_city" value="<?php echo e(old("postal_city", auth()->user()->postal_city)); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal Address</label>
                                    <textarea class="form-control <?php $__errorArgs = [" postal_address"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="postal_address" rows="1"><?php echo e(old("postal_address", auth()->user()->postal_address)); ?></textarea>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Education Section -->
                            <h5 class="mb-3">Education Details</h5>
                            <div id="education-container">
                                <?php if(old("educations")): ?>
                                <?php $__currentLoopData = old("educations"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="education-entry mb-3 rounded border p-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Degree Title</label>
                                            <input type="text" class="form-control <?php $__errorArgs = [" educations." . $index . ".degree_title" ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="educations[<?php echo e($index); ?>][degree_title]" value="<?php echo e($education["degree_title"]); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Institute</label>
                                            <input type="text" class="form-control <?php $__errorArgs = [" educations." . $index . ".institute" ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="educations[<?php echo e($index); ?>][institute]" value="<?php echo e($education["institute"]); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Board/University</label>
                                            <input type="text" class="form-control <?php $__errorArgs = [" educations." . $index . ".board_university" ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="educations[<?php echo e($index); ?>][board_university]" value="<?php echo e($education["board_university"]); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" class="form-control <?php $__errorArgs = [" educations." . $index . ".passing_year" ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="educations[<?php echo e($index); ?>][passing_year]" value="<?php echo e($education["passing_year"]); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Grade/CGPA</label>
                                            <input type="text" class="form-control <?php $__errorArgs = [" educations." . $index . ".grade_cgpa" ];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="educations[<?php echo e($index); ?>][grade_cgpa]" value="<?php echo e($education["grade_cgpa"]); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php $__errorArgs = ["educations." . $index . ".degree_title"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ["educations." . $index . ".institute"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ["educations." . $index . ".board_university"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ["educations." . $index . ".passing_year"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php $__errorArgs = ["educations." . $index . ".grade_cgpa"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <?php $__empty_1 = true; $__currentLoopData = auth()->user()->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="education-entry mb-3 rounded border p-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Degree Title</label>
                                            <input type="text" class="form-control" name="educations[<?php echo e($index); ?>][degree_title]" value="<?php echo e($education->degree_title); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Institute</label>
                                            <input type="text" class="form-control" name="educations[<?php echo e($index); ?>][institute]" value="<?php echo e($education->institute); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Board/University</label>
                                            <input type="text" class="form-control" name="educations[<?php echo e($index); ?>][board_university]" value="<?php echo e($education->board_university); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" class="form-control" name="educations[<?php echo e($index); ?>][passing_year]" value="<?php echo e($education->passing_year); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Grade/CGPA</label>
                                            <input type="text" class="form-control" name="educations[<?php echo e($index); ?>][grade_cgpa]" value="<?php echo e($education->grade_cgpa); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-muted text-center">No education details added yet.</p>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <div class="mb-4 text-center">
                                <button type="button" class="btn btn-outline-success" id="add-education">
                                    <i class="fas fa-plus me-1"></i>Add Education
                                </button>
                            </div>

                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i>Save Changes
                                </button>
                                <a href="<?php echo e(route("profile")); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php $__env->startPush("scripts"); ?>
<script>
    document.getElementById('add-education').addEventListener('click', function() {
        const container = document.getElementById('education-container');
        const count = container.getElementsByClassName('education-entry').length;

        const template = `
            <div class="education-entry border rounded p-3 mb-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Degree Title</label>
                        <input type="text"
                              class="form-control <?php $__errorArgs = ['educations.${count}.degree_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="educations[${count}][degree_title]"
                              value="<?php echo e(old('educations.${count}.degree_title')); ?>">
                        <?php $__errorArgs = ['educations.${count}.degree_title'];
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
                    <div class="col-md-6">
                        <label class="form-label">Institute</label>
                        <input type="text"
                              class="form-control <?php $__errorArgs = ['educations.${count}.institute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="educations[${count}][institute]"
                              value="<?php echo e(old('educations.${count}.institute')); ?>">
                        <?php $__errorArgs = ['educations.${count}.institute'];
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
                        <label class="form-label">Board/University</label>
                        <input type="text"
                              class="form-control <?php $__errorArgs = ['educations.${count}.board_university'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="educations[${count}][board_university]"
                              value="<?php echo e(old('educations.${count}.board_university')); ?>">
                        <?php $__errorArgs = ['educations.${count}.board_university'];
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
                        <label class="form-label">Passing Year</label>
                        <input type="number"
                              class="form-control <?php $__errorArgs = ['educations.${count}.passing_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="educations[${count}][passing_year]"
                              value="<?php echo e(old('educations.${count}.passing_year')); ?>">
                        <?php $__errorArgs = ['educations.${count}.passing_year'];
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
                        <label class="form-label">Grade/CGPA</label>
                        <input type="text"
                              class="form-control <?php $__errorArgs = ['educations.${count}.grade_cgpa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="educations[${count}][grade_cgpa]"
                              value="<?php echo e(old('educations.${count}.grade_cgpa')); ?>">
                        <?php $__errorArgs = ['educations.${count}.grade_cgpa'];
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
        `;

        container.insertAdjacentHTML('beforeend', template);
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("frontend.layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/edit.blade.php ENDPATH**/ ?>