   <div class="row w3-animate-fading w3-animate-top" id="buttona">
   <?php
    use App\Models\SocialIcon;

    $socialIcons = SocialIcon::all();
?>
   <?php $__currentLoopData = $socialIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h6>
        <span class="social-icons social-icons-colored float-right">
            <li class="social-<?php echo e($social->social_icon_name); ?>">
                <a target="_blank" href="<?php echo e($social->social_icon_url); ?>" class="bg-success">
                    <i class="fab fa-<?php echo e($social->social_icon_name); ?>"></i>
                </a>
            </li>
        </span>
    </h6>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
<?php /**PATH D:\CEAA\ceaa\resources\views/frontend/layout/socialicon.blade.php ENDPATH**/ ?>