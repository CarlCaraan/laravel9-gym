<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Samgyup Fitness Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('landing_page/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('landing_page/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('landing_page/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('landing_page/assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('landing_page/assets/css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <img class="position-absolute top-50 start-50 translate-middle" src="{{ asset('landing_page/assets/img/favicon.ico') }}" width="50px" alt="Icon">
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                    <a class="text-light px-2" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2"></i>{{ $userSiteInfos->mobile }}</a>
                    <a class="text-light px-2" href="mailto:samgyup@fitness.com"><i class="fa fa-envelope-open text-primary me-2"></i>{{ $userSiteInfos->email }}</a>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                    <a class="text-light px-2" href="{{ route('terms.show') }}" target="_blank">Terms</a>
                    <a class="text-light px-2" href="{{ route('policy.show') }}" target="_blank">Privacy</a>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-0" href="{{ $userSiteInfos->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-5" data-wow-delay="0.1s">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
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
                <a href="{{ route('customer.appointment.view') }}" class="nav-item nav-link">+ Add Schedule</a>
                <a href="{{ route('customer.profile.view') }}" class="nav-item nav-link">Account Settings</a>
                <a href="{{ route('customer.profile.view') }}" class="nav-item nav-link">
                    <img src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('upload/user_images/'.Auth::user()->profile_photo_path) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="user" class="img-fluid rounded-circle shadow-sm" width="25px">
                    {{ Auth::user()->first_name . " " . Auth::user()->last_name }}</a>
                @else
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
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
    <!-- Navbar End -->

    <!-- Herosection Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($userHerosections as $key => $userHerosection)
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{ (!empty($userHerosection->image)) ? url('upload/user_siteinfo/herosection/'.$userHerosection->image) : url('upload/user_siteinfo/herosection/default_photo.png') }}'>">
                <img class="img-fluid" src="{{ (!empty($userHerosection->image)) ? url('upload/user_siteinfo/herosection/'.$userHerosection->image) : url('upload/user_siteinfo/herosection/default_photo.png') }}" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">{{ $userHerosection->title }}</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3">{{ $userHerosection->body }}</p>
                                <a href="{{ route('login') }}" class="btn btn-primary py-3 px-5 animated slideInLeft">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Herosection End -->

    <!-- Services Start -->
    <div class="container-xxl py-5 offset" id="services">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Our Services</h4>
                <h1 class="display-5 mb-4">Reach your fitness goal with our service offers.</h1>
            </div>
            <div class="row g-4">
                @foreach ($userServices as $key => $userService)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $key+3 }}s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <img class="bg-img img-fluid" src="{{ (!empty($userService->background)) ? url('upload/user_siteinfo/services/'.$userService->background) : url('upload/user_siteinfo/services/default_photo.png') }}" alt="">
                        <div class="service-text p-5">
                            <img class="mb-4 img-fluid" src="{{ (!empty($userService->image)) ? url('upload/user_siteinfo/services/'.$userService->image) : url('upload/user_siteinfo/services/default_photo.png') }}" alt="Icon">
                            <h3 class="mb-3">{{ $userService->title }}</h3>
                            <p class="mb-4">{{ $userService->body }}</p>
                            <a class="btn" href="{{ route('login') }}"><i class="fa fa-plus text-primary me-3"></i>Get Started</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Facilities and Equipments Start -->
    <div class="container-xxl project py-5 offset" id="facilities">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Facilities and Equipments</h4>
                <h1 class="display-5 mb-4">Visit Our Latest Equipments And Facilities</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        @foreach ($userFacilities as $key => $userFacility)
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 wow slideInLeft {{ ($key++ == '0') ? 'active' : '' }}" data-wow-delay="0.{{ $key+3 }}s" data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $userFacility->id }}" type="button">
                            <h3 class="m-0">{{ $userFacility->name }}</h3>
                        </button>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        @foreach ($userFacilities as $key => $userFacility)
                        <div class="tab-pane fade {{ ($key++ == '0') ? 'show active' : ''}}" id="tab-pane-{{ $userFacility->id }}">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ (!empty($userFacility->image)) ? url('upload/user_siteinfo/facilities/'.$userFacility->image) : url('upload/user_siteinfo/facilities/default_photo.png') }}" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">{{ $userFacility->title }}</h1>
                                    <p class="mb-4">{{ $userFacility->body }}</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities and Equipments End -->

    <!-- Trainers and Experts Start -->
    <div class="container-xxl py-5 offset" id="trainers">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Trainers & Experts</h4>
                <h1 class="display-5 mb-4">Team For Your Dream Body</h1>
            </div>
            <div class="row g-0 team-items">
                @foreach ($userTrainers as $key => $userTrainer)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $key+3 }}s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100 h-100" src="{{ (!empty($userTrainer->image)) ? url('upload/user_siteinfo/trainers/'.$userTrainer->image) : url('upload/user_siteinfo/trainers/default_photo.png') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="{{ $userTrainer->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="{{ $userTrainer->twitter_link }}"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="{{ $userTrainer->instagram_link }}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">{{ $userTrainer->name }}</h3>
                            <span class="text-primary">{{ $userTrainer->position }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Trainers and Experts End -->

    <!-- About Start -->
    <div class="container-xxl py-5 offset" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title">About Us!</h4>
                    <h1 class="display-5 mb-4">{{ $userAbout->title }}</h1>
                    <p class="mb-5">{!! $userAbout->body !!}</p>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ (!empty($userAbout->background)) ? url('upload/user_siteinfo/about/'.$userAbout->background) : url('upload/user_siteinfo/about/default_photo.png') }}" alt="image">
                        <img class="img-fluid" src="{{ (!empty($userAbout->image)) ? url('upload/user_siteinfo/about/'.$userAbout->image) : url('upload/user_siteinfo/about/default_photo.png') }}" alt="background">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-light mb-4">Address</h3>
                    <p class="mb-2">{!! $userSiteInfos->address !!}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>{{ $userSiteInfos->mobile }}</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>{{ $userSiteInfos->email }}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->twitter_link }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-square btn-outline-body me-0" href="{{ $userSiteInfos->instagram_link }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-light mb-4">Services</h3>
                    @foreach ($userServices as $key => $userService)
                    <a class="btn btn-link" href="#services">{{ $userService->title }}</a>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3 class="text-light mb-4">Quick Links</h3>
                    <a class="btn btn-link" href="#services">Services</a>
                    <a class="btn btn-link" href="#facilities">Facilities & Equipments</a>
                    <a class="btn btn-link" href="#trainers">Trainers & Experts</a>
                    <a class="btn btn-link" href="#about">About</a>
                    <a class="btn btn-link" href="{{ route('login') }}">Join Us</a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        {!! $userSiteInfos->footer !!}
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="#">AW01-A</a>
                        <br> Created By: <a class="border-bottom" href="#" target="_blank">HamogSquads</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing_page/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('landing_page/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('landing_page/assets/js/main.js') }}"></script>
</body>

</html>