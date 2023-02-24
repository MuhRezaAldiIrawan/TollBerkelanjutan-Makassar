<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="keywords" content="BSD Toll Application">
    <meta name="author" content="IT BSD TOLL">
    <title>MMN & JTSE Toll</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="css/app.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/vendors/css/swiper.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/themes/layout-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/plugins/switchery.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/page-gallery.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/page-user-profile.css') }}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/app-assets/css/core/menu/horizontal-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/page-faq.css') }}">
    <link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/ex-component-swiper.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('apexnew/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('apexnew/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('apexnew/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('apexnew/app-assets/js/flashphoner.js') }}"></script>
    {{-- bootstrap 5 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    

</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
 
<body onload="init_api()" class="horizontal-layout horizontal-menu-padding navbar-sticky pace-done vertical-layout vertical-overlay-menu fixed-navbar menu-hide" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    @include('frontend.partials.navbar')
    <!-- Navbar (Header) Ends-->


    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="m-0 p-0 header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-shadow menu-border navbar-brand-center" role="navigation" data-menu="menu-wrapper">
            <!-- Horizontal menu content-->
            <div class="main-menu-content center-layout container p-0" data-menu="menu-container">
                @include('frontend.partials.menu')
            </div>
        </div>
        
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    
                    <!-- Main content -->
                    @yield('content')
                    {{ isset($slot) ? $slot : null }}
                    <!-- /.content -->

                </div>
            </div>
            <!-- END : End Main Content-->
             @include('frontend.partials.footer')
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
        {{-- @include('frontend.partials.modal') --}}
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- END Notification Sidebar-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('apex/vendors/js/core/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apex/vendors/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apex/vendors/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apex/vendors/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('apexnew/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/switchery.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apexnew/app-assets/js/data-tables/datatable-basic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('apexnew/app-assets/js/data-tables/datatable-styling.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('apexnew/app-assets/vendors/js/chartist.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/swiper.min.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/vendors/js/horizontal-timeline.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{ asset('apexnew/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/customizer.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/scroll-top.js') }}"></script>
    <script src="{{ asset('apex/vendors/js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="{{ asset('apexnew/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('apexnew/app-assets/js/ex-component-swiper.js') }}"></script>
    <!-- <script src="{{ asset('apexnew/app-assets/js/page-faq.js') }}"></script> -->
    <!-- END: Custom CSS-->
    <!-- daterangepicker -->
    <script src="{{asset('apexnew/moment/moment.min.js')}}"></script>
    <script src="{{asset('apexnew/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('apexnew/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('apexnew/app-assets/js/page-user-profile.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.alert').fadeTo(2000,500).slideUp(500, function(){
                $(this).slideUp(500)
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var count = $('.item-row').length
            // console.log(count)
            $('#addRow').click(function(){
                count++
                var html = ''
                html += '<tr>'
                html += '<td>'
                html += '<div class="checkbox auth-checkbox"><input type="checkbox" class="item-row" id="auth-ligin_'+count+'" class="item-row"><label for="auth-ligin_'+count+'"></label></div>'
                html += '</td>'
                html += '<td><select class="form-control" name="bank[]" id="bank_'+count+'" required><option selected="true" disabled>Pilih Bank</option>@foreach($data_bank as $dc) <option value="{{$dc->id}}">{{$dc->bank}}</option> @endforeach</select></td>'
                html += '<td>'
                html += '<input type="text" name="kartu[]" placeholder="Masukan Nomor Kartu Anda" class="form-control" id="kartu_'+count+'" required>'
                html += '</td>'
                html += '</tr>'
                $('#myTable').append(html)
            })

            $('#removeRow').click(function(){
                $('.item-row:checked').each(function(){
                    $(this).closest('tr').remove()
                })
            })

            $(".modal").on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset()
            })
        })
    </script>
    <script type="text/javascript">
            var csrfToken = $('[name="csrf_token"]').attr('content');
            
            setInterval(refreshToken, 3600000); // 1 hour 
            
            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 3600000); // 1 hour 

        </script>
    
    @stack('scripts')
</body>
<!-- END : Body-->

</html>
