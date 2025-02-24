<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>


<div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-height-xs="360" data-autoplay="2600" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">
    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="slide background-image" style="background-image: url('<?php echo e(asset($sliders->slider_image)); ?>');overflow:hidden">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="slide-captions text-center">
                <?php if(!empty($sliders->welcome_text)): ?>
                <h6 class="text-light"><?php echo e($sliders->welcome_text); ?></h6>
                <?php endif; ?>
                <?php if(!empty($sliders->heading)): ?>
                <h2 class="text-uppercase text-medium text-light"><?php echo e($sliders->heading); ?></h2>
                <?php endif; ?>
                <?php if(!empty($sliders->button_name)): ?>
                <a class="btn btn-red" href="#"><?php echo e($sliders->button_name); ?></a>
                <?php endif; ?>
                <!-- end: Captions -->
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!--end: Inspiro Slider -->
<!-- WHAT WE DO -->
<div class="container d-m-t">
    <div class="heading-text heading-section text-center">
        <h2>Short Links</h2>
    </div>
    <div class="row py-4">
      <div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="<?php echo e(route('projects.index', ['type' => 'new'])); ?>">
            <div class="boxColorN">
                <img src="<?php echo e(asset('frontend/icons/project.png')); ?>" width="90px" height="90px" alt="New Projects">
            </div>
            <div class="para-text">New Projects</div>
        </a>
    </div>
</div>
<div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="<?php echo e(route('projects.index', ['type' => 'ongoing'])); ?>">
            <div class="boxColorN">
                <img src="<?php echo e(asset('frontend/icons/ongoing.png')); ?>" width="90px" height="90px" alt="Ongoing Projects">
            </div>
            <div class="para-text">OnGoing Projects</div>
        </a>
    </div>
</div>
<div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="<?php echo e(route('projects.index', ['type' => 'completed'])); ?>">
            <div class="boxColorN">
                <img src="<?php echo e(asset('frontend/icons/completed.png')); ?>" width="90px" height="90px" alt="Completed Projects">
            </div>
            <div class="para-text">Completed Projects</div>
        </a>
    </div>
</div>
        
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="CardBox">
                <a target="_blank" href="<?php echo e(route('roll-number-slip.index')); ?>">
                    <div class="boxColorN">
                        <img src="<?php echo e(asset('frontend/icons/roll.png')); ?>" width="90px" height="90px" alt="Roll Numbers">
                    </div>
                    <div class="para-text">Roll Numbers</div>
                </a>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="CardBox">
                <a target="_blank" href="<?php echo e(route('candidate_result.result')); ?>">
                    <div class="boxColorN">
                        <img src="<?php echo e(asset('frontend/icons/result.png')); ?>" width="90px" height="90px" alt="Results">
                    </div>
                    <div class="para-text">Results</div>
                </a>
            </div>
        </div>

    </div>
</div>



<section class="d-m-t">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>Our Main Highlights</h2>
        </div>

        <div class="row pb-5">
            <?php $__currentLoopData = $lights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $light): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($light->title) && !empty($light->icon_image)): ?>
            <div class="col-md-4 col-lg-3 p-2">
                <div class="boxColor">
                    <a target="_blank" href="#">
                        <img src="<?php echo e(asset($light->icon_image)); ?>" width="90px" height="90px" alt="<?php echo e($light->icon_name); ?>">
                        <div class="para-textN"><?php echo e($light->title); ?></div>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>

<!-- COUNTERS -->
<section class="text-light" data-bg-parallax="assets/images/parallax/12.jpg" style="padding: 50px 0px !important;">
    <div class="bg-overlay"></div>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="20" data-to="50" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Tests</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="25" data-to="66" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Candidates</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="30" data-to="99" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Test Centers</p>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- end: COUNTERS -->

<div id="popupDiv" class="modal fade show" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" style="display: block;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 50%; padding: 10px;">
        <div class="modal-content">
            <div class="project-description m-t-20" style="padding:10px">
                <h2 style="font-size: 24px; text-align:center"> Announcement <img src="<?php echo e(asset('frontend/images/new-gif.gif')); ?>" width="40px">
                </h2>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-8 col-sm-8">
                        <span style="display: flex;">
                            <img src="<?php echo e(asset('frontend/images/new-gif-1.gif')); ?>" class="img-rotate" width="40px" height="40px">

                            &nbsp;
                            <h5 class="float-start" style="text-align: justify; line-height: 1;"><?php echo e($post->title); ?>

                            </h5>
                        </span>
                    </div>
                    <div class="col-4 col-sm-4">
                        <a href="<?php echo e(asset( $post->advertisement_file)); ?>" class="btn btn-success btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px" target="_blank"><?php echo e($post->title); ?> - <?php echo e(\Carbon\Carbon::parse($post->advertisement_date)->format('M/Y')); ?></a>
                        <span class="tab"></span>
                         <?php if(\Carbon\Carbon::now()->lt($post->application_deadline)): ?>
                        <a href="<?php echo e(route('postsjob.show', $post->id)); ?>" class="btn btn-warning btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px">Apply Now </a>
                        <?php endif; ?>
                        <span class="tab"></span>
                        <a href="#" class="btn btn-primary btn-sm  dynamic" style="float: right; width: max-content; color: black; background: yellow">Application
                            Status</a>
                        <span class="tab"></span>
                    </div>
                </div>
                <hr>



                
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

<button aria-hidden="true" type="button" style="color: black;" class="mfp-close" onclick="closePopup()" data-dismiss="modal" aria-label="Close">
    ×
</button>



</div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/index.blade.php ENDPATH**/ ?>