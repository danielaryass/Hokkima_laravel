<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - UMKM HOKIMA</title>
    <link rel="apple-touch-icon" href="../../../backsite/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/image/hokkima.jpeg') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../assets/backsite/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../assets/backsite/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../assets/backsite/app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('../assets/backsite/app-assets/css/pages/login-register.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('../assets/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  navbar-dark fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="1-column">


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row navbar-flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('../assets/image/hokkima.jpeg') }}" alt="branding logo"
                                            style="max-width: 200px">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Login to UMKM HOKIMA</span>
                                    </h6>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-danger mb-2" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                @if ($errors->has('email'))
                                                    <div class="alert alert-danger mb-2" role="alert">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                                <input type="text" class="form-control input-lg" id="email"
                                                    name="email" placeholder="Your Email" tabindex="1" required
                                                    data-validation-required-message="Please enter your email.">
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>

                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control input-lg" id="password"
                                                    name="password" placeholder="Enter Password" tabindex="2"
                                                    required
                                                    data-validation-required-message="Please enter valid passwords.">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                                {{-- @if ($errors->has('password'))
                                                    <div class="alert alert-danger mb-2" role="alert">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif --}}
                                            </fieldset>

                                            <button type="submit" class="btn btn-danger btn-block btn-lg"><i
                                                    class="ft-unlock"></i> Login</button>
                                            <a class="btn btn-primary btn-block btn-lg"
                                                href="{{ route('register') }}">Daftar</a>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('../assets/backsite/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('../assets/backsite/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}">
    </script>
    <script src="{{ asset('../assets/backsite/app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('../assets/backsite/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('../assets/backsite/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('../assets/backsite/app-assets/js/scripts/forms/form-login-register.js') }}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
