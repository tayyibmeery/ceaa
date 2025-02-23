<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll Number Slip</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 11px;
            line-height: 1.3;
        }

        .container {
            border: 2px solid #26a550;
            padding: 10px;
            border-radius: 6px;
            position: relative;
        }

        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0.04;
            z-index: -1;
            pointer-events: none;
        }

        .watermark img {
            width: 70%;
            transform: rotate(-45deg);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #26a550;
            padding-bottom: 8px;
            margin-bottom: 10px;
        }

        .logo {
            height: 70px;
            margin-bottom: 8px;
        }

        .slip-title {
            color: #26a550;
            font-size: 16px;
            font-weight: bold;
            margin: 3px 0;
        }

        .job-title {
            font-size: 13px;
            margin: 3px 0;
            font-weight: bold;
        }

        .candidate-info {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            gap: 15px;
            margin-bottom: 10px;
            background: #f8f9fa;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }

        .candidate-details {
            flex: 1;
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .candidate-details p {
            margin: 4px 0;
            line-height: 1.4;
        }

        .profile-container {
            width: 85px;
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 85px;
            height: 85px;
            border: 2px solid #26a550;
            border-radius: 4px;
            object-fit: cover;
        }

        .info-box {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 8px;
        }

        .section-title {
            color: #26a550;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 6px;
            padding-bottom: 4px;
            border-bottom: 1px solid #dee2e6;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 4px 6px;
            border: 1px solid #dee2e6;
            font-size: 11px;
        }

        .table th {
            background: #f8f9fa;
            width: 35%;
            color: #555;
            font-weight: normal;
        }

        .highlight {
            color: #26a550;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 8px;
            padding-top: 8px;
            border-top: 1px solid #26a550;
            font-size: 10px;
        }

        .instructions {
            font-size: 10px;
            margin: 0;
            padding-left: 15px;
        }

        .instructions li {
            margin-bottom: 2px;
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- Watermark -->
        <div class="watermark">
            <img src="{{ public_path("frontend/images/logo.png") }}" height="150px" alt="Watermark">
        </div>

        <!-- Header -->
        <div class="header">
            <img src="{{ public_path("frontend/images/logo.png") }}" alt="Logo" class="logo">
            <div class="slip-title">ROLL NUMBER SLIP</div>
            <div class="job-title">Post {{ $rollNumberSlip->application->jobPost->title }}</div>
            <div class="job-title">organization name {{ $rollNumberSlip->application->jobPost->organization_name }}</div>
            <div style="font-size:12px; color:#666;">
                {{ $rollNumberSlip->application->user->first_name . " " . $rollNumberSlip->application->user->last_name }}
            </div>
        </div>

        <!-- Candidate Info -->
        <div class="candidate-info">
            <div class="candidate-details">
                <div style="font-size:12px; color:#666;">
                    <strong> Name:</strong>
                {{ $rollNumberSlip->application->user->first_name . " " . $rollNumberSlip->application->user->last_name }}
            </div>
                <p><strong>CNIC:</strong> {{ $rollNumberSlip->application->user->cnic }}</p>
                <p><strong>Roll Number:</strong>
                    <span class="highlight">{{ $rollNumberSlip->roll_number }}</span>
                </p>
                <p><strong>Father's Name:</strong>
                    {{ $rollNumberSlip->application->user->father_name }}
                </p>
            </div>
            <div class="profile-container">
                <img src="{{ public_path("storage/" . ($rollNumberSlip->application->user->profile_picture ?? "default-profile.jpg")) }}" class="profile-image" alt="Profile Photo">
            </div>
        </div>

        <div class="grid">
            <!-- Test Schedule -->
            <div class="info-box">
                <div class="section-title ">Test Schedule</div>
                <table class="table">
                    <tr>
                        <th>Date:</th>
                        <td>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_date)->format("d M, Y") }}</td>
                    </tr>
                    <tr>
                        <th>Time:</th>
                        <td>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_time)->format("h:i A") }}</td>
                    </tr>
                </table>
            </div>

            <!-- Contact Details -->
            <div class="info-box">
                <div class="section-title">Contact Details</div>
                <table class="table">
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $rollNumberSlip->application->user->phone }}</td>
                    </tr>
                    <tr>
                        <th>District:</th>
                        <td>{{ $rollNumberSlip->application->user->district_of_domicile }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Test Center -->
        <div class="info-box">
            <div class="section-title">Test Center</div>
            <p style="margin:0; padding:3px 6px;">{{ $rollNumberSlip->test->test_center }}</p>
        </div>

        <!-- Important Instructions -->
        <div class="info-box">
            <div class="section-title">Important Instructions</div>
            <ol class="instructions">
                <li>Bring original CNIC and this Roll Number Slip</li>
                <li>Arrive 30 minutes before test time</li>
                <li>Bring blue/black ballpoint pen</li>
                <li>No electronic devices allowed</li>
                <li>Entry without CNIC not allowed</li>
            </ol>
        </div>

        <div class="footer">
            <p style="margin:2px 0">Computer generated slip - No signature required</p>
            <p style="color:#26a550; font-weight:bold; margin:2px 0">Best of luck!</p>
        </div>
    </div>
</body>

</html>
