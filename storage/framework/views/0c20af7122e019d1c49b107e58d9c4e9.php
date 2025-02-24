 <div id="backgroundDiv" class="modal-backdrop fade "></div>

 <footer id="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4  col-lg-2 col-md-4">
                        <!-- Footer widget area 1 -->
                        <div class="widget  widget-contact-us"
                             style="background-image: url('images/world-map-dark.png'); background-position: 50% 20px; background-repeat: no-repeat">
                            <h4>About CEAA</h4>
                            <ul class="list-icon list-icon-bold">

                                   <?php
    use App\Models\AboutIcon;

    $socialIcons = AboutIcon::all();
?>
   <?php $__currentLoopData = $socialIcons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <li>
    <i class="text-danger fa fa-<?php echo e($social->about_icon_name); ?>" style="display: inline-block; vertical-align: middle; margin-right: 10px;"></i>
    <span style="display: inline-block; vertical-align: middle;"><?php echo $social->about_icon_detail; ?></span>
</li>

                                

                                    
                                
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>

                        </div>
                        <!-- end: Footer widget area 1 -->
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <!-- Footer widget area 1 -->
                        <div class="widget">
                            <h4>About Us</h4>
                            <ul class="list">
                                <li><a href="<?php echo e(route('vision')); ?>">Core Values</a></li>
                                <?php $__currentLoopData = App\Models\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                 <li><a href="<?php echo e(url('page/'.$page->slug)); ?>"><?php echo e($page->name); ?></a></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                        <!-- end: Footer widget area 1 -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <!-- Footer widget area 2 -->
                        <div class="widget">
                            <h4>Our Terms</h4>
                            <ul class="list">
                              <?php $__currentLoopData = App\Models\Trem::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                 <li><a href="<?php echo e(url('ourtrem/'.$trem->slug)); ?>"><?php echo e($trem->name); ?></a></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- end: Footer widget area 2 -->
                    </div>


                    <div class="col-lg-4">
                        <form class="widget-contact-form" novalidate="" action="https://etapk.com/include/contact-form.php"
                              role="form" method="post">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                </div>
                                <input type="text" aria-required="true" name="widget-contact-form-name"
                                       class="form-control required name" placeholder="Enter your Name">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" aria-required="true" required=""
                                       name="widget-contact-form-email" class="form-control required email"
                                       placeholder="Enter your Email">
                            </div>
                            <div class="form-group mb-2">
                                    <textarea type="text" name="widget-contact-form-message" rows="5"
                                              class="form-control required"
                                              placeholder="Enter your Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="form-submit"><i
                                        class="fa fa-paper-plane"></i>&nbsp;Send message
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
                
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">

                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="copyright-text text-center">© 2025 CEAA. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php /**PATH D:\CEAA\ceaa\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>