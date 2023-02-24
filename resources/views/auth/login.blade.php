<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Traffic Toll Makassar">
    <meta name="keywords" content="Traffic Toll Makassar">
    <meta name="author" content="Traffic Toll Makassar">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('uploads/2022-06/mmn.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/switchery.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/themes/layout-dark.css')}}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/plugins/switchery.css')}}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/core/menu/horizontal-menu.css')}}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/authentication.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column auth-page navbar-sticky blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @elseif($message = Session::get('danger'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @elseif($message = Session::get('info'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <section id="login" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                    <img src="{{asset('apexnew/app-assets/img/Logo_MMN_JTSE.png')}}" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-6 col-12 px-4 py-3">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session()->get('message') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                @endif
                                                    <form method="POST" action="{{route('login')}}">
                                                        @csrf
                                                        <h4 class="mb-2 card-title">Login</h4>
                                                        <p>Selamat Datang di Website Traffic Tol Makassar</p>
                                                        <input type="text" class="form-control mb-3" placeholder="Email" name="email">
                                                        <input type="password" class="form-control mb-2" placeholder="Password" name="password">
                                                        <!-- <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                            {{-- <a href="{{route('home')}}">Kembali ke halaman utama</a> --}}
                                                            <a href="auth-forgot-password.html" style="visibility: hidden;">Lupa Password?</a>
                                                        </div> -->
                                                        <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                            <label>
                                                                <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a href="/admin/login" class="btn bg-light-primary mb-2 mb-sm-0">Admin</a>
                                                            <button type="submit" class="btn btn-primary">Masuk</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Login Page Ends-->
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('apexnew/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/switchery.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{ asset('apexnew/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('apexnew/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('apexnew/app-assets/js/notification-sidebar.js')}}"></script>
    <script src="{{ asset('apexnew/app-assets/js/customizer.js')}}"></script>
    <script src="{{ asset('apexnew/app-assets/js/scroll-top.js')}}"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="{{ asset('apexnew/assets/js/scripts.js')}}"></script>
    <!-- END: Custom CSS-->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.alert').fadeTo(2000,500).slideUp(500, function(){
                $(this).slideUp(500)
            })
        })
    </script>
</body>
<!-- END : Body-->

</html>