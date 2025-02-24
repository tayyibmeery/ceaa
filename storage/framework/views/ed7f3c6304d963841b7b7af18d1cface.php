<?php $__env->startSection('content'); ?>

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Highlights</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Highlights</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Highlights Table</h3>
            <a href="<?php echo e(route('lights.create')); ?>" class="btn btn-primary float-right">Add Highlight</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="highlightsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Icon Name</th>
                  <th>Icon Image</th>
                  <th>Title</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($highlight->id); ?></td>
                    <td><?php echo e($highlight->icon_name); ?></td>
                    <td>
                      <img src="<?php echo e(asset( $highlight->icon_image)); ?>" alt="Icon" width="50" height="50">
                    </td>
                    <td><?php echo e($highlight->title); ?></td>
                    <td>
                      <a href="<?php echo e(route('lights.edit', $highlight->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                      <form action="<?php echo e(route('lights.destroy', $highlight->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <?php echo e($highlights->links()); ?>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  $(function () {
    $('#highlightsTable').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "paging": true,
      "info": true,
      "ordering": true,
      "searching": true,
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CEAA\ceaa\resources\views/backend/highlights/index.blade.php ENDPATH**/ ?>