<div data-active-color="white" data-background-color="info" data-image="{{ asset('apex/img/sidebar-bg/01.jpg') }}" class="app-sidebar">
  <!-- main menu header-->
  <!-- Sidebar Header starts-->
  <div class="sidebar-header">
    <div class="logo clearfix">
      <a href="#" class="logo-text float-center">
        <div class="logo-img">
          <img src="{{ asset('apex/img/logo_bsd.png') }}"/>
        </div>
      </a>
      <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a>
      <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a>
    </div>
  </div>
  <!-- Sidebar Header Ends-->
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="sidebar-content">
    <div class="nav-container">
      <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">

        <!-- BEGIN : HOME -->
        <li class="nav-item">
          <a href="{{ '/' }}">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Home</span>
          </a>
        </li>
        <!-- END : HOME -->

        <!-- BEGIN : Live CCTV -->
        <li class="nav-item">
          <a href="#">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Live CCTV</span>
          </a>
        </li>
        <!-- END : Live CCTV -->

        <!-- BEGIN : Cetak Struk -->
        <li class="nav-item">
          <a href="{{ '/struk' }}">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Cetak Struk</span>
          </a>
        </li>
        <!-- END : Cetak Struk -->

        <!-- BEGIN : Info Tarif -->
        <li class="nav-item">
          <a href="{{ '/tarif' }}">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Info Tarif</span>
          </a>
        </li>
        <!-- END : Info Tarif -->

        <!-- BEGIN : Maps -->
        <li class="nav-item">
          <a href="#">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Maps</span>
          </a>
        </li>
        <!-- END : Maps -->

        <!-- BEGIN : Nearby Location -->
        <li class="nav-item">
          <a href="{{ '/nearby' }}">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Nearby Location</span>
          </a>
        </li>
        <!-- END : Nearby Location -->

        <!-- BEGIN : Billboard -->
        <li class="nav-item">
          <a href="{{ '/billboard' }}">
            <i class="icon-camera"></i>
            <span data-i18n="" class="menu-title">Billboard</span>
          </a>
        </li>
        <!-- END : Billboard -->

      </ul>
    </div>
  </div>
  <!-- main menu content-->
  <div class="sidebar-background"></div>
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>