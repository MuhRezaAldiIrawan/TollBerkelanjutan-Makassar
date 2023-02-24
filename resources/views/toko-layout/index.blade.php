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
    <title>Dashboard1 - Apex responsive bootstrap 4 admin template</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('apexnew/img/logo_bsd_white.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('apexnew/img/logo_bsd_white.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/swiper.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/themes/layout-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/plugins/switchery.css') }}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/core/menu/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/ex-component-swiper.css') }}">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard1.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  navbar-sticky" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
                    <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                            <input class="input" type="text" placeholder="Explore Apex..." tabindex="0" data-search="template-search">
                            <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li> -->
                </ul>
                <div class="navbar-brand-center">
                    <div class="navbar-header">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="logo"><a class="logo-text" href="index.html">
                                        <div class="logo-img"><img class="logo-img" alt="Apex logo" src="{{ asset('apexnew/app-assets/img/logo-dark.png') }}"></div><span class="text">APEX</span>
                                    </a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
			<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-shadow menu-border navbar-brand-center" role="navigation" data-menu="menu-wrapper">
				<div class="navbar-container main-menu-content center-layout" data-menu="menu-container">
					<!-- include ../../../includes/mixins-->
<ul class="navigation-main nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{ route('home') }}">
            <i class="ft-home"></i>
            <span data-i18n="Home">Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{route('cctv')}}">
            <i class="ft-box"></i>
            <span data-i18n="cctv">Live CCTV</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{ route('struk') }}">
            <i class="ft-aperture"></i>
            <span data-i18n="struk">Cetak Struk</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{ route('tarif') }}">
            <i class="ft-aperture"></i>
            <span data-i18n="tarif">Info Tarif</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="#">
            <i class="ft-aperture"></i>
            <span data-i18n="maps">Maps</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{ route('nearby') }}">
            <i class="ft-aperture"></i>
            <span data-i18n="nearby">Nearby Location</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" href="{{ route('billboard') }}">
            <i class="icon-camera"></i>
            <span data-i18n="billboard">Billboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center" target="_blank" href="{{ route('tes') }}">
            <i class="icon-camera"></i>
            <span data-i18n="billboard">Tampilan Tokopedia</span>
        </a>
    </li>
</ul>
    
				</div>
			</div>
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!-- autoplay swiper start -->
                    <section id="swiper-autoplay">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="swiper-autoplay swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-20.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-7.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-8.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-9.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-10.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-11.jpg')}}" alt="banner"></div>
                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- autoplay swiper ends -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold-700">Kategori</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <div class="swiper-responsive-breakpoints swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-30.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-31.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-32.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-33.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-34.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-35.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-36.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-37.jpg')}}" alt="banner"></div>
                                                    <div class="swiper-slide"><img class="img-fluid" src="{{ asset('apexnew/app-assets/img/banner/banner-38.jpg')}}" alt="banner"></div>
                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
						<div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold-700">Kategori</h3>
                                </div>
                                <div class="card-content">
                                        <div class="card-body py-0">
                                            <div class="swiper-centered-slides swiper-container p-3">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide rounded swiper-shadow"><i class="fa fa-google font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Home</div>
                                                    </div>
                                                    <div class="swiper-slide rounded swiper-shadow"><i class="fa fa-facebook font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Live CCTV</div>
                                                    </div>
                                                    <div class="swiper-slide rounded swiper-shadow"><i class="fa fa-twitter font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Cetak Struk</div>
                                                    </div>
                                                    <div class="swiper-slide rounded swiper-shadow"><i class="fa fa-instagram font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Info Tarif</div>
                                                    </div>
                                                    <div class="swiper-slide rounded swiper-shadow"><i class="fa fa-google font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Maps</div>
                                                    </div>
													<div class="swiper-slide rounded swiper-shadow"><i class="fa fa-google font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Nearby Location</div>
                                                    </div>
													<div class="swiper-slide rounded swiper-shadow"><i class="fa fa-google font-large-1"></i>
                                                        <div class="swiper-text pt-md-2 pt-sm-1">Billboard</div>
                                                    </div>
                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold-700">Top Up & Tagihan</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">Active</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">Link</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="click-tab" data-toggle="tab" href="#click" aria-controls="click" aria-expanded="false">Click</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="linkOpt-tab" data-toggle="tab" href="#linkOpt" aria-controls="linkOpt">Another
                                                        Link</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active show" id="active" aria-labelledby="active-tab" aria-expanded="true">
                                                    <p class="m-0">Macaroon candy canes tootsie roll wafer lemon drops liquorice jelly-o tootsie roll cake. Marzipan liquorice soufflé cotton candy jelly cake jelly-o sugar plum marshmallow. Dessert cotton candy macaroon chocolate sugar plum cake donut.</p>
                                                </div>
                                                <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                                                    <p class="m-0">Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie. Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit tiramisu.</p>
                                                </div>
                                                <div class="tab-pane" id="click" role="tabpanel" aria-labelledby="click-tab" aria-expanded="false">
                                                    <p class="m-0">Fruitcake marshmallow donut wafer pastry chocolate topping cake. Powder powder gummi bears jelly beans. Gingerbread cake chocolate lollipop. Jelly oat cake pastry marshmallow sesame snaps.</p>
                                                </div>
                                                <div class="tab-pane" id="linkOpt" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
                                                    <p class="m-0">Cookie icing tootsie roll cupcake jelly-o sesame snaps. Gummies cookie dragée cake jelly marzipan donut pie macaroon. Gingerbread powder chocolate cake icing. Cheesecake gummi bears ice cream marzipan.</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
					<div class="row">
                            <div class="col-12">
                                <div class="card-deck-wrapper">
                                    <div class="card-deck">
                                        <div class="card">
                                            <div class="card-content">
                                                <img class="card-img-top img-fluid" src="{{ asset('apexnew/app-assets/img/photos/05.jpg')}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ini Nearby Location 1</h4>
                                                    <p class="card-text">Nearby Location 1.</p>
                                                </div>
                                            </div>
                                            <div class="card-footer pt-0">
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-content">
                                                <img class="img-fluid" src="{{ asset('apexnew/app-assets/img/photos/09.jpg')}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ini Nearby Location 2</h4>
                                                    <p class="card-text">Nearby Location 2.</p>
                                                </div>
                                            </div>
                                            <div class="card-footer pt-0">
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-content">
                                                <img class="img-fluid" src="{{ asset('apexnew/app-assets/img/photos/10.jpg')}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ini Nearby Location 3</h4>
                                                    <p class="card-text">Nearby Location 3.</p>
                                                </div>
                                            </div>
                                            <div class="card-footer pt-0">
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-content">
                                                <img class="card-img-top img-fluid" src="{{ asset('apexnew/app-assets/img/photos/03.jpg')}}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Ini Nearby Location 4</h4>
                                                    <p class="card-text">Nearby Location 4.</p>
                                                </div>
                                            </div>
                                            <div class="card-footer pt-0">
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                </div>
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank">PIXINVENT</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('apexnew/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/switchery.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('apexnew/app-assets/vendors/js/chartist.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/swiper.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{ asset('apexnew/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/customizer.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/scroll-top.js') }}"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/dashboard1.js"></script>
    <script src="{{ asset('apexnew/app-assets/js/ex-component-swiper.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="{{ asset('apexnew/assets/js/scripts.js') }}"></script>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>