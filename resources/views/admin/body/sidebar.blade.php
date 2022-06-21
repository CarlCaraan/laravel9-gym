<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item pt-3"><span class="text-secondary font-weight-bold ml-4">ACCOUNT MANAGEMENT</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.view') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class=" hide-menu">View Users</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.add') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Add User</span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item pt-3"><span class="text-secondary font-weight-bold ml-4">SITE INFO MANAGEMENT</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-burst-mode"></i><span class="hide-menu">All Site Info</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-account-box"></i><span class=" hide-menu">Manage Admin Page</span></a></li>
                        <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-border-all"></i><span class="hide-menu">Manage Landing Page</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>