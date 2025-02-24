<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll Number Slip</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm;
            /* Ensuring correct margin for printing */
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: white;
            /* Ensures proper background */
        }

        .container {
            width: 18cm;
            /* Slightly smaller than A4 width */
            height: 26cm;
            /* Ensures proper fitting */
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
            width: 100px;
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

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            /* border: 1px solid #ddd; */
            padding: 8px;
            text-align: center;
            font-size: 12px;
            height: 25px;
        }

        .table1  td {
            border: 1px solid #ddd;
        }
         .table1  th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #f2f2f2; */
            color: #1e7e34;
            font-weight: bold;
        }

        .section-title {
            color: #1e7e34;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .center {
            text-align: center;
        }

        /* Instructions Section */
        .instructions {
            /* border: 1px solid #ddd; */
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .instructions ul {
            padding-left: 20px;
            margin: 0;
        }

        .instructions li {
            margin-bottom: 5px;
            font-size: 12px;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: auto;
            /* Push footer to bottom */
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
                /* border: 1px solid black; */
                /* Ensures clear printed border */
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
            <table>
                <tr>
                    <th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name:</strong></th>
                    <th style="text-align: left">{{ $rollNumberSlip->application->user->first_name }} {{ $rollNumberSlip->application->user->last_name }}</th>
                    <td></td>
                    <th rowspan="3" style="text-align: center;">

                        @php
    // Get the image path
    $imagePath = $result->application->user->profile_picture ?? 'default.jpg';
    $fullPath = public_path($imagePath);

    // Check if the image exists
    if (file_exists($fullPath)) {
        // Get the image MIME type
        $mimeType = mime_content_type($fullPath); // e.g., image/jpeg or image/png

        // Encode the image to Base64
        $imageData = base64_encode(file_get_contents($fullPath));

        // Generate the Base64 image source
        $imageSrc = 'data:' . $mimeType . ';base64,' . $imageData;
    } else {
        // Fallback to default image
        $imageSrc = asset('default.jpg');
    }
@endphp
                        <img src="{{$imageSrc }}" class="profile-image" alt="Profile Photo"></th>
                </tr>
                <tr>
                    <th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CNIC:</strong></th>
                    <th style="text-align: left">{{ $rollNumberSlip->application->user->cnic }}</th>
                    <td></td>
                </tr>
                <tr>
                    <th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Roll Number:</strong></th>
                    <th style="text-align: left">{{ $rollNumberSlip->roll_number }}</th>
                    <td></td>

                </tr>
            </table>




       
    <br>


        <table class="table1" style="margin-top: 16px">

            <tr>
                <th>Test Date</th>
                <th>Test Time</th>

            </tr>
            <tr>
                <td>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_date)->format('d M, Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($rollNumberSlip->test->test_time)->format('h:i A') }}</td>

            </tr>
            <tr>
                <th colspan="2">Test Center</th>

            </tr>
            <tr>

                <td colspan="2">{{ $rollNumberSlip->test->test_center }}</td>

            </tr>
            <tr>
                <th>Organization Name</th>
                <th>Job Post</th>
                {{-- <th>District</th> --}}
            </tr>
            <tr>
                <td>{{ $rollNumberSlip->application->jobPost->organization_name }}</td>
                <td>{{ $rollNumberSlip->application->jobPost->title }}</td>
                {{-- <td>{{ $rollNumberSlip->application->user->district_of_domicile }}</td> --}}
            </tr>
        </table>
<br>


        <div class="instructions">
            <div class="section-title">Important Instructions</div>
            <ul>
                <li>Bring original CNIC and this Roll Number Slip.</li>
                <li>Arrive 30 minutes before the test time.</li>
                <li>Bring a blue/black ballpoint pen.</li>
                <li>No electronic devices allowed.</li>
            </ul>

            <br>
        </div>

        <div class="footer">
            <br>
            <p class="center">Computer generated slip - No signature required</p>

            <p class="center" style="color:#1e7e34; font-weight:bold;">Best of luck!</p>
        </div>

    </div>

</body>
</html>
