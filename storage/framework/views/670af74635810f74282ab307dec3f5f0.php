<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('home')); ?>" class="brand-link">
        <img src="<?php echo e(asset('frontend/images/logo.png')); ?>" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin CEAA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- Organizations -->
                

                <!-- Job Posts -->
                <li class="nav-item">
                    <a href="<?php echo e(route('job-posts.index')); ?>" class="nav-link <?php echo e(request()->routeIs('job-posts.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Job Posts</p>
                    </a>
                </li>

                <!-- Candidates -->
                

                <!-- Applications -->
                <li class="nav-item">
                    <a href="<?php echo e(route('applications.index')); ?>" class="nav-link <?php echo e(request()->routeIs('applications.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Applications</p>
                    </a>
                </li>

                <!-- Tests -->
                <li class="nav-item">
                    <a href="<?php echo e(route('tests.index')); ?>" class="nav-link <?php echo e(request()->routeIs('tests.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-vials"></i>
                        <p>Tests</p>
                    </a>
                </li>

                <!-- Roll Number Slips -->
                <li class="nav-item">
                    <a href="<?php echo e(route('rollnumber.index')); ?>" class="nav-link <?php echo e(request()->routeIs('rollnumber.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Roll Number Slips</p>
                    </a>
                </li>

                <!-- Results -->
                <li class="nav-item">
                    <a href="<?php echo e(route('results.index')); ?>" class="nav-link <?php echo e(request()->routeIs('results.*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Results</p>
                    </a>
                </li>


                <li class="nav-item has-treeview <?php echo e(Request::is('slider*','socialicon*', 'lights*', 'abouticon*') ? 'menu-open' : ''); ?>">
    <a href="#" class="nav-link <?php echo e(Request::is('slider*','socialicon*', 'lights*', 'abouticon*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Slider -->
        <li class="nav-item">
            <a href="<?php echo e(route('slider.index')); ?>" class="nav-link <?php echo e(request()->routeIs('slider.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
            </a>
        </li>

        <!-- High Lights -->
        <li class="nav-item">
            <a href="<?php echo e(route('lights.index')); ?>" class="nav-link <?php echo e(request()->routeIs('lights.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>High Lights</p>
            </a>
        </li>

        <!-- Social Icons -->
        <li class="nav-item">
            <a href="<?php echo e(route('socialicon.index')); ?>" class="nav-link <?php echo e(request()->routeIs('socialicon.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Icons</p>
            </a>
        </li>

        <!-- About Icons -->
        <li class="nav-item">
            <a href="<?php echo e(route('abouticon.index')); ?>" class="nav-link <?php echo e(request()->routeIs('abouticon.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>About Icons</p>
            </a>
        </li>
    </ul>
</li>





                


                <li class="nav-item has-treeview <?php echo e(Request::is('corevalues*', 'pages*', 'ourservices*','trems*') ? 'menu-open' : ''); ?>">
    <a href="#" class="nav-link <?php echo e(Request::is('corevalues*', 'pages*', 'ourservices*','trems*') ? 'active' : ''); ?>">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
           Others Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- Core Values -->
        <li class="nav-item">
            <a href="<?php echo e(route('corevalues.index')); ?>" class="nav-link <?php echo e(request()->routeIs('corevalues.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Core Values</p>
            </a>
        </li>

        <!-- Pages -->
        <li class="nav-item">
            <a href="<?php echo e(route('pages.index')); ?>" class="nav-link <?php echo e(request()->routeIs('pages.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pages</p>
            </a>
        </li>

          <!-- Pages -->
        <li class="nav-item">
            <a href="<?php echo e(route('trems.index')); ?>" class="nav-link <?php echo e(request()->routeIs('trems.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Trems Pages</p>
            </a>
        </li>

        <!-- Our Services -->
        <li class="nav-item">
            <a href="<?php echo e(route('ourservices.index')); ?>" class="nav-link <?php echo e(request()->routeIs('ourservices.index') ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Our Services</p>
            </a>
        </li>
    </ul>
</li>


                

                <!-- Download Roll No Slip -->
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>













<?php /**PATH D:\CEAA\ceaa\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>