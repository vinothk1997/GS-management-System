

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home

                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Family
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('education.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Family Head</p>
                    </a>
                </li>
               
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('familyHead.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Profile
                        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('message.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Message
        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('message.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Change Password
        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Logout
        
                        </p>
                    </a>
                </li>

               
            </ul>
        </li>
        
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                    Notification
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('education.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Family Head</p>
                    </a>
                </li>
               
            </ul>
        </li>

    </ul>

</nav>
<!-- /.sidebar-menu -->
