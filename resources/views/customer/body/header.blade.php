@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-5" data-wow-delay="0.1s">
    <a href="{{ route('customer.home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="text-primary m-0">
            <img class="me-3" src="{{ asset('landing_page/assets/img/brand-text.png') }}" width="250px" alt="Logo">
        </h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @auth
            @if(Auth::user()->user_type == "Customer")
            <a href="" class="nav-item nav-link">+ Add Schedule</a>
            <a href="{{ route('customer.profile.view') }}" class="nav-item nav-link {{ ($prefix == '/profile') ? 'active' : '' }}">Account Settings</a>
            <a href="{{ route('customer.profile.view') }}" class="nav-item nav-link">
                <img src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('upload/user_images/'.Auth::user()->profile_photo_path) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="user" class="img-fluid rounded-circle shadow-sm" width="25px">
                {{ Auth::user()->first_name . " " . Auth::user()->last_name }}</a>
            @else
            <a href=" {{ url('/') }}" class="nav-item nav-link">Home</a>
            <a href="#services" class="nav-item nav-link">Services</a>
            <a href="#facilities" class="nav-item nav-link">Facilities & Equipments</a>
            <a href="#trainers" class="nav-item nav-link">Trainers & Experts</a>
            <a href="#about" class="nav-item nav-link">About</a>
            @endif
            @else
            <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
            <a href="#services" class="nav-item nav-link">Services</a>
            <a href="#facilities" class="nav-item nav-link">Facilities & Equipments</a>
            <a href="#trainers" class="nav-item nav-link">Trainers & Experts</a>
            <a href="#about" class="nav-item nav-link">About</a>
            @endauth
        </div>
        @auth
        @if(Auth::user()->user_type == "Admin")
        <a href="{{ route('dashboard') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Admin Panel</a>
        @endif
        <a href="{{ route('admin.logout') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Logout</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
        @endauth
    </div>
</nav>