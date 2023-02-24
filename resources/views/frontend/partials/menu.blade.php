<ul class="navigation-main d-inline nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="dropdown nav-item" data-menu="dropdown">
        <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown">
            <i class="ft-bar-chart-2"></i>
            <span data-i18n="Dashboard">MMN</span>
        </a>
        <ul class="dropdown-menu">
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('mmn-harian') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Harian</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('mmn-gerbang-harian') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Harian Gerbang</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('mmn-bulanan') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Bulanan</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('mmn-komposisi') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Komposisi Gerbang dan Golongan</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('mmn-traffic-history') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Traffic History</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown nav-item" data-menu="dropdown">
        <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown">
            <i class="ft-bar-chart-2"></i>
            <span data-i18n="Dashboard">JTSE</span>
        </a>
        <ul class="dropdown-menu">
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('jtse-harian') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Harian</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('jtse-gerbang-harian') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Harian Gerbang</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('jtse-bulanan') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Lalu Lintas Bulanan</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('jtse-komposisi') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Komposisi Gerbang dan Golongan</span>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('jtse-traffic-history') }}" data-toggle="dropdown">
                    <span data-i18n="Dashboard 2">Traffic History</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class=" nav-link d-flex align-items-center" href="/map">
            <i class="ft-map"></i>
            <span data-i18n="Dashboard">Tol Map</span>
        </a>
    </li>
    <li class="nav-item">
        <a class=" nav-link d-flex align-items-center" href="/cctv">
            <i class="ft-video"></i>
            <span data-i18n="Dashboard">CCTV</span>
        </a>
    </li>
</ul>

<!--     
@guest
<ul class="navigation-main d-inline nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item">
        <a class="nav-link align-items-center red" id="red" href="{{ route('login') }}">
            <i class="ft-log-in"></i>
            <span data-i18n="billboard">Login</span>
        </a>
    </li>
</ul>
@else -->

<ul class="navigation-main d-inline nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
    
<li class="dropdown nav-item" data-menu="dropdown">
        <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown">
            <!-- <i class="ft-arrow-chart-2"></i> -->
            <span data-i18n="Dashboard">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('forget.password.get') }}" data-toggle="dropdown">
                    <div class="d-flex align-items-center">
                        <i class="ft-arrow-right mr-2"></i>
                        <span>Reset Password</span>
                    </div>
                </a>
            </li>
            <li data-menu="">
                <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="dropdown">
                <div class="d-flex align-items-center">
                    <i class="ft-power mr-2"></i>
                    <span>Logout</span>
                </div>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </li>

@endguest
    