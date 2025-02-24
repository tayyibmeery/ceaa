 <!-- Header -->
 <header id="header">
     <div class="header-inner">
         <div class="container">
             <!--Logo-->
             <div id="logo">
                 <a href="<?php echo e(route('front')); ?>">
                     
                     <img class="logo-default" src="<?php echo e(asset('frontend\images\logo.png')); ?>" alt="CEAA Logo" style="max-height: 50px;">
                     <img class="logo-dark" src="<?php echo e(asset('frontend\images\logo.png')); ?>" alt="CEAA Logo" style="max-height: 50px; display: none;">
                 </a>
             </div>


             
             

             <!--end: Header Extras-->
             <!--Navigation Resposnive Trigger-->
             <div id="mainMenu-trigger"><a class="lines-button x"><span class="lines"></span></a></div>
             <!--end: Navigation Resposnive Trigger-->
             <!--Navigation-->
             <div id="mainMenu">
                 <div class="container">
                     <nav>
                         <ul>
                             <li><a href="<?php echo e(route('front')); ?>">Home</a></li>
                             <li class="dropdown"><a href="#">About CEAA?</a>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="<?php echo e(route('vision')); ?>">Vision & Core Values</a></li>
                                     <?php $__currentLoopData = App\Models\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li class="dropdown-submenu"><a href="<?php echo e(url('page/'.$page->slug)); ?>"><?php echo e($page->name); ?></a></li>
                                     
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             

                         </ul>
                         </li>
                         <li class="dropdown"><a href="<?php echo e(route('servises')); ?>">Services</a>
                             
                         </li>


                         <li class="dropdown"><a href="<?php echo e(route('projects.index')); ?>">Projects</a>
                             
                         </li>
                         <li class="dropdown"><a href="<?php echo e(route('roll-number-slip.index')); ?>" class="blink"> Roll No's</a>
                             
                         </li>

                         <li class="dropdown"><a href="<?php echo e(route('candidate_result.result')); ?>" class="blink">Results</a>

                         </li>

                         

                            <li class="dropdown"><a href="#">Our Terms</a>
                                 <ul class="dropdown-menu">

                                     <?php $__currentLoopData = App\Models\Trem::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li class="dropdown-submenu"><a href="<?php echo e(url('ourtrem/'.$trems->slug)); ?>"><?php echo e($trems->name); ?></a></li>
                                     
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </ul>
                            </li>
                         <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                             <ul class="dropdown-menu">
                                 <?php if(auth()->guard()->check()): ?>
                                 <!-- For logged-in users -->
                                 <li><a href="<?php echo e(route('profile')); ?>">Profile</a></li>
                                 <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                     <?php echo csrf_field(); ?>
                                 </form>
                                 <?php else: ?>
                                 <!-- For guests (users not logged in) -->
                                 <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                                 <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                                 <?php endif; ?>
                             </ul>
                         </li>

                         
                         


                         </ul>
                     </nav>
                 </div>
             </div>
             <!--end: Navigation-->
         </div>
     </div>
 </header>
 <!-- end: Header -->
 
<?php /**PATH D:\CEAA\ceaa\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>