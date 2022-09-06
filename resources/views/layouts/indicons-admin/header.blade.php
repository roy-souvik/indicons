<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="/">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="plugins/images/logo-icon.png" alt="homepage" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <!-- <img src="plugins/images/logo-text.png" alt="homepage" /> -->
                    Admin
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li>
                    <a class="profile-pic" href="#">
                        <img src="plugins/images/users/d1.jpg" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium">{{ Auth::user()->name }}</span>
                    </a>
                </li>

                <li>
                    <a class="profile-pic" href="/">
                        <span class="text-white font-medium">Main Site</span>
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="text-white font-medium" style="margin-right: 1rem;" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="text-white font-medium">{{ __('Log Out') }}</span>
                    </a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
