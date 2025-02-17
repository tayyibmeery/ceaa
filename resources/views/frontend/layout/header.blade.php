 <!-- Header -->
 <header id="header">
     <div class="header-inner">
         <div class="container">
             <!--Logo-->
             <div id="logo">
                 <a href="{{route('front')}}">
                     {{-- <span class="logo-default">CEAA</span>
                     <span class="logo-dark">CEAA</span>
                      --}}
<img class="logo-default" src="{{ asset('frontend\images\logo.png') }}" alt="CEAA Logo" style="max-height: 50px;">
<img class="logo-dark" src="{{ asset('frontend\images\logo.png') }}" alt="CEAA Logo" style="max-height: 50px; display: none;">
                 </a>
             </div>


             {{-- <div id="search">
                 <a id="btn-search-close" class="btn-search-close" aria-label="Close search form">
                     <i class="icon-x"></i>
                 </a>
                 <form class="search-form" action="https://etapk.com/projects" method="get">
                     <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                     <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                 </form>
             </div> --}}
             {{-- <div class="header-extras">
                 <ul>
                     <li>
                         <a id="btn-search" href="#" style="display: inline"> <i class="icon-search"></i></a>
                     </li>
                 </ul>
             </div> --}}

             <!--end: Header Extras-->
             <!--Navigation Resposnive Trigger-->
             <div id="mainMenu-trigger"><a class="lines-button x"><span class="lines"></span></a></div>
             <!--end: Navigation Resposnive Trigger-->
             <!--Navigation-->
             <div id="mainMenu">
                 <div class="container">
                     <nav>
                         <ul>
                             <li><a href="{{route('front')}}">Home</a></li>
                             <li class="dropdown"><a href="#">About CEAA?</a>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="{{route('vision')}}">Vision & Core Values</a></li>
                                      @foreach (App\Models\Page::all() as $page)
                                         <li class="dropdown-submenu"><a href="{{ url('page/'.$page->slug) }}">{{ $page->name }}</a></li>
                                        {{-- <li><a href="{{ url('page/'.$page->slug) }}">{{ $page->name }}</a></li> --}}
                                    @endforeach
                                     {{-- <li class="dropdown-submenu"><a href="{{route('plans')}}">Plans & Policies</a></li>
                                     <li class="dropdown-submenu"><a href="{{route('fees')}}">Returns & Fees</a></li> --}}

                                 </ul>
                             </li>
                             <li class="dropdown"><a href="{{route('servises')}}">Services</a>
                                 {{-- <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="whyEta.html">Why
                                             CEAA?</a>
                                     </li>

                                     <li class="dropdown-submenu">
                                         <a href="consultingServices.html">Consulting
                                             Services</a>
                                     </li>
                                     <li class="dropdown-submenu">
                                         <a href="dataServices.html">Data Processing Services</a>
                                     </li>
                                     <li class="dropdown-submenu"><a href="monitoringServices.html">Monitoring
                                             Services</a></li>
                                     <li class="dropdown-submenu"><a href="educationalTest.html">Educational
                                             Test</a>










                                     </li>
                                     <li><a href="professionalTest.html">Professional Test</a>














                                     </li>
                                     <li class="dropdown-submenu"><a href="#">Trainings</a></li>
                                 </ul> --}}
                             </li>


                             <li class="dropdown"><a href="{{route('projects')}}">Projects</a>
                                 {{-- <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="projects.html">Latest Projects</a>
                                     </li>
                                     <li class="dropdown-submenu"><a href="projects/working.html">On Going
                                             Projects</a>
                                     </li>
                                     <li class="dropdown-submenu"><a href="projects/completed.html">Completed
                                             Projects</a>
                                     </li>



                                 </ul> --}}
                             </li>
                             <li class="dropdown"><a href="#" class="blink">Eligibility & Roll No's</a>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="{{route('applicationstatus')}}" class="blink">Application
                                             Status</a>
                                     </li>
                                     {{-- <li class="dropdown-submenu"><a href="status/blacklisting.html" class="blink">Black Listing</a>
                                     </li> --}}
                                     <li class="dropdown-submenu"><a href="{{route('roll_slip')}}" class="blink">Roll No's</a>

                                     </li>
                                 </ul>
                             </li>

                             <li class="dropdown"><a href="{{route('candidate.results')}}" class="blink">Results</a>

                             </li>

                             <li class="dropdown"><a href="#">Contact Us</a>
                             </li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
    <ul class="dropdown-menu">
        @auth
            <!-- For logged-in users -->
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <!-- For guests (users not logged in) -->
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</li>

                             {{-- <li class="dropdown"><a href="#">My Account</a>
                                 <ul class="dropdown-menu">
                                     <li class="dropdown-submenu"><a href="{{route('login')}}">Login</a>
                                     </li>
                                     <li class="dropdown-submenu"><a href="{{route('register')}}">Register</a>
                                     </li>
                                 </ul>
                             </li> --}}
                             {{-- <li class="notification-nav">

                                 <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                     <i class="fa fa-bell">
                                         <span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger counting" style="margin-top: 10px;">
                                         </span></i>
                                 </a>
                                 <ul class="dropdown-menu notification-dropdown">
                                     <li class="head text-light bg-dark">
                                         <div class="row">
                                             <div class="col-lg-12 col-sm-12 col-12">
                                                 <h5>Notifications (<span class="counting"></span>)</h5>
                                             </div>
                                         </div>
                                     </li>
                                     <div class="notificationsView">
                                     </div>
                                     <li class="footer bg-dark text-center">
                                         <a href="notifications/all.html" class="text-light">View
                                             All</a>
                                     </li>
                                 </ul>
                             </li> --}}


                         </ul>
                     </nav>
                 </div>
             </div>
             <!--end: Navigation-->
         </div>
     </div>
 </header>
 <!-- end: Header -->
 {{-- <div id="loading">
     <img id="loading-image" src="assets/loading.gif" alt="Loading..." />
 </div> --}}
