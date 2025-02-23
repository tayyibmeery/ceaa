@extends("frontend.layout.main")

@section("title", "My Profile")

@section("content")

				<section class="bg-light">
								<div class="container py-5">
												<!-- Success Message -->
												@if (session("success"))
																<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
																				<div class="d-flex align-items-center">
																								<i class="fas fa-check-circle me-2"></i>
																								<strong>Success!</strong>
																								<span class="ms-2">{{ session("success") }}</span>
																				</div>
																				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
												@endif

												<!-- Error Message -->
												@if (session("error"))
																<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
																				<div class="d-flex align-items-center">
																								<i class="fas fa-exclamation-circle me-2"></i>
																								<strong>Error!</strong>
																								<span class="ms-2">{{ session("error") }}</span>
																				</div>
																				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>
												@endif

												<!-- Profile Header -->
												<div class="mb-4 rounded bg-white p-4 shadow-sm">
																<div class="row align-items-center">
																				<div class="col-md-6">
																								<h2 class="mb-0">My Profile</h2>
																								<p class="text-muted">Manage your personal information and applications</p>
																				</div>
																				<div class="col-md-6">
																								<div class="d-flex justify-content-md-end justify-content-center gap-2">
																												<a href="{{ route("profile.edit") }}" class="btn btn-success shadow-sm">
																																<i class="fas fa-edit me-1"></i>Edit Profile
																												</a>
																												<a href="{{ route("projects.index") }}" class="btn btn-outline-success shadow-sm">
																																<i class="fas fa-arrow-left me-1"></i>Back to Jobs
																												</a>
																								</div>
																				</div>
																</div>
																<hr class="my-4">

																<!-- Profile Overview -->
																<div class="mb-5 text-center">
																				<div class="position-relative d-inline-block mb-3">
																								<img src="{{ asset("storage/" . (auth()->user()->profile_picture ?? "default-profile.jpg")) }}"
																												alt="Profile Picture" class="rounded-circle border-3 border-success border shadow"
																												style="width: 150px; height: 150px; object-fit: cover;">
																				</div>
																				<h3 class="mb-1">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</h3>
																				<p class="text-muted mb-0">{{ auth()->user()->email }}</p>
																</div>

																<div class="row g-4">
																				<!-- News Alerts Card -->
																				<div class="col-lg-4 py-5">
																								<div class="card mb-1">
																												<div
																																class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
																																<h6 class="mb-0">Latest Updates</h6>
																												</div>
																												<div class="card-body p-0">
																																<div class="list-group list-group-flush">
																																				@foreach ($posts as $post)
																																								<div class="list-group-item text-center">
																																												<div class="d-flex flex-column">
																																																<h6 class="mb-2">{{ $post->title }}</h6>
																																																<div class="d-flex justify-content-center gap-2">
																																																				<a href="{{ asset("storage/" . $post->advertisement_file) }}"
																																																								class="btn btn-info btn-sm me-2">
																																																								Download
																																																				</a>
																																																				<a href="{{ route("postsjob.show", $post->id) }}"
																																																								class="btn btn-success btn-sm">
																																																								Apply Now
																																																				</a>
																																																</div>
																																																<small class="text-muted d-block mt-2 text-center">
																																																				Posted:
																																																				{{ \Carbon\Carbon::parse($post->created_at)->format("M/Y h:i A") }}
																																																</small>
																																												</div>
																																								</div>
																																				@endforeach
																																</div>
																												</div>
																								</div>

																								<!-- Applications Summary Card -->
																								<div class="card mb-1">
																												<div
																																class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
																																<h6 class="mb-0">Application Details</h6>
																												</div>
																												<div class="card-body">
																																<table class="table-sm table text-center align-middle">
																																				<thead>
																																								<tr>
																																												<th>Position</th>
																																												<th>Application Info</th>
																																								</tr>
																																				</thead>
																																				<tbody>
																																								@forelse(auth()->user()->applications as $application)
																																												<tr>
																																																<td class="text-start">
																																																				<strong>{{ $application->jobPost->title }}</strong>
																																																				<br>
																																																				<small
																																																								class="text-muted">{{ $application->jobPost->organization_name }}</small>
																																																</td>
																																																<td>
																																																				<!-- Status Badge -->
																																																				<span
																																																								class="badge {{ $application->status === "pending" ? "badge-warning" : "badge-success" }}">
																																																								{{ ucfirst($application->status) }}
																																																				</span>
																																																				<br>
																																																				<!-- Application Details -->
																																																				<div class="mt-2">
																																																								<small class="d-block">
																																																												<strong>Applied:</strong>
																																																												{{ \Carbon\Carbon::parse($application->submission_date)->format("d M Y") }}
																																																								</small>
																																																								<small class="d-block">
																																																												<strong>Qualification:</strong>
																																																												{{ $application->highest_qualification }}
																																																								</small>
																																																								<small class="d-block">
																																																												<strong>Experience:</strong>
																																																												{{ $application->experience_years }}
																																																												years
																																																								</small>
																																																								@if ($application->payment_status)
																																																												<small class="d-block">
																																																																<strong>Payment:</strong>
																																																																<span
																																																																				class="badge {{ $application->payment_status === "paid" ? "badge-success" : "badge-warning" }}">
																																																																				{{ ucfirst($application->payment_status) }}
																																																																</span>
																																																												</small>
																																																								@endif
																																																								@if ($application->reviewer_remarks)
																																																												<small class="d-block text-muted">
																																																																<strong>Remarks:</strong>
																																																																{{ $application->reviewer_remarks }}
																																																												</small>
																																																								@endif
																																																				</div>
																																																				<!-- Document Links -->
																																																				<div class="mt-2">
																																																								@if ($application->resume)
																																																												<a href="{{ asset("storage/" . $application->resume) }}"
																																																																class="btn btn-sm btn-outline-secondary me-1">
																																																																Resume
																																																												</a>
																																																								@endif
																																																								@if ($application->cover_letter)
																																																												<a href="{{ asset("storage/" . $application->cover_letter) }}"
																																																																class="btn btn-sm btn-outline-secondary me-1">
																																																																Cover Letter
																																																												</a>
																																																								@endif
																																																								@if ($application->fees_receipt)
																																																												<a href="{{ asset("storage/" . $application->fees_receipt) }}"
																																																																class="btn btn-sm btn-outline-secondary">
																																																																Receipt
																																																												</a>
																																																								@endif
																																																				</div>
																																																</td>
																																												</tr>
																																								@empty
																																												<tr>
																																																<td colspan="2" class="text-center">No applications found</td>
																																												</tr>
																																								@endforelse
																																				</tbody>
																																</table>
																												</div>
																								</div>

																								<!-- Tests Card -->
																								<div class="card mb-1">
																												<div
																																class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
																																<h6 class="mb-0">Test Information</h6>
																												</div>
																												<div class="card-body">
																																<table class="table-sm table text-center align-middle">
																																				<thead>
																																								<tr>
																																												<th>Job Title</th>
																																												<th>Test Information</th>
																																								</tr>
																																				</thead>
																																				<tbody>
																																								@forelse(auth()->user()->applications as $application)
																																												@if ($application->test)
																																																<tr>
																																																				<td>{{ $application->jobPost->title }}</td>
																																																				<td>
																																																								<div class="mb-2">
																																																												<strong class="d-block">Roll Number:
																																																																{{ $application->test->roll_number }}</strong>
																																																												<small class="d-block">Serial:
																																																																{{ $application->test->serial_number }}</small>
																																																								</div>
																																																								<div class="mb-2">
																																																												<strong>Test Date:</strong>
																																																												{{ $application->test->test->test_date }}<br>
																																																												<strong>Time:</strong>
																																																												{{ $application->test->test->test_time }}<br>
																																																												<strong>Center:</strong>
																																																												{{ $application->test->test->test_center }}
																																																								</div>
																																																				</td>
																																																</tr>
																																												@endif
																																								@empty
																																												<tr>
																																																<td colspan="2" class="text-center">No test schedules available</td>
																																												</tr>
																																								@endforelse
																																				</tbody>
																																</table>
																												</div>
																								</div>

																								<!-- Results Card -->
																								<div class="card mb-1">
																												<div
																																class="card-header bg-success d-flex align-items-center justify-content-center py-2 text-center text-white">
																																<h6 class="mb-0">Results & Remarks</h6>
																												</div>
																												<div class="card-body">
																																<table class="table-sm table text-center align-middle">
																																				<thead>
																																								<tr>
																																												<th>Job Title</th>
																																												<th>Score & Remarks</th>
																																								</tr>
																																				</thead>
																																				<tbody>
																																								@forelse(auth()->user()->applications as $application)
																																												@if ($application->result)
																																																<tr>
																																																				<td>{{ $application->jobPost->title }}</td>
																																																				<td>
																																																								<span
																																																												class="badge {{ $application->result->marks_obtained >= $application->result->total_marks / 2 ? "badge-success" : "badge-danger" }}">
																																																												Score:
																																																												{{ $application->result->marks_obtained }}/{{ $application->result->total_marks }}
																																																								</span>
																																																								<br>
																																																								<small class="text-muted">
																																																												<strong>Remarks:</strong>
																																																												{{ $application->result->remarks ?? "No remarks" }}
																																																								</small>
																																																				</td>
																																																</tr>
																																												@endif
																																								@empty
																																												<tr>
																																																<td colspan="2" class="text-center">No results available</td>
																																												</tr>
																																								@endforelse
																																				</tbody>
																																</table>
																												</div>
																								</div>
																				</div>

																				<!-- Main Profile Content -->
																				<div class="col-lg-8 py-5">
																								{{-- <div class="page-title mb-1 text-center">
                    <h1>Profile  Information</h1>

                </div> --}}
																								<div class="card mb-4">
																												<div
																																class="card-header bg-success d-flex align-items-center justify-content-center py-3 text-center text-white">
																																<h5 class="mb-0">Profile Information</h5>
																												</div>
																												<div class="card-body">
																																<!-- Profile Info Section -->
																																<div class="mb-4 text-center">
																																				<div class="mb-3">
																																								<img src="{{ asset("storage/" . (auth()->user()->profile_picture ?? "default-profile.jpg")) }}"
																																												alt="avatar" class="rounded-circle border border-2" width="150"
																																												height="150">
																																				</div>
																																				<h4 class="mb-1">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}
																																				</h4>
																																				<p class="text-muted mb-0">{{ auth()->user()->email }}</p>
																																</div>

																																<!-- Personal Information -->
																																<div class="row g-1">
																																				<!-- Basic Info -->
																																				<div class="col-md-12">
																																								<div class="card h-50 bg-light border-0">
																																												<div class="card-body">
																																																<h5 class="card-title mb-3 text-center">Basic Information</h5>
																																																<div class="row">
																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Father's Name</label>
																																																												<p class="fw-bold mb-1">
																																																																{{ auth()->user()->father_name ?? "N/A" }}</p>
																																																								</div>
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">CNIC</label>
																																																												<p class="fw-bold mb-1">{{ auth()->user()->cnic ?? "N/A" }}
																																																												</p>
																																																								</div>
																																																				</div>

																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Date of Birth</label>
																																																												<p class="fw-bold mb-1">
																																																																{{ auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format("d M Y") : "N/A" }}
																																																												</p>
																																																								</div>
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Gender</label>
																																																												<p class="fw-bold mb-1">
																																																																{{ ucfirst(auth()->user()->gender ?? "N/A") }}</p>
																																																								</div>
																																																				</div>
																																																</div>
																																												</div>
																																								</div>
																																				</div>

																																				<!-- Contact Info -->
																																				<div class="col-md-12">
																																								<div class="card h-50 bg-light border-0">
																																												<div class="card-body">
																																																<h5 class="card-title mb-3 text-center">Contact Information</h5>
																																																<div class="row">
																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Phone Number</label>
																																																												<p class="fw-bold mb-1">{{ auth()->user()->phone ?? "N/A" }}
																																																												</p>
																																																								</div>
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Email Address</label>
																																																												<p class="mb-1">{{ auth()->user()->email ?? "N/A" }}</p>
																																																								</div>
																																																				</div>
																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Address</label>
																																																												<p class="mb-1">{{ auth()->user()->address ?? "N/A" }}</p>
																																																								</div>
																																																				</div>
																																																</div>
																																												</div>
																																								</div>
																																				</div>

																																				<!-- Location Info -->
																																				<div class="col-12">
																																								<div class="card bg-light border-0">
																																												<div class="card-body">
																																																<h5 class="card-title mb-3 text-center">Location Details</h5>
																																																<div class="row">
																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Province of Domicile</label>
																																																												<p class="mb-1">
																																																																{{ auth()->user()->province_of_domicile ?? "N/A" }}</p>
																																																								</div>
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">District of Domicile</label>
																																																												<p class="mb-1">
																																																																{{ auth()->user()->district_of_domicile ?? "N/A" }}</p>
																																																								</div>
																																																				</div>
																																																				<div class="col-md-6">
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Postal City</label>
																																																												<p class="mb-1">{{ auth()->user()->postal_city ?? "N/A" }}
																																																												</p>
																																																								</div>
																																																								<div class="mb-2 text-center">
																																																												<label class="text-muted small">Postal Address</label>
																																																												<p class="mb-1">
																																																																{{ auth()->user()->postal_address ?? "N/A" }}</p>
																																																								</div>
																																																				</div>
																																																</div>
																																												</div>
																																								</div>
																																				</div>

																																				<!-- Qualifications Summary -->
																																				<div class="col-md-12">
																																								<div class="card h-50 bg-light border-0">
																																												<div class="card-body">
																																																<h5 class="card-title mb-3 text-center">Qualifications Summary</h5>
																																																<div class="row">
																																																				@forelse(auth()->user()->applications as $application)
																																																								<div class="col-md-6">
																																																												<div class="mb-2">
																																																																<label class="text-muted small">Position Applied</label>
																																																																<p class="fw-bold mb-1">{{ $application->jobPost->title }}
																																																																</p>
																																																												</div>
																																																												<div class="mb-2">
																																																																<label class="text-muted small">Highest
																																																																				Qualification</label>
																																																																<p class="mb-1">
																																																																				{{ $application->highest_qualification }}</p>
																																																												</div>
																																																								</div>
																																																								<div class="col-md-6">
																																																												<div class="mb-2">
																																																																<label class="text-muted small">Experience</label>
																																																																<p class="mb-1">{{ $application->experience_years }}
																																																																				years</p>
																																																												</div>
																																																								</div>
																																																				@empty
																																																								<p class="text-muted text-center">No applications submitted yet.
																																																								</p>
																																																				@endforelse
																																																</div>
																																												</div>
																																								</div>
																																				</div>

																																				<!-- Education Details -->
																																				<div class="col-md-12">
																																								<div class="card bg-light border-0">
																																												<div class="card-body">
																																																<h5 class="card-title mb-3 text-center">Education Details</h5>
																																																<div class="table-responsive">
																																																				<table class="table-hover table align-middle">
																																																								<thead>
																																																												<tr class="text-center">
																																																																<th>Degree/Certificate</th>
																																																																<th>Institute</th>
																																																																<th>Board/University</th>
																																																																<th>Year</th>
																																																																<th>Grade/CGPA</th>
																																																												</tr>
																																																								</thead>
																																																								<tbody>
																																																												@forelse(auth()->user()->educations as $education)
																																																																<tr class="text-center">
																																																																				<td>{{ $education->degree_title }}</td>
																																																																				<td>{{ $education->institute }}</td>
																																																																				<td>{{ $education->board_university }}</td>
																																																																				<td>{{ $education->passing_year }}</td>
																																																																				<td>
																																																																								<span class="badge bg-success rounded-pill">
																																																																												{{ $education->grade_cgpa }}
																																																																								</span>
																																																																				</td>
																																																																</tr>
																																																												@empty
																																																																<tr>
																																																																				<td colspan="5" class="text-muted text-center">
																																																																								No education details available
																																																																				</td>
																																																																</tr>
																																																												@endforelse
																																																								</tbody>
																																																				</table>
																																																</div>
																																												</div>
																																								</div>
																																				</div>
																																</div>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
								</div>
				</section>

@endsection

@push("scripts")
@endpush
