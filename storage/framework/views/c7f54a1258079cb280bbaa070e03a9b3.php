<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Applications</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Applications</li>
                </ol>
            </div>
        </div>
    </div>
</section>





<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-md-12">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
            </div>
            <!-- Job Post Filter -->
            <div class="col-sm-4">
                <form id="filterForm" method="GET" action="<?php echo e(route('applications.index')); ?>">
                    <select name="job_post_id" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Job Post</option>
                        <?php $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($jobPost->id); ?>" <?php echo e(request('job_post_id') == $jobPost->id ? 'selected' : ''); ?>>
                            <?php echo e($jobPost->title); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
            </div>
            <div class="col-sm-8 text-right">
                <a href="<?php echo e(route('applications.export', ['job_post_id' => request('job_post_id')])); ?>" class="btn btn-success">Export to Excel</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applications Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="applicationsTable" class="table table-bordered table-hover" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>CNIC</th>
                                        
                                        <th>Job Post</th>
                                        <th>Status</th>
                                        <th>Application Date</th>
                                        
                                        <th>Reviewer Remarks</th>
                                        <th>Payment Status</th>
                                        
                                        <th>Application Deadline</th>
                                        
                                        <th>Profile Picture</th>
                                        <th>Fees Receipt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($application->id); ?></td>
                                        <td><?php echo e($application->user->FullName ?? 'N/A'); ?></td>
                                        <td><?php echo e($application->user->cnic ?? 'N/A'); ?></td>
                                        
                                        <td><?php echo e($application->jobPost->title ?? 'N/A'); ?></td>
                                        <td>
                                            <span class="badge
                                                    <?php echo e($application->status == 'applied' ? 'badge-primary' : ''); ?>

                                                    <?php echo e($application->status == 'test_scheduled' ? 'badge-info' : ''); ?>

                                                    <?php echo e($application->status == 'test_completed' ? 'badge-warning' : ''); ?>

                                                    <?php echo e($application->status == 'result_generated' ? 'badge-success' : ''); ?>

                                                ">
                                                <?php echo e(ucfirst(str_replace('_', ' ', $application->status))); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($application->created_at->format('d-m-Y')); ?></td>
                                        
                                        <td><?php echo e($application->reviewer_remarks ?? 'N/A'); ?></td>
                                        <td>
                                            <span class="badge
                                                    <?php echo e($application->payment_status == 'pending' ? 'badge-warning' : ''); ?>

                                                    <?php echo e($application->payment_status == 'paid' ? 'badge-success' : ''); ?>

                                                    <?php echo e($application->payment_status == 'failed' ? 'badge-danger' : ''); ?>

                                                ">
                                                <?php echo e(ucfirst($application->payment_status)); ?>

                                            </span>
                                        </td>
                                        
                                        <td><?php echo e($application->jobPost->application_deadline ? \Carbon\Carbon::parse($application->jobPost->application_deadline)->format('d-m-Y') : 'N/A'); ?></td>
                                        
                                        <td>
                                            <?php if($application->user->profile_picture): ?>
                                            <img src="<?php echo e(asset($application->user->profile_picture)); ?>" alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                            <?php else: ?>
                                            N/A
                                            <?php endif; ?>
                                        </td>
                                        
                                        <td>
                                            <?php if($application->fees_receipt): ?>
                                            <?php
                                            $fileExtension = pathinfo($application->fees_receipt, PATHINFO_EXTENSION);
                                            ?>

                                            <?php if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])): ?>
                                            <!-- Show image thumbnail and View button -->
                                            <img src="<?php echo e(asset($application->fees_receipt)); ?>" alt="Fees Receipt" style="width: 50px; height: 50px; object-fit: cover;">
                                            <button type="button" class="btn btn-primary btn-sm view-image" data-img="<?php echo e(asset($application->fees_receipt)); ?>">View</button>

                                            <?php elseif(strtolower($fileExtension) == 'pdf'): ?>
                                            <!-- Show PDF view button -->
                                            <a href="<?php echo e(asset($application->fees_receipt)); ?>" target="_blank" class="btn btn-info btn-sm">View </a>

                                            <?php else: ?>
                                            <span><?php echo e($application->fees_receipt); ?></span>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            N/A
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            
                                            <a href="<?php echo e(route('applications.edit', $application->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="<?php echo e(route('applications.destroy', $application->id)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal for viewing image -->
<div id="imageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Fees Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Fees Receipt" style="max-width: 100%; max-height: 500px;">
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#applicationsTable').DataTable({
            "responsive": true
            , "autoWidth": false
            , "lengthChange": true
            , "pageLength": 10
        , });
    });

</script>


<script>
    $(document).ready(function() {
        // When the "View Image" button is clicked
        $('.view-image').on('click', function() {
            var imgSrc = $(this).data('img'); // Get the image source from data-img attribute

            // Set the image source to the modal
            $('#modalImage').attr('src', imgSrc);

            // Show the modal
            $('#imageModal').modal('show');
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<?php $__env->stopPush(); ?>






















<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/application/index.blade.php ENDPATH**/ ?>