<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin CEAA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false"> --}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- Organizations -->
                {{-- <li class="nav-item">
                    <a href="{{ route('organizations.index') }}" class="nav-link {{ request()->routeIs('organizations.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Organizations</p>
                    </a>
                </li> --}}

                <!-- Job Posts -->
                <li class="nav-item">
                    <a href="{{ route('job-posts.index') }}" class="nav-link {{ request()->routeIs('job-posts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Job Posts</p>
                    </a>
                </li>

                <!-- Candidates -->
                {{-- <li class="nav-item">
                    <a href="{{ route('candidates.index') }}" class="nav-link {{ request()->routeIs('candidates.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Candidates</p>
                    </a>
                </li> --}}

                <!-- Applications -->
                <li class="nav-item">
                    <a href="{{ route('applications.index') }}" class="nav-link {{ request()->routeIs('applications.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Applications</p>
                    </a>
                </li>

                <!-- Tests -->
                <li class="nav-item">
                    <a href="{{ route('tests.index') }}" class="nav-link {{ request()->routeIs('tests.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-vials"></i>
                        <p>Tests</p>
                    </a>
                </li>

                <!-- Roll Number Slips -->
                {{-- <li class="nav-item">
                    <a href="{{ route('roll-number-slips.index') }}" class="nav-link {{ request()->routeIs('roll-number-slips.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Roll Number Slips</p>
                    </a>
                </li> --}}

                <!-- Results -->
                <li class="nav-item">
                    <a href="{{ route('results.index') }}" class="nav-link {{ request()->routeIs('results.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Results</p>
                    </a>
                </li>


                <li class="nav-item has-treeview {{ Request::is('slider*','socialicon*', 'lights*', 'abouticon*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('slider*','socialicon*', 'lights*', 'abouticon*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Slider -->
        <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
            </a>
        </li>

        <!-- High Lights -->
        <li class="nav-item">
            <a href="{{ route('lights.index') }}" class="nav-link {{ request()->routeIs('lights.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>High Lights</p>
            </a>
        </li>

        <!-- Social Icons -->
        <li class="nav-item">
            <a href="{{ route('socialicon.index') }}" class="nav-link {{ request()->routeIs('socialicon.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Icons</p>
            </a>
        </li>

        <!-- About Icons -->
        <li class="nav-item">
            <a href="{{ route('abouticon.index') }}" class="nav-link {{ request()->routeIs('abouticon.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Icons</p>
            </a>
        </li>
    </ul>
</li>



{{--
                <!-- Slider -->
                <li class="nav-item">
                    <a href="{{ route('socialicon.index') }}" class="nav-link {{ request()->routeIs('socialicon.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Slider</p>
                    </a>
                </li>

                <!-- High Lights -->
                <li class="nav-item">
                    <a href="{{ route('lights.index') }}" class="nav-link {{ request()->routeIs('lights.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-lightbulb"></i>
                        <p>High Lights</p>
                    </a>
                </li>

                <!-- Social Icons -->
                <li class="nav-item">
                    <a href="{{ route('socialicon.index') }}" class="nav-link {{ request()->routeIs('socialicon.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>Social Icons</p>
                    </a>
                </li>

                <!-- About Icons -->
                <li class="nav-item">
                    <a href="{{ route('abouticon.index') }}" class="nav-link {{ request()->routeIs('abouticon.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>About Icons</p>
                    </a>
                </li> --}}

                {{-- <!-- Core Values -->
                <li class="nav-item">
                    <a href="{{ route('corevalues.index') }}" class="nav-link {{ request()->routeIs('corevalues.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>Core Values</p>
                    </a>
                </li>

                <!-- Pages -->
                <li class="nav-item">
                    <a href="{{ route('pages.index') }}" class="nav-link {{ request()->routeIs('pages.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Pages</p>
                    </a>
                </li>

                <!-- Our Services -->
                <li class="nav-item">
                    <a href="{{ route('ourservices.index') }}" class="nav-link {{ request()->routeIs('ourservices.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>Our Services</p>
                    </a>
                </li> --}}


                <li class="nav-item has-treeview {{ Request::is('corevalues*', 'pages*', 'ourservices*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('corevalues*', 'pages*', 'ourservices*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
           Others Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Core Values -->
        <li class="nav-item">
            <a href="{{ route('corevalues.index') }}" class="nav-link {{ request()->routeIs('corevalues.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Core Values</p>
            </a>
        </li>

        <!-- Pages -->
        <li class="nav-item">
            <a href="{{ route('pages.index') }}" class="nav-link {{ request()->routeIs('pages.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pages</p>
            </a>
        </li>

        <!-- Our Services -->
        <li class="nav-item">
            <a href="{{ route('ourservices.index') }}" class="nav-link {{ request()->routeIs('ourservices.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Our Services</p>
            </a>
        </li>
    </ul>
</li>


                {{-- <!-- Generate Roll No Slip -->
                <li class="nav-item">
                    <a href="{{ route('applications.rollnoslip', ['id' => 1]) }}" class="nav-link {{ request()->is('applications/rollnoslip*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Generate Roll No Slip</p>
                    </a>
                </li> --}}

                <!-- Download Roll No Slip -->
                {{-- <li class="nav-item">
                    <a href="{{ route('applications.download-rollnoslip', ['id' => 1]) }}" class="nav-link {{ request()->is('applications/download-rollnoslip*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Download Roll No Slip</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>













