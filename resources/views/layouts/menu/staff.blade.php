

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
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('education.index') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Education</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('religion.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Religion</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ethnic.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ethnic</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organization.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Organization</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('occupation.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Occuapation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('assistType.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assist Type</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehicleBrand.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Vehicle</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('vehicleType.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Vehicle Type</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('district.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>District</p>
                    </a>
                </li>
            </ul>
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
                    <a href="{{ route('familyHead.index') }}" class="nav-link ">
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
                    <a href="{{ route('profile.showUserDetails') }}" class="nav-link">
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
                    <a href="{{ route('auth.changePasswordView') }}" class="nav-link">
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
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                   Report
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('report.createFamilyBasedDOB') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Family Head -DOB</p>
                    </a>
                    <a href="{{ route('report.createFamilyBasedGenderAndAge') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Family Head - Age and Gender</p>
                    </a>
                    <a href="{{ route('report.createTreeReport') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tree List</p>
                    </a>
                    <a href="{{ route('report.createFamilyIncomeReport') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Family Income</p>
                    </a>
                    <a href="{{ route('report.createFamilyVehicleReport') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Vehicle List</p>
                    </a>
                </li>
               
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('staff.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                    Staff
                </p>
            </a>
        </li>

    </ul>

</nav>
<!-- /.sidebar-menu -->
