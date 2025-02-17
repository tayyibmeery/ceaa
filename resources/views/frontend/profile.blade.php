@extends('frontend.layout.main')

@section('title', 'Apply for Job: ')

@section('content')

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="widget clearfix widget-archive notificationSection" style="list-style: none; font-size: 12px">
                        <div class="widget-title text-center">
                            <h4 class="btn btn-rounded btn-danger" style="width: 100%">News Alerts</h4>
                        </div>
                        <marquee direction="up" scrollamount="2" height="300px" onmouseover="this.stop()" onmouseout="this.start()">
                            <div class="notificationsView">
                            </div>

                            @foreach ($posts as $post )
                            <li class="notification-box blink dynamic" style="border-bottom: 1px solid; font-size: 12px !important;">
                                <div class="row" class="align-items-center">
                                    <!-- Job Title Centered -->
                                    <div class="col-12 text-center">
                                        <strong class="text-info">Job Title: {{$post->title}}</strong>
                                    </div>

                                    <!-- Buttons (Download & Apply Now) aligned to the right -->
                                    <div class="col-12 text-end">
                                        <a href="{{ asset('storage/' . $post->advertisement_file) }}" class="btn btn-success btn-sm blink dynamic">
                                            Download - {{ \Carbon\Carbon::parse($post->advertisement_date)->format('M/Y') }}
                                        </a>
                                        <br>
                                        <a href="{{ route('postsjob.show', $post->id) }}" class="btn btn-warning btn-sm dynamic" style="margin-right: 2px;">
                                            Apply Now
                                        </a>
                                    </div>

                                    <!-- Timestamp centered -->
                                    <div class="col-12 text-center">
                                        <small class="badge text-info">
                                            {{ \Carbon\Carbon::parse($post->created_at)->format('M/Y h:i A') }}
                                        </small>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                        </marquee>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="widget clearfix widget-archive notificationSection" style="list-style: none; font-size: 12px">
                        <table class="table table-bordered">
                            <!-- Applications Section -->
                            <thead>
                                <tr>
                                    <th scope="col" class="col-sm-3">Applications</th>
                                    <th scope="col" class="col-sm-9">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(auth()->user()->applications->isNotEmpty())
                                @foreach(auth()->user()->applications as $application)
                                <tr>
                                    <td><strong>{{ $application->jobPost->title }}</strong></td>
                                    <td>
                                        Status: {{ ucfirst($application->status) }} <br>
                                        Applied on: {{ \Carbon\Carbon::parse($application->submission_date)->format('d M Y') }}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">No applications found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>

                        <!-- Tests Section -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-sm-3">Tests</th>
                                    <th scope="col" class="col-sm-9">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty(auth()->user()->applications))
                                @foreach(auth()->user()->applications as $application)
                                {{-- @if($application->tests->isNotEmpty())
                                @foreach($application->tests as $test)
                                <tr>
                                    <td><strong>{{ $test->test_id }}</strong></td>
                                <td>
                                    Test Date: {{ $test->test_date->format('d M Y') }} <br>
                                    Center: {{ $test->test_center }} | Time: {{ $test->test_time }}
                                </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">No tests scheduled for this application.</td>
                                </tr>
                                @endif --}}
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">No applications found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <hr>

                        <!-- Results Section -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-sm-3">Results</th>
                                    <th scope="col" class="col-sm-9">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty(auth()->user()->applications))
                                @foreach(auth()->user()->applications as $application)
                                {{-- @if($application->results->isNotEmpty())
                                @foreach($application->results as $result)
                                <tr>
                                    <td><strong>Marks Obtained: {{ $result->marks_obtained }}</strong></td>
                                <td>
                                    / {{ $result->total_marks }} <br>
                                    Remarks: {{ $result->remarks ?? 'N/A' }}
                                </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">No results found for this application.</td>
                                </tr>
                                @endif --}}
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2">No applications found.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">

                        <!-- Profile Info Section: Name, Gender, Profile Picture -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">First Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->first_name ?? 'N/A' }}</p>
                                <p class="mb-0">Last Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->last_name ?? 'N/A' }}</p>


                            </div>

                            <div class="col-sm-6 d-flex justify-content-end align-items-start">
                                <img src="{{ asset('storage/' . (auth()->user()->profile_picture ?? 'default-profile.jpg')) }}" alt="avatar" class="rounded border img-fluid" style="width: 100px; height: 100px;">
                            </div>
                        </div>

                        <hr>
                         <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Father Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->father_name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Gender</p>
                                <p class="text-muted mb-0">{{ auth()->user()->gender ?? 'N/A' }}</p>
                            </div>
                        </div>
<hr>
                        <!-- Contact Info Section: Email, Phone -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Email</p>
                                <p class="text-muted mb-0">{{ auth()->user()->email ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Phone</p>
                                <p class="text-muted mb-0">{{ auth()->user()->phone ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Personal Info Section: Full Name, CNIC, Date of Birth -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Full Name</p>
                                <p class="text-muted mb-0">{{ auth()->user()->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">CNIC</p>
                                <p class="text-muted mb-0">{{ auth()->user()->cnic ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Date of Birth</p>
                                <p class="text-muted mb-0">{{ auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format('d M Y') : 'N/A' }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Address Info Section: Address, Province, District, Postal Details -->
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Address</p>
                                <p class="text-muted mb-0">{{ auth()->user()->address ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Province of Domicile</p>
                                <p class="text-muted mb-0">{{ auth()->user()->province_of_domicile ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">District of Domicile</p>
                                <p class="text-muted mb-0">{{ auth()->user()->district_of_domicile ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0">Postal City</p>
                                <p class="text-muted mb-0">{{ auth()->user()->postal_city ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0">Postal Address</p>
                                <p class="text-muted mb-0">{{ auth()->user()->postal_address ?? 'N/A' }}</p>
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
                                    @if(auth()->user()->applications->isNotEmpty())
                                    @foreach(auth()->user()->applications as $application)
                                    <li>
                                        <strong>{{ $application->jobPost->title }}</strong> - Status: {{ ucfirst($application->status) }} <br>
                                        Applied on: {{ \Carbon\Carbon::parse($application->submission_date)->format('d M Y') }}
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
                                    @foreach(auth()->user()->applications as $application)
                                    {{-- @if($application->tests->isNotEmpty())
                                    @foreach($application->tests as $test)
                                    <li>
                                        <strong>{{ $test->test_id }}</strong> - Test Date: {{ $test->test_date->format('d M Y') }}<br>
                                    Center: {{ $test->test_center }} | Time: {{ $test->test_time }}
                                    </li>
                                    @endforeach
                                    @else
                                    <li>No tests scheduled for this application.</li>
                                    @endif --}}
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
                                    @foreach(auth()->user()->applications as $application)
                                    {{-- @if($application->results->isNotEmpty())
                                    @foreach($application->results as $result)
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
                            <a href="{{ route('profile.edit') }}" class="btn btn-warning m-r-20">Edit Profile</a>

                            <a href="{{ route('projects') }}" class="btn btn-success">Back to Apply Post</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
@endpush

@push('styles')
@endpush
