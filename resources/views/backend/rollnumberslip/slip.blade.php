<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll Number Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .details {
            width: 100%;
            margin-bottom: 20px;
        }
        .details th, .details td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .details th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Roll Number Slip</h2>
        <p><strong>Organization:</strong> {{ $application->jobPost->organization->name }}</p>
    </div>

    <table class="details">
        <tr>
            <th>Candidate Name</th>
            <td>{{ $application->candidate->name }}</td>
        </tr>
        <tr>
            <th>CNIC</th>
            <td>{{ $application->candidate->cnic }}</td>
        </tr>
        <tr>
            <th>Job Title</th>
            <td>{{ $application->jobPost->title }}</td>
        </tr>
        <tr>
            <th>Test Center</th>
            <td>{{ $application->test_center ?? 'Not Assigned' }}</td>
        </tr>
        <tr>
            <th>Test Date</th>
            <td>{{ $application->test_date ? $application->test_date->format('d-m-Y') : 'Not Scheduled' }}</td>
        </tr>
        <tr>
            <th>Reporting Time</th>
            <td>{{ $application->reporting_time ?? 'Not Scheduled' }}</td>
        </tr>
        <tr>
            <th>Roll Number</th>
            <td>{{ $application->roll_number ?? 'Pending' }}</td>
        </tr>
    </table>

    <p style="text-align: center;">Please bring this slip along with your original CNIC to the test center.</p>
</body>
</html>
