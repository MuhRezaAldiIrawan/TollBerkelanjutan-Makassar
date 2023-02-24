<style>
    @media only screen and (max-width: 767px) {

        /* For tablets: */
        /* .scr-phone {display: inline;} */
        .traffic-phone1 {
            width: 650px;
        }

        .title-phone {
            font-size: 20px;
        }
    }


    a {
        text-decoration: none;
        color: #000000;
    }

    a:hover {
        color: #222222
    }

    /* Dropdown */

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .dd-button {
        display: inline-block;
        border: 2px solid rgb(216, 216, 216);
        border-radius: 4px;
        padding: 10px 30px 10px 20px;
        background-color: #ffffff;
        cursor: pointer;
        white-space: nowrap;
    }

    .dd-button:after {
        content: '';
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid black;
    }

    .dd-button:hover {
        background-color: #eeeeee;
    }


    .dd-input {
        display: none;
    }

    .dd-menu {
        position: absolute;
        z-index: 1;
        top: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 0;
        margin: 2px 0 0 0;
        box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        list-style-type: none;
    }

    .dd-input+.dd-menu {
        display: none;
    }

    .dd-input:checked+.dd-menu {
        display: block;
    }

    .dd-menu li {
        padding: 10px 20px;
        cursor: pointer;
        white-space: nowrap;
    }

    .dd-menu li:hover {
        background-color: #f6f6f6;
    }

    .dd-menu li a {
        display: block;
        margin: -10px -20px;
        padding: 10px 20px;
    }

    .dd-menu li.divider {
        padding: 0;
        border-bottom: 1px solid #cccccc;
    }
</style>

<div class="bg-white rounded shadow p-4">
    {{-- header --}}
    <h3 class="title-phone"><strong>{{ $chartTitle }}</strong></h3>
    <h6 id="subtitle">Periode {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
    {{-- end header --}}


    <label class="dropdown">

        <div class="dd-button">
            @if (Request::segment(2))
            {{ date('F', mktime(0, 0, 0, Request::segment(2))) }}
            @else
            {{ $currentMonthFullName }}
            @endif
        </div>

        <input type="checkbox" class="dd-input" id="test">

        <ul class="dd-menu">
            @foreach ($listMonth as $month)
            <li>
                <a href="/{{ strtolower($company) }}-harian/{{ $month->bulan }}">{{
                    $month->nama_bulan }}</a>
            </li>
            @endforeach
        </ul>

    </label>
    {{-- dropdown --}}
    {{-- <div class="d-flex flex-row">
        <div class="dropdown">
            <button class="btn light dark border border-1 dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if (Request::segment(2))
                {{ date('F', mktime(0, 0, 0, Request::segment(2))) }}
                @else
                {{ $currentMonthFullName }}
                @endif
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($listMonth as $month)
                <li>
                    <a class="dropdown-item" href="/{{ strtolower($company) }}-harian/{{ $month->bulan }}">{{
                        $month->nama_bulan }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div> --}}
    {{-- end dropdown --}}

    <div class="row align-items-center">
        {{-- chart --}}
        <div class="container align-items-center col-10"
            style="overflow: auto; white-space: nowrap; overflow-y: hidden;">

            <div class="traffic-phone1">

                {!! $graph->container() !!}
            </div>
        </div>

        {{-- end chart --}}

        {{-- description --}}
        <div class="col">
            {{-- LHR Terkini --}}
            <h6>LHR Terkini</h6>
            <h1><strong id="lhr-terkini">{{ $chart->getLhrData(date('Y', strtotime($currentdate)), date('m',
                    strtotime($currentdate))) }}</strong></h1>
            <br>
            {{-- end LHR Terkini --}}


            {{-- LHR Last Year --}}
            <div class="col">
                <div class="row justify-content-start">
                    <h6 id="lhr-last-year-title">{{ str_replace('-', ' ', date('M-Y', strtotime($currentYear . '-' .
                        $currentMonthNumber . '-' . '01' . '-1 year'))) }}</h6>
                </div>
                <div class="row justify-content-start">
                    <h4 class=""><strong id="lhr-last-year">{{ $chart->getLhrData(date('Y', strtotime($lastyear)),
                            date('m', strtotime($lastyear))) }}</strong></h4>
                    @if( $chart->getGrowth('year', $currentYear, $currentMonthNumber) <= 0) <span id="growth"
                        class="col p-0 text-danger"> &#9660; {{ abs($chart->getGrowth('year', $currentYear,
                        $currentMonthNumber)) }}%</span>
                        @else
                        <span id="growth" class="col p-0 text-success"> &#9650; {{ abs($chart->getGrowth('year',
                            $currentYear, $currentMonthNumber)) }}%</span>
                        @endif
                </div>
            </div>
            {{-- end LHR last year --}}


            {{-- Lhr last month --}}
            <div class="col">
                <div class="row justify-content-start">
                    <h6 id="lhr-last-month-title">{{ str_replace('-', ' ', date('M-Y', strtotime($currentYear . '-' .
                        $currentMonthNumber . '-' . '01' . '-1 month'))) }} </h6>
                </div>
                <div class="row">
                    <h4 class=""><strong id="lhr-last-month">{{ $chart->getLhrData(date('Y', strtotime($lastmonth)),
                            date('m', strtotime($lastmonth))) }}</strong></h4>
                    @if( $chart->getGrowth('month', $currentYear, $currentMonthNumber) <= 0) <span id="growth"
                        class="col p-0 text-danger"> &#9660; {{ abs($chart->getGrowth('month', $currentYear,
                        $currentMonthNumber)) }}%</span>
                        @else
                        <span id="growth" class="col p-0 text-success"> &#9650; {{ abs($chart->getGrowth('month',
                            $currentYear, $currentMonthNumber)) }}%</span>
                        @endif
                </div>
            </div>
            {{-- end LHR last month --}}

        </div>
        {{-- end description --}}

    </div>
</div>

{{-- Function --}}
<script src="{{ $graph->cdn() }}"></script>
{{-- end function --}}

{{ $graph->script() }}