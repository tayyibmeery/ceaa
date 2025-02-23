@extends("frontend.layout.main")

@section("title", "My Profile")

@section("content")

<section class="bg-white">
    <div class="container py-5">
        <!-- Profile Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-title">
                    <h1>My Profile</h1>
                    <span>Manage your account information and view applications</span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-4">
                <!-- News Alerts Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Latest Updates</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($posts as $post)
                            <div class="list-group-item">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-2">{{ $post->title }}</h6>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ asset("storage/" . $post->advertisement_file) }}" class="btn btn-info btn-sm me-2">
                                            Download
                                        </a>
                                        <a href="{{ route("postsjob.show", $post->id) }}" class="btn btn-success btn-sm">
                                            Apply Now
                                        </a>
                                    </div>

                                    <small class="text-muted mt-2">
                                        Posted: {{ \Carbon\Carbon::parse($post->created_at)->format("M/Y h:i A") }}
                                    </small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Applications Summary Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Applications Summary</h5>
                    </div>
                    <div class="card-body">
                        <!-- Applications Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(auth()->user()->applications as $application)
                                <tr>
                                    <td>{{ $application->jobPost->title }}</td>
                                    <td>
                                        <span class="badge {{ $application->status === "pending" ? "badge-warning" : "badge-success" }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
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

                <!-- Results Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Test Results</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(auth()->user()->applications as $application)
                                @if ($application->result)
                                <tr>
                                    <td>{{ $application->jobPost->title }}</td>
                                    <td>
                                        <strong>{{ $application->result->marks_obtained }}/{{ $application->result->total_marks }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $application->result->remarks ?? "No remarks" }}</small>
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
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Profile Info Section: Name, Gender, Profile Picture -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">First Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->first_name ?? "N/A" }}</p>
                                <p class="mb-0">Last Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->last_name ?? "N/A" }}</p>

                            </div>

                            <div class="col-sm-6 d-flex justify-content-end align-items-start">
                                <img src="{{ asset("storage/" . (auth()->user()->profile_picture ?? "default-profile.jpg")) }}" alt="avatar" class="img-fluid rounded border" style="width: 100px; height: 100px;">
                            </div>
                        </div>

                        <hr>
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Father Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->father_name ?? "N/A" }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Gender</p>
                                <p class="text-muted mb-0">{{ auth()->user()->gender ?? "N/A" }}</p>
                            </div>
                        </div>
                        <hr>
                        <!-- Contact Info Section: Email, Phone -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Email</p>
                                <p class="text-muted mb-0">{{ auth()->user()->email ?? "N/A" }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Phone</p>
                                <p class="text-muted mb-0">{{ auth()->user()->phone ?? "N/A" }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Personal Info Section: Full Name, CNIC, Date of Birth -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Full Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->name ?? "N/A" }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">CNIC</p>
                                <p class="text-muted mb-0">{{ auth()->user()->cnic ?? "N/A" }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Date of Birth</p>
                                <p class="text-muted mb-0">
                                    {{ auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format("d M Y") : "N/A" }}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <!-- Address Info Section: Address, Province, District, Postal Details -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Address</p>
                                <p class="text-muted mb-0">{{ auth()->user()->address ?? "N/A" }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Province of Domicile</p>
                                <p class="text-muted mb-0">{{ auth()->user()->province_of_domicile ?? "N/A" }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">District of Domicile</p>
                                <p class="text-muted mb-0">{{ auth()->user()->district_of_domicile ?? "N/A" }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Postal City</p>
                                <p class="text-muted mb-0">{{ auth()->user()->postal_city ?? "N/A" }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Postal Address</p>
                                <p class="text-muted mb-0">{{ auth()->user()->postal_address ?? "N/A" }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Applications -->
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Applications</p>
                            </div>
                            <div class="col-sm-9">
                                <ul class="text-muted mb-0">
                                    @if (auth()->user()->applications->isNotEmpty())
                                    @foreach (auth()->user()->applications as $application)
                                    <li>
                                        <strong>{{ $application->jobPost->title }}</strong> - Status:
                                        {{ ucfirst($application->status) }} <br>
                                        Applied on:
                                        {{ \Carbon\Carbon::parse($application->submission_date)->format("d M Y") }}
                                    </li>
                                    @endforeach
                                    @else
                                    <li>No applications found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <hr>

                        <!-- Tests -->
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Tests</p>
                            </div>
                            <div class="col-sm-9">
                                <ul class="text-muted mb-0">
                                    @if (!empty(auth()->user()->applications))
                                    @foreach (auth()->user()->applications as $application)
                                    @if ($application->tests)
                                    {{-- @foreach ($application->tests as $test) --}}
                                    <li>
                                        <strong>{{ $application->jobPost->title }}</strong> - Test Date:
                                        {{ $application->tests->test_date }}<br>
                                        Center: {{ $application->tests->test_center }} | Time:
                                        {{ $application->tests->test_time }}
                                    </li>
                                    {{-- @endforeach --}}
                                    @else
                                    <li>No tests scheduled for this application.</li>
                                    @endif
                                    @endforeach
                                    @else
                                    <li>No applications found.</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <hr>

                        <!-- Results -->
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Results</p>
                            </div>
                            <div class="col-sm-9">
                                <ul class="text-muted mb-0">
                                    @if (!empty(auth()->user()->applications))
                                    @foreach (auth()->user()->applications as $application)
                                    {{-- @if ($application->results->isNotEmpty())
                                    @foreach ($application->results as $result)
                                    <li>
                                        <strong>Marks Obtained: {{ $result->marks_obtained }}</strong> / {{ $result->total_marks }} <br>
                                    Remarks: {{ $result->remarks ?? 'N/A' }}
                                    </li>
                                    @endforeach
                                    @else
                                    <li>No results found for this application.</li>
                                    @endif --}}
                                    @endforeach
                                    @else
                                    <li>No applications found.</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <hr>

                        <!-- Edit Profile Button -->
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{ route("profile.edit") }}" class="btn btn-warning m-r-20">Edit Profile</a>

                            <a href="{{ route("projects.index") }}" class="btn btn-success">Back to Apply Post</a>
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
