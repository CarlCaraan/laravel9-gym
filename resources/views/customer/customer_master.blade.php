    @php
    $userSiteInfos = DB::table('user_site_infos')->first();
    $userServices = DB::table('user_services')->get();
    @endphp
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title') </title>

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

        <!-- Toastr CSS CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

        <!-- Datatable CSS CDN -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
            <img class="position-absolute top-50 start-50 translate-middle" src="{{ asset('landing_page/assets/img/favicon.ico') }}" width="50px" alt="Icon">
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <!-- <div class="container-fluid bg-dark p-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="row gx-0 d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                        <a class="text-light px-2" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2"></i>{{ $userSiteInfos->mobile }}</a>
                        <a class="text-light px-2" href="mailto:samgyup@fitness.com"><i class="fa fa-envelope-open text-primary me-2"></i>{{ $userSiteInfos->email }}</a>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="h-100 d-inline-flex align-items-center py-3 me-2">
                        <a class="text-light px-2" href="{{ route('terms.show') }}">Terms</a>
                        <a class="text-light px-2" href="{{ route('policy.show') }}">Privacy</a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center">
                        <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-outline-body me-1" href="{{ $userSiteInfos->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-sm-square btn-outline-body me-0" href="{{ $userSiteInfos->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Topbar End -->

        <!-- Navbar Start -->
        @include('customer.body.header')
        <!-- Navbar End -->


        <!-- Start Content -->
        <div class="customer-content-background w-100 py-5">
            @yield('content')
        </div>
        <!-- End Content -->


        <!-- Footer Start -->
        @include('customer.body.footer')
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

        <!-- Toastr JS CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            // Toastr
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}")
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}")
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}")
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}")
                    break;
            }
            @endif
        </script>

        <!-- SweetAlert2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // SweetAlert2
            $(function() {
                $(document).on('click', '#delete', function(e) {
                    e.preventDefault();
                    var link = $(this).attr("href");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete this Row?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                });
            });
        </script>

        <!-- Datatable JS CDN -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    </body>

    </html>