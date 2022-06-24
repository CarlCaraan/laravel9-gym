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
                    <a class="text-body px-2" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2"></i>{{ $userSiteInfos->mobile }}</a>
                    <a class="text-body px-2" href="mailto:samgyup@fitness.com"><i class="fa fa-envelope-open text-primary me-2"></i>{{ $userSiteInfos->email }}</a>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                    <a class="text-body px-2" href="{{ route('terms.show') }}">Terms</a>
                    <a class="text-body px-2" href="{{ route('policy.show') }}">Privacy</a>
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
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">
                <img class="me-3" src="{{ asset('landing_page/assets/img/brand-text.png') }}" width="250px" alt="Logo">
            </h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                <a href="#services" class="nav-item nav-link">Services</a>
                <a href="#facilities" class="nav-item nav-link">Facilities & Equipments</a>
                <a href="#trainers" class="nav-item nav-link">Trainers & Experts</a>
                <a href="#about" class="nav-item nav-link">About</a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
        </div>
    </nav>
    <!-- Navbar End -->



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
                    <a class="btn btn-link" href="">{{ $userService->title }}</a>
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