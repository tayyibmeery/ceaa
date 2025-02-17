@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')

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
                    <div class="widget clearfix widget-archive notificationSection" style="list-style: none; font-size: 12px">
                        <div class="widget-title text-center">
                            <h4 class="btn btn-rounded btn-danger" style="width: 100%">News Alerts</h4>
                        </div>
                        <marquee direction="up" scrollamount="2" height="300px" onmouseover="this.stop()" onmouseout="this.start()">
                            <div class="notificationsView">
                            </div>

                            @foreach ($posts as $post )
                            <li class="notification-box blink dynamic" style="border-bottom: 1px solid; font-size: 12px !important;">
                                <div class="row" style="line-height: 20px; margin: 0px 2px">

                                    <strong class="text-info">{{$post->title}}</strong>
                                    <a href="{{ asset('storage/' . $post->advertisement_file) }}" class="btn btn-success btn-sm blink dynamic" style="float: right;  width: max-content; ">{{ $post->title }} - {{ \Carbon\Carbon::parse($post->advertisement_date)->format('M/Y') }}</a>
                                    <span class="tab"></span>
                                     @if(\Carbon\Carbon::now()->lt($post->application_deadline))
                                    <a href="{{ route('postsjob.show', $post->id) }}" class="btn btn-warning btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px">Apply Now </a>
                                    @else
                                    <a href="#" class="btn btn-danger btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px">Expired </a>
                                   @endif
                                    <span class="tab"></span>

                                    <small class="badge text-info" style="text-align:right !important; font-size: 12px">{{ \Carbon\Carbon::parse($post->created_at)->format('M/Y h:i A') }}</small>
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
                                <h1>New Projects</h1>
                                <span>All Active Projects</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="apply-for-post" role="tabpanel" aria-labelledby="apply-for-post-tab">
                        <div class="card-header">
                            <span class="h4">Projects List</span>
                        </div>
                        <div class="card-body">
                            <table class="table" id="projects-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th title="#">#</th>
                                        {{-- <th title="Action" width="150">Action</th> --}}
                                        <th title="Project">Project</th>
                                        <th title="Expiry">Expiry</th>
                                        <th title="Download Ad">Action</th>
                                    </tr>
                                </thead>

                                @foreach ($posts as $jobPost)
                                <tr>
                                    <td>{{ $jobPost->id }}</td>
                                    {{-- <td>

                                    </td> --}}
                                    <td>{{ $jobPost->title }}</td>
                                    <td>
                                        <!-- Format expiry date -->
                                        {{ \Carbon\Carbon::parse($jobPost->application_deadline)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <!-- Link to download advertisement -->
                                        @if ($jobPost->advertisement_file)
                                        <a href="{{ asset('storage/' . $jobPost->advertisement_file) }}" class="btn btn-info btn-sm" target="_blank">Download</a>
                                        @else
                                        <span class="text-muted">No Ad Available</span>
                                        @endif
                                        @if(\Carbon\Carbon::now()->lt($jobPost->application_deadline))
                                        <a href="{{ route('postsjob.show', $jobPost->id) }}" class="btn btn-warning btn-sm">Apply Now</a>
                                        @else
                                        <a href="#" class="btn btn-danger btn-sm " >Expired </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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
