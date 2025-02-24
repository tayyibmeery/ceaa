<!DOCTYPE html>
<html>
<head>
    <title>Print Roll Number Slip</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; padding: 20px; text-align: center; }
        .header { font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .details { text-align: left; margin-top: 20px; }
        .details p { margin: 5px 0; }
        .print-btn { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Roll Number Slip</div>
        <div class="details">
            <p><strong>Roll Number:</strong> <?php echo e($rollNumber->roll_number); ?></p>
            <p><strong>Candidate Name:</strong> <?php echo e($rollNumber->application->user->full_name); ?></p>
            <p><strong>CNIC:</strong> <?php echo e($rollNumber->application->user->cnic); ?></p>
            <p><strong>Job Post:</strong> <?php echo e($rollNumber->application->jobPost->title); ?></p>
            <p><strong>Test Date:</strong> <?php echo e($rollNumber->test->test_date ?? 'N/A'); ?></p>
            <p><strong>Test Center:</strong> <?php echo e($rollNumber->test->test_center ?? 'N/A'); ?></p>
        </div>

        <button class="print-btn" onclick="window.print()">Print</button>
    </div>
</body>
</html>
<?php /**PATH D:\CEAA\ceaa\resources\views/backend/rollnumberslip/print.blade.php ENDPATH**/ ?>