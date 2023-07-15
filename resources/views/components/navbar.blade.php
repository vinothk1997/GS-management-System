<div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link fw-bold">
                    @if (Session::has('user'))
                        Welcome, {{ Session::get('user')['real_name']->first_name }} {{ Session::get('user')['real_name']->last_name }}-{{ Session::get('user')['user_type']}}
                    @endif
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge" id="new"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="inbox_msg">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('message.index') }}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('auth.customForgetPassword') }}" class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i>Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('auth.logout') }}" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> Log Out
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
           
        </ul>
    </nav>
    <!-- /.navbar -->
</div>
