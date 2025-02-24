<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll Number Slip</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm; /* Ensuring correct margin for printing */
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: white; /* Ensures proper background */
        }

        .container {
            width: 18cm; /* Slightly smaller than A4 width */
            height: 26cm; /* Ensures proper fitting */
            border: 1.5px solid #1e7e34;
            padding: 10px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background: white;
        }

        /* Watermark Styling */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            opacity: 0.1;
            z-index: -1;
            width: 60%;
        }

        .watermark img {
            width: 100%;
        }

        /* Header Styling */
        .header {
            text-align: center;
            border-bottom: 1px solid #1e7e34;
            padding-bottom: 6px;
            margin-bottom: 15px;
        }

        .logo {
            height: 70px;
        }

        .slip-title {
            color: #1e7e34;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Candidate Information Section */
        .candidate-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .profile-image {
            width: 90px;
            height: 90px;
            border: 1px solid #1e7e34;
            border-radius: 6px;
            object-fit: cover;
        }

        /* Info Box Styling */
        .info-box {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 5px;
            margin-bottom: 10px;
        }
.center{
     text-align: center;
}
        .section-title {
            color: #1e7e34;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 2.5px;
            margin-bottom: 8px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: auto; /* Push footer to bottom */
            font-size: 11px;
            color: #555;
            border-top: 1px solid #1e7e34;
            padding-top: 4px;
        }

        /* Print Optimizations */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .container {
                page-break-inside: avoid;
                box-shadow: none;
                border: 1px solid black; /* Ensures clear printed border */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="watermark">
            <img src="{{ public_path('frontend/images/logo.png') }}" alt="Watermark">
        </div>

        <div class="header">
            <img src="{{ public_path('frontend/images/logo.png') }}" class="logo" alt="Logo">
            <div class="slip-title">ROLL NUMBER SLIP</div>
        </div>

        <div class="candidate-info">
            <div>
                <p><strong>Name:</strong> {{ $rollNumberSlip->application->user->first_name }} {{ $rollNumberSlip->application->user->last_name }}</p>
                <p><strong>CNIC:</strong> {{ $rollNumberSlip->application->user->cnic }}</p>
                <p><strong>Roll Number:</strong> {{ $rollNumberSlip->roll_number }}</p>
            </div>
            <div>
                <img src="{{ public_path('storage/' . ($rollNumberSlip->application->user->profile_picture ?? 'default.jpg')) }}" class="profile-image" alt="Profile Photo">
            </div>
        </div>

        <div class="info-grid">
            <div class="info-box">
                <div class="section-title">Test Date</div>
                <p class="center">{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_date)->format('d M, Y') }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">Test Time</div>
                <p class="center">{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_time)->format('h:i A') }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">Test Center</div>
                <p class="center">{{ $rollNumberSlip->test->test_center }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">District</div>
                <p class="center">{{ $rollNumberSlip->application->user->district_of_domicile }}</p>
            </div>
        </div>

        <div class="info-box center">
            <div class="section-title">Important Instructions</div>
            <ul class="center">
                <li>Bring original CNIC and this Roll Number Slip.</li>
                <li>Arrive 30 minutes before the test time.</li>
                <li>Bring a blue/black ballpoint pen.</li>
                <li>No electronic devices allowed.</li>
            </ul>
        </div>

        <div class="footer">
            <p class="center"> Computer generated slip - No signature required</p>
            <p class="center" style="color:#1e7e34; font-weight:bold;">Best of luck!</p>
        </div>
    </div>
</body>
</html>
