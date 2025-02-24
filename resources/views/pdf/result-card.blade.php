<!DOCTYPE html>
<html lang="en">

<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Result Card</title>
				<style>
								@page {
												size: A4;
												margin: 1.5cm;
								}

								body {
												font-family: 'DejaVu Sans', sans-serif;
												margin: 0;
												padding: 0;
												background: white;
								}

								.container {
												width: 18cm;
												height: 26cm;
												border: 1.5px solid #1e7e34;
												padding: 10px;
												border-radius: 10px;
												position: relative;
												overflow: hidden;
												display: flex;
												flex-direction: column;
												background: white;
								}

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

								table {
												width: 100%;
												border-collapse: collapse;
												margin-bottom: 10px;
								}

								th,
								td {
												padding: 8px;
												text-align: center;
												font-size: 12px;
												height: 25px;
								}

								.table1 td {
												border: 1px solid #ddd;
								}

								.table1 th {
												border: 1px solid #ddd;
								}

								th {
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

								.footer {
												text-align: center;
												margin-top: auto;
												font-size: 11px;
												color: #555;
												border-top: 1px solid #1e7e34;
												padding-top: 4px;
								}

								@media print {
												body {
																-webkit-print-color-adjust: exact;
																print-color-adjust: exact;
												}

												.container {
																page-break-inside: avoid;
																box-shadow: none;
												}
								}
				</style>
</head>

<body>
				<div class="container">
								<div class="watermark">
												<img src="{{ public_path("frontend/images/logo.png") }}" alt="Watermark">
								</div>

								<div class="header">
												<img src="{{ public_path("frontend/images/logo.png") }}" class="logo" alt="Logo">
												<div class="slip-title">RESULT CARD</div>
								</div>

								<div class="candidate-info">
												<table>
																<tr>
																				<th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name:</strong></th>
																				<th style="text-align: left">{{ $result->application->user->first_name }}
																								{{ $result->application->user->last_name }}</th>
																				<td></td>
																				<th rowspan="3" style="text-align: center;"><img
																												src="{{ public_path("storage/" . ($result->application->user->profile_picture ?? "default.jpg")) }}"
																												class="profile-image" alt="Profile Photo"></th>
																</tr>
																<tr>
																				<th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>CNIC:</strong></th>
																				<th style="text-align: left">{{ $result->application->user->cnic }}</th>
																				<td></td>
																</tr>
																<tr>
																				<th style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Post Applied:</strong></th>
																				<th style="text-align: left">{{ $result->application->jobPost->title }}</th>
																				<td></td>
																</tr>
												</table>
								</div>

								<br>

								<table class="table1" style="margin-top: 16px">
												<tr>
																<th>Total Marks</th>
																<th>Obtained Marks</th>
																<th>Percentage</th>
												</tr>
												<tr>
																<td>{{ $result->total_marks }}</td>
																<td>{{ $result->marks_obtained }}</td>
																<td>{{ number_format(($result->marks_obtained / $result->total_marks) * 100, 2) }}%</td>
												</tr>
												<tr>
																<th colspan="3">Result Status</th>
												</tr>
												<tr>
																<td colspan="3"
																				style="color: {{ ($result->marks_obtained / $result->total_marks) * 100 >= 50 ? "#1e7e34" : "#dc3545" }}; font-weight: bold;">
																				{{ ($result->marks_obtained / $result->total_marks) * 100 >= 50 ? "PASSED" : "NOT PASSED" }}
																</td>
												</tr>
												<tr>
																<th colspan="3">Test Details</th>
												</tr>
												<tr>
																<td colspan="3">{{ optional($result->application->tests)->test_center ?? "N/A" }}</td>
												</tr>
												<tr>
																<th>Organization Name</th>
																<th colspan="2">Test Date</th>
												</tr>
												<tr>
																<td>{{ $result->application->jobPost->organization_name }}</td>
																<td colspan="2">
																				{{ optional($result->application->tests)->test_date ? \Carbon\Carbon::parse($result->application->tests->test_date)->format("d M, Y") : "N/A" }}
																</td>
												</tr>
								</table>

								<br>

								<div class="instructions">
												<div class="section-title">Remarks</div>
												<p style="margin: 10px 0; font-size: 12px;">{{ $result->remarks }}</p>
								</div>

								<div class="footer">
												<br>
												<p class="center">Computer generated result card - No signature required</p>
												<p class="center" style="color:#1e7e34; font-weight:bold;">
																@if (($result->marks_obtained / $result->total_marks) * 100 >= 50)
																				Congratulations on passing the test!
																@else
																				Better luck next time!
																@endif
												</p>
								</div>
				</div>
</body>

</html>
