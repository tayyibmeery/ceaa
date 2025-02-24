<?php $__env->startSection("title", "Projects"); ?>

<?php $__env->startSection("content"); ?>

<section id="page-content" class="sidebar-left">
    <div class="container-fluid">
        <div class="tabs tabs-vertical">
            <div class="row">
                <div class="sidebar col-lg-3">
                    
                    <div class="widget clearfix widget-archive">
                        
                    </div>
                    <div class="widget clearfix widget-archive notificationSection list-unstyled small">
                        <div class="widget-title text-center">
                            <h4 class="btn btn-rounded btn-danger w-100">News Alerts</h4>
                        </div>
                        <marquee direction="up" scrollamount="2" height="300px" onmouseover="this.stop()" onmouseout="this.start()">
                            <div class="notificationsView">
                            </div>

                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="notification-box blink dynamic border-bottom small">
                                <div class="row lh-sm mx-1">
                                    <strong class="text-info"><?php echo e($post->title); ?></strong>
                                    <a href="<?php echo e(asset( $post->advertisement_file)); ?>" class="btn btn-success btn-sm blink dynamic float-end">
                                        <?php echo e($post->title); ?> -
                                        <?php echo e(\Carbon\Carbon::parse($post->advertisement_date)->format("M/Y")); ?>

                                    </a>
                                    <span class="tab"></span>
                                    <?php if(\Carbon\Carbon::now()->lt($post->application_deadline)): ?>
                                    <a href="<?php echo e(route("postsjob.show", $post->id)); ?>" class="btn btn-warning btn-sm dynamic float-end me-1">Apply Now
                                    </a>
                                    <?php else: ?>
                                    <a href="#" class="btn btn-danger btn-sm dynamic float-end me-1">Expired
                                    </a>
                                    <?php endif; ?>
                                    <span class="tab"></span>

                                    <small class="badge text-info small text-end"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format("M/Y h:i A")); ?></small>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            

                        </marquee>
                    </div>

                </div>
                <div class="content col-lg-9">
                    <div id="page-title" style="padding: 20px 0 !important;">
                        <div class="container">
                            <div class="page-title">
                                <h1>Projects</h1>
                                <span>Browse All Projects</span>
                            </div>
                        </div>
                    </div>

                    <!-- Project Filter Tabs -->
                  <ul class="nav nav-tabs bg-light mb-4 border-0 p-2">
    <li class="nav-item">
        <a class="nav-link <?php echo e($type === 'new' ? 'active bg-success text-white' : 'bg-white'); ?> me-2 rounded"
           href="<?php echo e(route('projects.index', ['type' => 'new'])); ?>">New Projects</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e($type === 'ongoing' ? 'active bg-success text-white' : 'bg-white'); ?> me-2 rounded"
           href="<?php echo e(route('projects.index', ['type' => 'ongoing'])); ?>">Ongoing</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e($type === 'completed' ? 'active bg-success text-white' : 'bg-white'); ?> me-2 rounded"
           href="<?php echo e(route('projects.index', ['type' => 'completed'])); ?>">Completed</a>
    </li>
</ul>

                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <span class="h4">
                                <?php if(isset($type)): ?>
                                <?php echo e(ucfirst($type)); ?> Projects
                                <?php else: ?>
                                Projects List
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table" id="projects-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project</th>
                                        <th>Posted Date</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($jobPost->id); ?></td>
                                        <td><?php echo e($jobPost->title); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($jobPost->created_at)->format("d-m-Y")); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($jobPost->application_deadline)->format("d-m-Y")); ?>

                                        </td>
                                        <td>
                                            <?php if(\Carbon\Carbon::now()->lt($jobPost->application_deadline)): ?>
                                            <span class="badge badge-success">Active</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Expired</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($jobPost->advertisement_file): ?>
                                            <a href="<?php echo e(asset( $jobPost->advertisement_file)); ?>" class="btn btn-info btn-sm" target="_blank">
                                                <i class="fas fa-download"></i> Ad
                                            </a>
                                            <?php endif; ?>

                                            <?php if(\Carbon\Carbon::now()->lt($jobPost->application_deadline)): ?>
                                            <a href="<?php echo e(route("postsjob.show", $jobPost->id)); ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-paper-plane"></i> Apply
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="mt-4">
                                <?php echo e($posts->links()); ?>

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
<script>
    $(document).ready(function() {
        $('#projects-table').DataTable({
            "order": [
                [0, "desc"]
            ]
            , "pageLength": 10
            , "responsive": true
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush("styles"); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("frontend.layout.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/frontend/project.blade.php ENDPATH**/ ?>