<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Registrasi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
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
                    <!--Registration Page Starts-->
                    <section id="regestration" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                                    <img src="{{ asset('apexnew/app-assets/img/Logo_MMN_JTSE.png')}}" alt="" class="img-fluid" width="350" height="230">
                                                </div>
                                                <div class="col-lg-6 col-md-12 px-4 py-3">
                                                    <form method="post" action="{{route('register')}}">
                                                        @csrf
                                                        <h4 class="card-title mb-2">Buat Akun Membership</h4>
                                                        <p>Mohon isi formulir diatas untuk membuat akun membership.</p>
                                                        <input type="text" class="form-control mb-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nama lengkap">
                                                        <input type="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="Email" name="email">
                                                        <textarea placeholder="Masukan alamat anda sesuai KTP" cols="40" rows="3" name="alamat" class="form-control mb-2" required></textarea>
                                                        <input type="text" name="no_telp" class="form-control mb-2" placeholder="No Handphone" required>
                                                        <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="Password minimal 6 karakter" name="password">
                                                        <input type="password" class="form-control mb-2" placeholder="Konfirmasi password" name="password_confirmation" required autocomplete="new-password">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a href="{{route('login')}}" class="btn bg-light-primary mb-2 mb-sm-0">Kembali ke awal</a>
                                                            <button type="submit" class="btn btn-primary">Registrasi</button>
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
                    <!--Registration Page Ends-->

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