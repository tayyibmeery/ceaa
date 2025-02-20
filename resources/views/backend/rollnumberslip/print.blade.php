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
            <p><strong>Roll Number:</strong> {{ $rollNumber->roll_number }}</p>
            <p><strong>Candidate Name:</strong> {{ $rollNumber->application->user->full_name }}</p>
            <p><strong>CNIC:</strong> {{ $rollNumber->application->user->cnic }}</p>
            <p><strong>Job Post:</strong> {{ $rollNumber->application->jobPost->title }}</p>
            <p><strong>Test Date:</strong> {{ $rollNumber->test->test_date ?? 'N/A' }}</p>
            <p><strong>Test Center:</strong> {{ $rollNumber->test->test_center ?? 'N/A' }}</p>
        </div>

        <button class="print-btn" onclick="window.print()">Print</button>
    </div>
</body>
</html>
