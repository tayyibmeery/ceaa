<!DOCTYPE html>
<html>
<head>
    <title>Roll Number Slip</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; font-size: 20px; font-weight: bold; }
        .details { margin-top: 20px; }
        .details p { margin: 5px 0; }
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
    </div>
</body>
</html>
