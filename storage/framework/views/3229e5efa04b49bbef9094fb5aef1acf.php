<?php $__env->startSection('content'); ?>
<div class="tabs" style="margin: -10px;">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="email-tab" data-toggle="tab" href="#email" role="tab"
               aria-controls="email" aria-selected="true">Login with Email</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="email-tab">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required
                           placeholder="Email">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group m-b-5">
                    <label for="password" class="sr-only">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password" name="password" id="password" required
                               placeholder="Password">
                        <span class="input-group-text">
                            <i class="far fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger mt-2"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group form-inline text-left">
                    <div class="form-check">
                        <label for="remember_me">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                            <h5>Remember me</h5>
                        </label>
                    </div>
                </div>
                <div class="text-left form-group">
                    <button type="submit" class="btn">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/auth/login.blade.php ENDPATH**/ ?>