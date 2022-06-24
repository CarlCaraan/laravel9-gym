<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item pt-3"><span class="text-secondary font-weight-bold ml-3">ACCOUNT MANAGEMENT</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.view') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class=" hide-menu">View Users</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.add') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Add User</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item pt-3"><span class="text-secondary font-weight-bold ml-3">SITE INFO MANAGEMENT</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-address-card"></i><span class="hide-menu">Manage Admin Site Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('admin.siteinfo.edit') }}" class="sidebar-link"><i class="mdi mdi-pencil"></i><span class="hide-menu">Edit Admin Site Info</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-align-center"></i><span class="hide-menu">Manage Landing Site Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.siteinfo.edit') }}" class="sidebar-link"><i class="mdi mdi-pencil"></i><span class="hide-menu">Edit Landing Site Info</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-burst-mode"></i><span class="hide-menu">Manage Herosection</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.herosection.view') }}" class="sidebar-link"><i class="fas fa-list-alt"></i><span class="hide-menu">View Herosection</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.herosection.add') }}" class="sidebar-link"><i class="fas fa-plus-circle"></i><span class="hide-menu">Add Herosection</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-run-fast"></i><span class="hide-menu">Manage Services</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.services.view') }}" class="sidebar-link"><i class="fas fa-list-alt"></i><span class="hide-menu">View Services</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.services.add') }}" class="sidebar-link"><i class="fas fa-plus-circle"></i><span class="hide-menu">Add Services</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-building"></i><span class="hide-menu">Manage Facilities</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.facilities.view') }}" class="sidebar-link"><i class="fas fa-list-alt"></i><span class="hide-menu">View Facilities</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.facilities.add') }}" class="sidebar-link"><i class="fas fa-plus-circle"></i><span class="hide-menu">Add Facilities</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>