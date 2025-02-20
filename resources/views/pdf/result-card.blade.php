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
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg p-4">
                    <div class="widget clearfix widget-archive notificationSection">
                        <div class="heading-text heading-section text-center mb-4">
                            <h4 class="text-blue">Result Details</h4>
                        </div>
                        <hr>

                        <!-- Display Result Details -->
                        @if(isset($result))
                        <div class="mt-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Marks Obtained:</strong> {{ $result->marks_obtained }}</li>
                                <li class="list-group-item"><strong>Total Marks:</strong> {{ $result->total_marks }}</li>
                                <li class="list-group-item"><strong>Percentage:</strong> {{ number_format(($result->marks_obtained / $result->total_marks) * 100, 2) }}%</li>
                                <li class="list-group-item"><strong>Remarks:</strong> {{ $result->remarks }}</li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="{{ route('candidate_result.download', $result->id) }}" class="btn btn-success w-50">Download Result</a>
                            </div>
                        </div>
                        @endif

                        <!-- Display Errors -->
                        @if(session('error'))
                        <div class="alert alert-danger mt-4 text-center">
                            {{ session('error') }}
                        </div>
                        @endif

                        <!-- No Data Found Message -->
                        <div id="no-data-found" class="text-center mt-4" style="display: none;">
                            <p>No result found for the entered CNIC.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
       <div class="footer">
        <p>Thank you for using our system. Best of luck for your test!</p>
    </div>
</body>
</html>
