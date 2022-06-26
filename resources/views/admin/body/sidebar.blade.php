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
                <li class="sidebar-item pt-3">
                    <span class="hide-menu text-secondary font-weight-bold ml-3">SITE INFO MANAGEMENT</span>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark{{ ($prefix == '/siteinfo' || $prefix == '/herosection' || $prefix == '/services' ||$prefix == '/facilities' || $prefix == '/trainers' || $prefix == '/about') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-address-card text-warning"></i><span class="hide-menu">Manage Admin Site Info</span></a>
                    <ul aria-expanded="false" class="{{ ($prefix == '/siteinfo' || $prefix == '/herosection' || $prefix == '/services' ||$prefix == '/facilities' || $prefix == '/trainers' || $prefix == '/about') ? 'collapsed' : 'collapse' }}">
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-address-card text-info"></i><span class="hide-menu">Manage Admin Site Info</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{ route('admin.siteinfo.edit') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="mdi mdi-pencil"></i>Edit Admin Site Info</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-align-center text-info"></i><span class="hide-menu">Manage Landing Site Info</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.siteinfo.edit') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="mdi mdi-pencil"></i>Edit Landing Site Info</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-burst-mode text-info"></i><span class="hide-menu">Manage Herosection</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/herosection') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.herosection.view') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Herosection</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('user.herosection.add') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Herosection</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-run-fast text-info"></i><span class="hide-menu">Manage Services</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/services') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.services.view') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Services</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('user.services.add') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Services</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-building text-info"></i><span class="hide-menu">Manage Facilities</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/facilities') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.facilities.view') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Facilities</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('user.facilities.add') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Facilities</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-library text-info"></i><span class="hide-menu">Manage Trainers</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/trainers') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.trainers.view') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Trainers</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('user.trainers.add') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Trainers</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-information text-info"></i><span class="hide-menu">Manage About</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/about') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('user.about.edit') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="mdi mdi-pencil"></i>Edit About</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- ========= INVENTORY MANAGEMENT ========= -->
                <li class="sidebar-item pt-3">
                    <span class="hide-menu text-secondary font-weight-bold ml-3">INVENTORY MANAGEMENT</span>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark {{ ($prefix == '/inventory') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-collage text-warning"></i><span class="hide-menu">Inventory Management</span></a>
                    <ul aria-expanded="false" class="{{ ($prefix == '/inventory') ? 'collapsed' : 'collapse' }}">
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-collage text-info"></i><span class="hide-menu">Equipment Category</span></a>
                            <ul aria-expanded="false" class="{{ ($prefix == '/inventory') ? 'collapsed' : 'collapse' }}  first-level">
                                <li class="sidebar-item"><a href="{{ route('equipment.category.view') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Category</span></a></li>
                                <li class="sidebar-item"><a href="{{ route('equipment.category.add') }}" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Category</span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-info"></i><span class="hide-menu">Facilities Category</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Category</span></a></li>
                                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Category</span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-basket text-info"></i><span class="hide-menu">Manage Equipments</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Equipments</span></a></li>
                                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-plus-circle"></i>Add Equipments</span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-archive text-info"></i><span class="hide-menu">Manage Stocks</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu pl-4"><i class="fas fa-list-alt"></i>View Stocks</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- ========= ACCOUNT MANAGEMENT ========= -->
                <li class="sidebar-item pt-3">
                    <span class="hide-menu text-secondary font-weight-bold ml-3">ACCOUNT MANAGEMENT</span>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple text-warning"></i><span class="hide-menu">Manage Users</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('user.view') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class=" hide-menu">View Users</span></a></li>
                        <li class="sidebar-item"><a href="{{ route('user.add') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Add User</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>