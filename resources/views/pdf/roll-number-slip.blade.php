<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll Number Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 16px;
        }
        .details {
            margin-top: 30px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details table td {
            padding: 8px;
            border: 1px solid #000;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Roll Number Slip</h1>
        <p>Test Center: {{ $rollNumberSlip->test->test_center }}</p>
    </div>

    <div class="details">
        <table>
            <tr>
                <td><strong>Roll Number:</strong></td>
                <td>{{ $rollNumberSlip->roll_number }}</td>
            </tr>
            <tr>
                <td><strong>Serial Number:</strong></td>
                <td>{{ $rollNumberSlip->serial_number }}</td>
            </tr>
            <tr>
                <td><strong>Test Date:</strong></td>
                <td>{{ $rollNumberSlip->test->test_date }}</td>
            </tr>
            <tr>
                <td><strong>Test Time:</strong></td>
                <td>{{ $rollNumberSlip->test->test_time }}</td>
            </tr>
            <tr>
                <td><strong>Test Center:</strong></td>
                <td>{{ $rollNumberSlip->test->test_center }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Thank you for using our system. Best of luck for your test!</p>
    </div>
</body>
</html>
