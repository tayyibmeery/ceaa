@extends("backend.layout.main")

@section("content")
				<!-- Content Header (Page header) -->
				<div class="content-header">
								<div class="container-fluid">
												<div class="row mb-2">
																<div class="col-sm-6">
																				<h1 class="m-0">Dashboard</h1>
																</div>
																<div class="col-sm-6">
																				<ol class="breadcrumb float-sm-right">
																								<li class="breadcrumb-item"><a href="#">Home</a></li>
																								<li class="breadcrumb-item active">Dashboard</li>
																				</ol>
																</div>
												</div>
								</div>
				</div>

				<!-- Main content -->
				<div class="content">
								<div class="container-fluid">
												<!-- Info boxes -->
												<div class="row">
																<div class="col-12 col-sm-6 col-md-3">
																				<div class="info-box">
																								<span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>
																								<div class="info-box-content">
																												<span class="info-box-text">Total Applications</span>
																												<span class="info-box-number">{{ $totalApplications }}</span>
																								</div>
																				</div>
																</div>
																<div class="col-12 col-sm-6 col-md-3">
																				<div class="info-box">
																								<span class="info-box-icon bg-success"><i class="fas fa-briefcase"></i></span>
																								<div class="info-box-content">
																												<span class="info-box-text">Active Jobs</span>
																												<span class="info-box-number">{{ $activeJobs }}</span>
																								</div>
																				</div>
																</div>
																<div class="col-12 col-sm-6 col-md-3">
																				<div class="info-box">
																								<span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
																								<div class="info-box-content">
																												<span class="info-box-text">Total Candidates</span>
																												<span class="info-box-number">{{ $totalCandidates }}</span>
																								</div>
																				</div>
																</div>
																<div class="col-12 col-sm-6 col-md-3">
																				<div class="info-box">
																								<span class="info-box-icon bg-danger"><i class="fas fa-clipboard-list"></i></span>
																								<div class="info-box-content">
																												<span class="info-box-text">Scheduled Tests</span>
																												<span class="info-box-number">{{ $totalTests }}</span>
																								</div>
																				</div>
																</div>
												</div>

												<div class="row">
																<div class="col-lg-6">
																				<!-- Applications Chart -->
																				<div class="card">
																								<div class="card-header border-0">
																												<div class="d-flex justify-content-between">
																																<h3 class="card-title">Monthly Applications</h3>
																												</div>
																								</div>
																								<div class="card-body">
																												<div class="position-relative mb-4">
																																<canvas id="applications-chart" height="200"></canvas>
																												</div>
																								</div>
																				</div>

																				<!-- Recent Applications -->
																				<div class="card">
																								<div class="card-header border-0">
																												<h3 class="card-title">Recent Applications</h3>
																								</div>
																								<div class="card-body table-responsive p-0">
																												<table class="table-striped table-valign-middle table">
																																<thead>
																																				<tr>
																																								<th>Candidate</th>
																																								<th>Job Title</th>
																																								<th>Status</th>
																																								<th>Date</th>
																																				</tr>
																																</thead>
																																<tbody>
																																				@foreach ($recentApplications as $application)
																																								<tr>
																																												<td>{{ $application->user->full_name }}</td>
																																												<td>{{ $application->jobPost->title }}</td>
																																												<td>
																																																<span
																																																				class="badge badge-{{ $application->status === "approved" ? "success" : ($application->status === "pending" ? "warning" : "danger") }}">
																																																				{{ ucfirst($application->status) }}
																																																</span>
																																												</td>
																																												<td>{{ $application->created_at->format("M d, Y") }}</td>
																																								</tr>
																																				@endforeach
																																</tbody>
																												</table>
																								</div>
																				</div>
																</div>

																<div class="col-lg-6">
																				<!-- Application Status -->
																				<div class="card">
																								<div class="card-header border-0">
																												<h3 class="card-title">Application Status Overview</h3>
																								</div>
																								<div class="card-body">
																												@foreach ($applicationStats as $stat)
																																<div class="progress-group">
																																				{{ ucfirst($stat->status) }}
																																				<span class="float-right">{{ $stat->count }}</span>
																																				<div class="progress progress-sm">
																																								<div class="progress-bar bg-{{ $stat->status === "approved" ? "success" : ($stat->status === "pending" ? "warning" : "danger") }}"
																																												style="width: {{ ($stat->count / $totalApplications) * 100 }}%">
																																								</div>
																																				</div>
																																</div>
																												@endforeach
																								</div>
																				</div>

																				<!-- Upcoming Tests -->
																				<div class="card">
																								<div class="card-header border-0">
																												<h3 class="card-title">Upcoming Tests</h3>
																								</div>
																								<div class="card-body">
																												@foreach ($upcomingTests as $test)
																																<div class="info-box bg-light">
																																				<div class="info-box-content">
																																								<span class="info-box-text">{{ $test->jobPost->title }}</span>
																																								<span class="info-box-number">
																																												Date: {{ \Carbon\Carbon::parse($test->test_date)->format("M d, Y") }}
																																								</span>
																																								<span class="info-box-text">
																																												Time: {{ $test->test_time }}
																																								</span>
																																								<span class="info-box-text">
																																												Center: {{ $test->test_center }}
																																								</span>
																																				</div>
																																</div>
																												@endforeach
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</div>
@endsection

@push("scripts")
				<script>
								// Applications Chart
								var ctx = document.getElementById('applications-chart').getContext('2d');
								var monthlyData = @json($monthlyApplications);

								var labels = monthlyData.map(item => {
												return new Date(2024, item.month - 1).toLocaleString('default', {
																month: 'short'
												});
								});
								var data = monthlyData.map(item => item.count);

								new Chart(ctx, {
												type: 'line',
												data: {
																labels: labels,
																datasets: [{
																				label: 'Applications',
																				data: data,
																				borderColor: '#007bff',
																				tension: 0.1,
																				fill: false
																}]
												},
												options: {
																responsive: true,
																scales: {
																				y: {
																								beginAtZero: true
																				}
																}
												}
								});
				</script>
@endpush
