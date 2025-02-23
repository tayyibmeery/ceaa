@extends("frontend.layout.main")

@section("title", "Projects")

@section("content")

				<section id="page-content" class="sidebar-left">
								<div class="container-fluid">
												<div class="tabs tabs-vertical">
																<div class="row">
																				<div class="sidebar col-lg-3">
																								{{-- <div class="widget row team-members">
                        <div class="col-lg-12">
                            <div class="team-member">
                                <div class="team-image" style="display: inline-flex">


                                    <img style="width: 44%; border-radius: 25px" src="images/avatars/profile.png">
                                    <br>
                                    <br>
                                    <a href="login.html" class="btn btn-sm btn-rounded">Login</a>
                                    <a href="register.html" class="btn btn-sm btn-rounded">Register</a>

                                </div>
                            </div>
                        </div>
                    </div> --}}
																								<div class="widget clearfix widget-archive">
																												<style>
																																.nav {
																																				background-color: #46ACC2;
																																				display: flex;
																																				padding: 16px !important;
																																				font-family: sans-serif;
																																				color: white;
																																}

																																.nav-item {
																																				background: #e4e6ef;
																																				border: 1px solid white;
																																}

																																.nav-item>.active {
																																				background: dodgerblue !important;
																																				color: white !important;
																																				border: 1px solid white !important;
																																}

																																/*RESPONSIVE NAVBAR MENU STARTS*/
																																/* CHECKBOX HACK */
																																#checkbox_toggle {
																																				display: none;
																																}

																																/*HAMBURGER MENU*/
																																.hamburger {
																																				display: none;
																																				font-size: 24px;
																																				user-select: none;
																																}

																																/* APPLYING MEDIA QUERIES */
																																@media (max-width: 768px) {
																																				.menu {
																																								display: none;
																																				}

																																				.notificationSection {
																																								display: none;
																																				}

																																				#checkbox_toggle:checked~.menu {
																																								display: block;
																																								margin: 10px;
																																				}

																																				.hamburger {
																																								align-self: flex-end;
																																								display: initial;
																																								position: absolute;
																																								cursor: pointer;
																																				}
																																}

																																@media (max-width: 992px) {
																																				.menu {
																																								display: none;
																																				}

																																				.notificationSection {
																																								display: none;
																																				}

																																				#checkbox_toggle:checked~.menu {
																																								display: block;
																																								margin: 10px;
																																				}

																																				.hamburger {
																																								align-self: flex-end;
																																								display: initial;
																																								position: absolute;
																																								cursor: pointer;
																																				}
																																}
																												</style>
																												{{-- <ul class="nav flex-column nav-tabs" role="tablist" aria-orientation="vertical">
                            <input type="checkbox" id="checkbox_toggle" />
                            Profile Menu
                            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

                            <!-- NAVIGATION MENUS -->

                            <div class="menu">
                                <li class="nav-item">
                                    <a class=" nav-link" href="login.html">Home</a>
                                </li>
                            </div>
                        </ul> --}}
																								</div>
																								<div class="widget clearfix widget-archive notificationSection"
																												style="list-style: none; font-size: 12px">
																												<div class="widget-title text-center">
																																<h4 class="btn btn-rounded btn-danger" style="width: 100%">News Alerts</h4>
																												</div>
																												<marquee direction="up" scrollamount="2" height="300px" onmouseover="this.stop()"
																																onmouseout="this.start()">
																																<div class="notificationsView">
																																</div>

																																@foreach ($posts as $post)
																																				<li class="notification-box blink dynamic"
																																								style="border-bottom: 1px solid; font-size: 12px !important;">
																																								<div class="row" style="line-height: 20px; margin: 0px 2px">

																																												<strong class="text-info">{{ $post->title }}</strong>
																																												<a href="{{ asset("storage/" . $post->advertisement_file) }}"
																																																class="btn btn-success btn-sm blink dynamic"
																																																style="float: right;  width: max-content; ">{{ $post->title }} -
																																																{{ \Carbon\Carbon::parse($post->advertisement_date)->format("M/Y") }}</a>
																																												<span class="tab"></span>
																																												@if (\Carbon\Carbon::now()->lt($post->application_deadline))
																																																<a href="{{ route("postsjob.show", $post->id) }}"
																																																				class="btn btn-warning btn-sm dynamic"
																																																				style="float: right;  width: max-content; margin-right: 2px">Apply Now
																																																</a>
																																												@else
																																																<a href="#" class="btn btn-danger btn-sm dynamic"
																																																				style="float: right;  width: max-content; margin-right: 2px">Expired
																																																</a>
																																												@endif
																																												<span class="tab"></span>

																																												<small class="badge text-info"
																																																style="text-align:right !important; font-size: 12px">{{ \Carbon\Carbon::parse($post->created_at)->format("M/Y h:i A") }}</small>
																																								</div>
																																				</li>
																																@endforeach

																																{{-- <li class="notification-box blink dynamic" style="border-bottom: 1px solid; font-size: 12px !important;">
                                <div class="row" style="line-height: 20px; margin: 0px 2px">

                                    <strong class="text-info"> University Of Veterinary &amp; Animal
                                        Sciences, Swat Khyber Pakhtunkhwa</strong>
                                    <a download href="storage/project-files/18025/UVAS%2c%20Swat%20Add.pdf" class="btn btn-primary btn-sm blink dynamic" style="float: right;  width: max-content;">Advertisements</a>
                                    <span class="tab"></span>

                                    <small class="badge text-info" style="text-align:right !important; font-size: 12px">14-09-2023
                                        09:09:34 PM</small>
                                </div>
                            </li> --}}

																												</marquee>
																								</div>

																				</div>
																				<div class="content col-lg-9">
																								<div id="page-title" style="padding: 20px 0 !important;">
																												<div class="container">
																																<div class="page-title">
																																				<h1>Projects</h1>
																																				<span>Browse All Projects</span>
																																</div>
																												</div>
																								</div>

																								<!-- Project Filter Tabs -->
																								<ul class="nav nav-tabs bg-light mb-4 border-0 p-2">
																												<li class="nav-item">
																																<a class="nav-link {{ request()->routeIs("projects.new") ? "active bg-success text-white" : "bg-white" }} me-2 rounded"
																																				href="{{ route("projects.new") }}">New Projects</a>
																												</li>
																												<li class="nav-item">
																																<a class="nav-link {{ request()->routeIs("projects.ongoing") ? "active bg-success text-white" : "bg-white" }} me-2 rounded"
																																				href="{{ route("projects.ongoing") }}">Ongoing</a>
																												</li>
																												<li class="nav-item">
																																<a class="nav-link {{ request()->routeIs("projects.latest") ? "active bg-success text-white" : "bg-white" }} me-2 rounded"
																																				href="{{ route("projects.latest") }}">Latest</a>
																												</li>
																												<li class="nav-item">
																																<a class="nav-link {{ request()->routeIs("projects.completed") ? "active bg-success text-white" : "bg-white" }} me-2 rounded"
																																				href="{{ route("projects.completed") }}">Completed</a>
																												</li>
																												<li class="nav-item">
																																<a class="nav-link {{ request()->routeIs("projects.all") ? "active bg-success text-white" : "bg-white" }} me-2 rounded"
																																				href="{{ route("projects.all") }}">All Projects</a>
																												</li>
																								</ul>

																								<div class="card">
																												<div class="card-header bg-success text-white">
																																<span class="h4">
																																				@if (isset($type))
																																								{{ ucfirst($type) }} Projects
																																				@else
																																								Projects List
																																				@endif
																																</span>
																												</div>
																												<div class="card-body">
																																<table class="table" id="projects-table">
																																				<thead>
																																								<tr>
																																												<th>#</th>
																																												<th>Project</th>
																																												<th>Posted Date</th>
																																												<th>Deadline</th>
																																												<th>Status</th>
																																												<th>Action</th>
																																								</tr>
																																				</thead>
																																				<tbody>
																																								@foreach ($posts as $jobPost)
																																												<tr>
																																																<td>{{ $jobPost->id }}</td>
																																																<td>{{ $jobPost->title }}</td>
																																																<td>{{ \Carbon\Carbon::parse($jobPost->created_at)->format("d-m-Y") }}</td>
																																																<td>{{ \Carbon\Carbon::parse($jobPost->application_deadline)->format("d-m-Y") }}
																																																</td>
																																																<td>
																																																				@if (\Carbon\Carbon::now()->lt($jobPost->application_deadline))
																																																								<span class="badge badge-success">Active</span>
																																																				@else
																																																								<span class="badge badge-danger">Expired</span>
																																																				@endif
																																																</td>
																																																<td>
																																																				@if ($jobPost->advertisement_file)
																																																								<a href="{{ asset("storage/" . $jobPost->advertisement_file) }}"
																																																												class="btn btn-info btn-sm" target="_blank">
																																																												<i class="fas fa-download"></i> Ad
																																																								</a>
																																																				@endif

																																																				@if (\Carbon\Carbon::now()->lt($jobPost->application_deadline))
																																																								<a href="{{ route("postsjob.show", $jobPost->id) }}"
																																																												class="btn btn-warning btn-sm">
																																																												<i class="fas fa-paper-plane"></i> Apply
																																																								</a>
																																																				@endif
																																																</td>
																																												</tr>
																																								@endforeach
																																				</tbody>
																																</table>

																																<!-- Pagination -->
																																<div class="mt-4">
																																				{{ $posts->links() }}
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
				<script>
								$(document).ready(function() {
												$('#projects-table').DataTable({
																"order": [
																				[0, "desc"]
																],
																"pageLength": 10,
																"responsive": true
												});
								});
				</script>
@endpush

@push("styles")
@endpush
