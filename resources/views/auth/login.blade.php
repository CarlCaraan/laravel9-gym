<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <title>Login | Samgyup Fitness Center</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/custom.css') }}" rel="stylesheet">
    <!-- Fixed CSS -->
    <link href="{{ asset('admin/dist/css/fixed.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Start Background Image -->
    <div class="home-inner">
    </div>
    <!-- End Background Image -->

    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
            <div class="auth-box border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{ asset('admin/assets/images/brand.png') }}" width="300px" alt="logo" /></span>
                    </div>

                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">

                                <!-- Start Validation Message -->
                                <x-jet-validation-errors class="alert alert-secondary text-danger border border-danger" />
                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <!-- End Validation Message -->

                                <!-- Start Success Message -->
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <!-- End Success Message -->

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-icon text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Email Address" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}" id="email" autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-icon text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" id="password" autocomplete="current-password">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="btn btn-info auth-btn" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</a>
                                        @endif
                                        <button class="btn btn-success float-right auth-btn" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <a class="auth-link" href="{{ route('register') }}">Don't have an Account? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function() {

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>

</html>