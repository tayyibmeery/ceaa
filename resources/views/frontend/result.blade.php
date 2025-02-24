@extends("frontend.layout.main")

@section("title", "Result Details")

@section("content")
				<section class="bg-light py-5">
								<div class="container">
												<!-- Page Header -->
												<div class="mb-4 text-center">
																<h2 class="fw-bold">Result Details</h2>
												</div>

												<div class="row justify-content-center">
																<div class="col-lg-10">
																				<!-- Alert Messages -->
																				@if (session("error"))
																								<div class="alert alert-danger alert-dismissible fade show mb-4">
																												<i class="fas fa-exclamation-circle me-2"></i>{{ session("error") }}
																												<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
																								</div>
																				@endif

																				<!-- Result Cards -->
																				@if ($results->count() > 0)
																								@foreach ($results as $result)
																												<div class="card rounded-3 mb-4 border-0 shadow-sm">
																																<div
																																				class="card-header bg-success d-flex justify-content-between align-items-center py-3 text-white">
																																				<div class="d-flex align-items-center">
																																								<button class="btn btn-link text-decoration-none me-2 p-0 text-white"
																																												data-bs-toggle="collapse" data-bs-target="#resultContent{{ $result->id }}"
																																												aria-expanded="true">
																																												<i class="fas fa-minus collapse-icon"></i>
																																								</button>
																																								<h5 class="card-title mb-0">Result Card</h5>
																																				</div>
																																				<span class="badge text-success bg-white">
																																								<i class="fas fa-check-circle me-1"></i>Result Available
																																				</span>
																																</div>

																																<div class="show collapse" id="resultContent{{ $result->id }}">
																																				<div class="card-body p-4">
																																								<!-- Job Title -->
																																								<div class="mb-4 text-center">
																																												<h4 class="mb-1">{{ $result->application->jobPost->title }}</h4>
																																												<p class="text-muted mb-0">Test Result Card</p>
																																								</div>

																																								<!-- Candidate Details -->
																																								<div class="mb-4 rounded border p-3">
																																												<h6 class="text-success mb-3">Candidate Details</h6>
																																												<div class="row">
																																																<div class="col-md-6">
																																																				<table class="table-sm mb-0 table">
																																																								<tr>
																																																												<th width="40%">Name:</th>
																																																												<td>{{ $result->application->user->first_name . " " . $result->application->user->last_name }}
																																																												</td>
																																																								</tr>
																																																								<tr>
																																																												<th>CNIC:</th>
																																																												<td>{{ $result->application->user->cnic }}</td>
																																																								</tr>
																																																								<tr>
																																																												<th>Father's Name:</th>
																																																												<td>{{ $result->application->user->father_name }}</td>
																																																								</tr>
																																																				</table>
																																																</div>
																																																<div class="col-md-6">
																																																				<table class="table-sm mb-0 table">
																																																								<tr>
																																																												<th width="40%">Test Date:</th>
																																																												<td>{{ optional($result->application->tests)->test_date ? \Carbon\Carbon::parse($result->application->tests->test_date)->format("d M, Y") : "N/A" }}
																																																												</td>
																																																								</tr>
																																																								<tr>
																																																												<th>Test Center:</th>
																																																												<td>{{ optional($result->application->tests)->test_center ?? "N/A" }}
																																																												</td>
																																																								</tr>
																																																								<tr>
																																																												<th>Organization:</th>
																																																												<td>{{ $result->application->jobPost->organization_name }}</td>
																																																								</tr>
																																																				</table>
																																																</div>
																																												</div>
																																								</div>

																																								<!-- Result Details -->
																																								<div class="row g-4 mb-4">
																																												<div class="col-sm-6">
																																																<div class="rounded border p-3">
																																																				<h6 class="text-success mb-3">Marks Details</h6>
																																																				<table class="table-sm mb-0 table">
																																																								<tr>
																																																												<th class="text-muted fw-medium" width="40%">Total Marks:
																																																												</th>
																																																												<td class="fw-bold">{{ $result->total_marks }}</td>
																																																								</tr>
																																																								<tr>
																																																												<th>Obtained Marks:</th>
																																																												<td>{{ $result->marks_obtained }}</td>
																																																								</tr>
																																																								<tr>
																																																												<th>Percentage:</th>
																																																												<td>{{ number_format(($result->marks_obtained / $result->total_marks) * 100, 2) }}%
																																																												</td>
																																																								</tr>
																																																				</table>
																																																</div>
																																												</div>
																																												<div class="col-sm-6">
																																																<div class="rounded border p-3">
																																																				<h6 class="text-success mb-3">Result Status</h6>
																																																				<div class="text-center">
																																																								@if (($result->marks_obtained / $result->total_marks) * 100 >= 50)
																																																												<h4 class="text-success mb-2">PASSED</h4>
																																																												<p class="mb-0">Congratulations on passing the test!</p>
																																																								@else
																																																												<h4 class="text-danger mb-2">NOT PASSED</h4>
																																																												<p class="mb-0">Better luck next time!</p>
																																																								@endif
																																																				</div>
																																																</div>
																																												</div>
																																								</div>

																																								<!-- Remarks -->
																																								<div class="rounded border p-3">
																																												<h6 class="text-success mb-3">Remarks</h6>
																																												<p class="mb-0">{{ $result->remarks }}</p>
																																								</div>

																																								<!-- Download Button -->
																																								<div class="mt-4 text-center">
																																												<a href="{{ route("candidate_result.download", $result->id) }}"
																																																class="btn btn-success px-4">
																																																<i class="fas fa-download me-2"></i>Download Result Card
																																												</a>
																																								</div>
																																				</div>
																																</div>
																												</div>
																								@endforeach
																				@else
																								<div class="alert alert-info">
																												<i class="fas fa-info-circle me-2"></i>
																												No results found.
																								</div>
																				@endif
																</div>
												</div>
								</div>
				</section>
@endsection

@push("styles")
				<style>
								.table th {
												background-color: #f8f9fa;
								}

								.card-header {
												border-bottom: 0;
								}

								.border {
												border-color: #dee2e6 !important;
								}
				</style>
@endpush

@push("scripts")
				<script>
								document.addEventListener('DOMContentLoaded', function() {
												// Handle collapse icon change
												const collapseButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');

												collapseButtons.forEach(button => {
																button.addEventListener('click', function() {
																				const icon = this.querySelector('.collapse-icon');
																				if (icon.classList.contains('fa-minus')) {
																								icon.classList.replace('fa-minus', 'fa-plus');
																				} else {
																								icon.classList.replace('fa-plus', 'fa-minus');
																				}
																});

																// Also handle when collapse is triggered by other means
																const targetId = button.getAttribute('data-bs-target');
																const collapseElement = document.querySelector(targetId);

																collapseElement.addEventListener('hidden.bs.collapse', function() {
																				button.querySelector('.collapse-icon').classList.replace('fa-minus', 'fa-plus');
																});

																collapseElement.addEventListener('shown.bs.collapse', function() {
																				button.querySelector('.collapse-icon').classList.replace('fa-plus', 'fa-minus');
																});
												});
								});
				</script>
@endpush
