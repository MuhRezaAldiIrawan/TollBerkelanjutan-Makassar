<style>
    @media only screen and (max-width: 767px) {
        /* For tablets: */
    /* .scr-phone {display: inline;} */
    .traffic-phone{width: 650px;}
    .title-phone{font-size: 20px;}
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
    <h3 class="title-phone"><strong>{{ $chartTitle2 }}</strong></h3>
    <h6>Periode {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
    
    <label class="dropdown">
    
        <div class="dd-button">
            @if (Request::segment(2))
            {{ ucwords(strtolower(str_replace('-', ' ', Request::segment(2)))) }}
            @else
            {{ ucwords(strtolower($gate)) }}
            @endif
        </div>
    
        <input type="checkbox" class="dd-input" id="test">
    
        <ul class="dd-menu">
            @foreach ($gateList as $gates)
            <li><a  href="/{{ strtolower($company) }}-gerbang-harian/{{ strtolower($gates) }}">{{
                    str_replace('-', ' ', $gates) }}</a></li>
            @endforeach
        </ul>
    
    </label>
    {{-- dropdown --}}
    {{-- <div class="d-flex flex-row">
        <div class="dropdown mr-2">
            <button class="btn light dark border border-1 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                @if (Request::segment(2))
                {{ ucwords(strtolower(str_replace('-', ' ', Request::segment(2)))) }}
                @else
                {{ ucwords(strtolower($gate)) }}
                @endif
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($gateList as $gates)
                    <li><a class="dropdown-item" href="/{{ strtolower($company) }}-gerbang-harian/{{ strtolower($gates) }}">{{ str_replace('-', ' ', $gates) }}</a></li>
                @endforeach
                {{-- <li><a class="dropdown-item" href="/mmn-gerbang-harian/cambaya">Cambaya</a></li>
                <li><a class="dropdown-item" href="/mmn-gerbang-harian/parangloe">Parangloe</a></li>
                <li><a class="dropdown-item" href="/mmn-gerbang-harian/kaluku-bodoa">Kaluku Bodoa</a></li>
                <li><a class="dropdown-item" href="/mmn-gerbang-harian/tallo-timur">Tallo Timur</a></li>
                <li><a class="dropdown-item" href="/mmn-gerbang-harian/tallo-barat">Tallo Barat</a></li> --}}
            {{-- </ul>
        </div>
    </div>  --}}
    <div class="row align-items-center">
        {{-- header --}}
        
        {{-- chart --}}
        <div class="container align-items-center col-10" style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
        
        <div class="traffic-phone">

                {!! $graph2->container() !!}
              </div>
    </div>
    
        {{-- description --}}
        <div class="col">
            <h6>LHR Gerbang Terkini</h6>
            <h1><strong>{{ $chart2->getLhrData(date('Y', strtotime($currentdate)), date('m', strtotime($currentdate)), $gate) }}</strong></h1>
            <br>
            
            <div class="col">
                
            <div class="row justify-content-start">
            <h6>{{ str_replace('-', ' ', date('M-Y', strtotime($currentYear . '-' .  $currentMonthNumber . '-' . '01' . '-1 year'))) }}</h6>
            </div>
            
            <div class="row justify-content-start">
                <h4 class=""><strong>{{ $chart2->getLhrData(date('Y', strtotime($lastyear)), date('m', strtotime($lastyear)), $gate) }}</strong></h4>
                @if($chart2->getGrowth('year', $currentYear, $currentMonthNumber, $gate) <= 0)
                    <span class="col p-0 text-danger">    &#9660; {{ abs($chart2->getGrowth('year', $currentYear, $currentMonthNumber, $gate)) }}%</span>  
                @else
                    <span class="col p-0 text-success">    &#9650; {{ abs($chart2->getGrowth('year', $currentYear, $currentMonthNumber, $gate)) }}%</span>
                @endif
            </div>
            </div>
            

            <div class="col">
                
            <div class="row justify-content-start">
            <h6>{{ str_replace('-', ' ', date('M-Y', strtotime($currentYear . '-' .  $currentMonthNumber . '-' . '01' . '-1 month'))) }}</h6>
            </div>
            <div class="row">
                <h4 class=""><strong>{{ $chart2->getLhrData(date('Y', strtotime($lastmonth)), date('m', strtotime($lastmonth)), $gate) }}</strong></h4>
                @if($chart2->getGrowth('month', $currentYear, $currentMonthNumber, $gate) <= 0)
                    <span class="col p-0 text-danger">    &#9660; {{ abs($chart2->getGrowth('month', $currentYear, $currentMonthNumber, $gate)) }}%</span>  
                @else
                    <span class="col p-0 text-success">    &#9650; {{ abs($chart2->getGrowth('month', $currentYear, $currentMonthNumber, $gate)) }}%</span>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="{{ $graph2->cdn() }}"></script>

{{ $graph2->script() }}