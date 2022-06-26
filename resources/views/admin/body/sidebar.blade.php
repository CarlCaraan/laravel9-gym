@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard text-warning"></i><span class="hide-menu">Dashboard</span></a></li>

                <!-- ========= SITE INFO MANAGEMENT ========= -->
                <li class="sidebar-item {{ ($prefix == '/siteinfo') ? 'selected' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark {{ ($prefix == '/siteinfo') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-align-center text-warning"></i><span class="hide-menu">Site Info Management</span></a>
                    <ul aria-expanded="false" class="{{ ($prefix == '/siteinfo') ? 'collapse  first-level in' : 'collapse first-level' }}">
                        <li class="sidebar-item {{ ($route == 'admin.siteinfo.edit') ? 'active' : '' }}"><a href="{{ route('admin.siteinfo.edit') }}" class="sidebar-link"><i class="mdi mdi-pencil-box"></i><span class="hide-menu">Admin Site Info</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.siteinfo.edit') ? 'active' : '' }}"><a href="{{ route('user.siteinfo.edit') }}" class="sidebar-link"><i class="mdi mdi-pencil-box"></i><span class="hide-menu">Landing Site Info</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.about.edit') ? 'active' : '' }}"><a href="{{ route('user.about.edit') }}" class="sidebar-link"><i class="mdi mdi-pencil-box"></i><span class="hide-menu">About</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.herosection.edit' || $route == 'user.herosection.add') ? 'active' : '' }}"><a href="{{ route('user.herosection.view') }}" class="sidebar-link"><i class="mdi mdi-burst-mode"></i><span class="hide-menu">Herosection</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.services.edit' || $route == 'user.services.add') ? 'active' : '' }}"><a href="{{ route('user.services.view') }}" class="sidebar-link"><i class="mdi mdi-run-fast"></i><span class="hide-menu">Services</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.facilities.edit' || $route == 'user.facilities.add') ? 'active' : '' }}"><a href="{{ route('user.facilities.view') }}" class="sidebar-link"><i class="far fa-building"></i><span class="hide-menu">Facilities</span></a></li>
                        <li class="sidebar-item {{ ($route == 'user.trainers.edit' || $route == 'user.trainers.add') ? 'active' : '' }}"><a href="{{ route('user.trainers.view') }}" class="sidebar-link"><i class="mdi mdi-library"></i><span class="hide-menu">Trainers</span></a></li>
                    </ul>
                </li>

                <!-- ========= INVENTORY MANAGEMENT ========= -->
                <li class="sidebar-item  {{ ($prefix == '/inventory') ? 'selected' : '' }}"> <a class="sidebar-link has-arrow waves-effect waves-dark {{ ($prefix == '/inventory') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cube text-warning"></i><span class="hide-menu">Inventory Management</span></a>
                    <ul aria-expanded="false" class="{{ ($prefix == '/inventory') ? 'collapse  first-level in' : 'collapse first-level' }}">
                        <li class="sidebar-item {{ ($route == 'equipment.category.edit' || $route == 'equipment.category.add') ? 'active' : '' }}"><a href="{{ route('equipment.category.view') }}" class="sidebar-link"><i class="mdi mdi-collage"></i><span class="hide-menu">Equipment Category</span></a></li>
                        <li class="sidebar-item {{ ($route == 'facility.category.edit' || $route == 'facility.category.add') ? 'active' : '' }}"><a href="{{ route('facility.category.view') }}" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Facilities Category</span></a></li>
                        <li class="sidebar-item {{ ($route == 'equipment.inventory.edit' || $route == 'equipment.inventory.add') ? 'active' : '' }}"><a href="{{ route('equipment.inventory.view') }}" class="sidebar-link"><i class="mdi mdi-basket"></i><span class="hide-menu">Equipments</span></a></li>
                        <!-- <li class="sidebar-item"><a href="" class="sidebar-link"><i class="mdi mdi-archive"></i><span class="hide-menu">Stocks</span></a></li> -->
                    </ul>
                </li>

                <!-- ========= ACCOUNT MANAGEMENT ========= -->
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple text-warning"></i><span class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.view') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu">View Users</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.add') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Add User</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>