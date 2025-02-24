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
            padding: 10px; /* Reduced padding */
            font-size: 11px; /* Smaller font size */
            line-height: 1.4;

        }

        .container {
            border: 2px solid #26a550;
            padding: 15px; /* Reduced padding */
            border-radius: 8px;
            position: relative;

            /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); */
            height: 95vh; /* Ensure it fits on one page */
            overflow: hidden; /* Prevent overflow */
        }

        .watermark {
            position: absolute; /* Changed to absolute */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%) rotate(-45deg); /* Center and rotate */
            opacity: 0.1; /* Adjust opacity */
            z-index: 1; /* Ensure it's above the background but below content */
            pointer-events: none; /* Prevent interaction */
        }

        .watermark img {
            width: 80%; /* Increase size */
            height: auto;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #26a550;
            padding-bottom: 8px; /* Reduced padding */
            margin-bottom: 10px; /* Reduced margin */
            position: relative; /* Ensure header is above watermark */
            z-index: 2; /* Higher z-index than watermark */
        }

        .logo {
            height: 60px; /* Reduced logo size */
            margin-bottom: 6px; /* Reduced margin */
        }

        .slip-title {
            color: #26a550;
            font-size: 16px; /* Adjusted font size */
            font-weight: bold;
            margin: 4px 0; /* Reduced margin */
        }

        .job-title {
            font-size: 12px; /* Smaller font size */
            margin: 4px 0; /* Reduced margin */
            font-weight: bold;
            color: #333;
        }

        .candidate-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px; /* Reduced gap */
            margin-bottom: 10px; /* Reduced margin */

            padding: 10px; /* Reduced padding */
            border-radius: 6px;
            border: 1px solid #dee2e6;
            position: relative; /* Ensure it's above watermark */
            z-index: 2; /* Higher z-index than watermark */
        }

        .candidate-details {
            flex: 1;
            text-align: left;
        }

        .candidate-details p {
            margin: 4px 0; /* Reduced margin */
            line-height: 1.4;
            color: #555;
        }

        .profile-container {
            width: 80px; /* Reduced size */
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 80px; /* Reduced size */
            height: 80px; /* Reduced size */
            border: 2px solid #26a550;
            border-radius: 6px;
            object-fit: cover;
        }

        .info-box {

            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 8px; /* Reduced padding */
            margin-bottom: 8px; /* Reduced margin */
            position: relative; /* Ensure it's above watermark */
            z-index: 2; /* Higher z-index than watermark */
        }

        .section-title {
            color: #26a550;
            font-size: 12px; /* Smaller font size */
            font-weight: bold;
            margin-bottom: 6px; /* Reduced margin */
            padding-bottom: 4px; /* Reduced padding */
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 4px 0; /* Reduced padding */
            border-bottom: 1px solid #eee;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #555;
            width: 40%;
        }

        .info-value {
            width: 60%;
            text-align: right;
            color: #333;
        }

        .full-width-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px; /* Reduced gap */
            margin-bottom: 8px; /* Reduced margin */
            position: relative; /* Ensure it's above watermark */
            z-index: 2; /* Higher z-index than watermark */
        }

        .full-width-grid .info-box {
            margin-bottom: 0;
        }

        .footer {
            text-align: center;
            margin-top: 8px; /* Reduced margin */
            padding-top: 8px; /* Reduced padding */
            border-top: 1px solid #26a550;
            font-size: 10px; /* Smaller font size */
            color: #666;
            position: relative; /* Ensure it's above watermark */
            z-index: 2; /* Higher z-index than watermark */
        }

        .instructions {
            font-size: 10px; /* Smaller font size */
            margin: 0;
            padding-left: 15px; /* Reduced padding */
        }

        .instructions li {
            margin-bottom: 3px; /* Reduced margin */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Watermark -->
        <div class="watermark">
            <img src="{{ public_path('frontend/images/logo.png') }}" alt="Watermark">
        </div>

        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('frontend/images/logo.png') }}" alt="Logo" class="logo">
            <div class="slip-title">ROLL NUMBER SLIP</div>
            <div class="job-title">Post: {{ $rollNumberSlip->application->jobPost->title }}</div>
            <div class="job-title">Organization: {{ $rollNumberSlip->application->jobPost->organization_name }}</div>
        </div>

        <!-- Candidate Info -->
        <div class="candidate-info">
            <div class="candidate-details">
                <p><strong>Name:</strong> {{ $rollNumberSlip->application->user->first_name . " " . $rollNumberSlip->application->user->last_name }}</p>
                <p><strong>CNIC:</strong> {{ $rollNumberSlip->application->user->cnic }}</p>
                <p><strong>Roll Number:</strong> <span class="highlight">{{ $rollNumberSlip->roll_number }}</span></p>
                <p><strong>Father's Name:</strong> {{ $rollNumberSlip->application->user->father_name }}</p>
            </div>
            <div class="profile-container">
                <img src="{{ public_path('storage/' . ($rollNumberSlip->application->user->profile_picture ?? 'default-profile.jpg')) }}" class="profile-image" alt="Profile Photo">
            </div>
        </div>

        <!-- Test Schedule (Full Width, 4 Columns) -->
        <div class="full-width-grid">
            <div class="info-box">
                <div class="section-title">Test Date</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_date)->format('d M, Y') }}</div>
            </div>
            <div class="info-box">
                <div class="section-title">Test Time</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_time)->format('h:i A') }}</div>
            </div>
            <div class="info-box">
                <div class="section-title">Test Center</div>
                <div class="info-value">{{ $rollNumberSlip->test->test_center }}</div>
            </div>
            <div class="info-box">
                <div class="section-title">District</div>
                <div class="info-value">{{ $rollNumberSlip->application->user->district_of_domicile }}</div>
            </div>
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

        <!-- Footer -->
        <div class="footer">
            <p style="margin:4px 0">Computer generated slip - No signature required</p>
            <p style="color:#26a550; font-weight:bold; margin:4px 0">Best of luck!</p>
        </div>
    </div>
</body>

</html>
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
            padding: 20px;
            font-size: 12px;
            line-height: 1.5;

        }

        .container {
            border: 3px solid #1e7e34;
            padding: 20px;
            border-radius: 10px;


            position: relative;
            overflow: hidden;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            opacity: 0.15;
            z-index: -1;
            width: 80%;
            text-align: center;
        }

        .watermark img {
            width: 100%;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #1e7e34;
            padding-bottom: 12px;
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

        .candidate-info {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .profile-image {
            width: 90px;
            height: 90px;
            border: 2px solid #1e7e34;
            border-radius: 6px;
            object-fit: cover;
        }

        .info-box {

            
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .section-title {
            color: #1e7e34;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 8px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
            color: #555;
            border-top: 1px solid #1e7e34;
            padding-top: 8px;
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
                <p>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_date)->format('d M, Y') }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">Test Time</div>
                <p>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_time)->format('h:i A') }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">Test Center</div>
                <p>{{ $rollNumberSlip->test->test_center }}</p>
            </div>
            <div class="info-box">
                <div class="section-title">District</div>
                <p>{{ $rollNumberSlip->application->user->district_of_domicile }}</p>
            </div>
        </div>

        <div class="info-box">
            <div class="section-title">Important Instructions</div>
            <ul>
                <li>Bring original CNIC and this Roll Number Slip.</li>
                <li>Arrive 30 minutes before the test time.</li>
                <li>Bring a blue/black ballpoint pen.</li>
                <li>No electronic devices allowed.</li>
            </ul>
        </div>

        <div class="footer">
            <p>Computer generated slip - No signature required</p>
            <p style="color:#1e7e34; font-weight:bold;">Best of luck!</p>
        </div>
    </div>
</body>
</html>
