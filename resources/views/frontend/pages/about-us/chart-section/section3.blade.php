<style>
    @media only screen and (max-width: 767px) {
        /* For tablets: */
    /* .scr-phone {display: inline;} */
    .traffic-phone{width: 650px;}
    .title-phone{font-size: 20px;}
    }
</style>

<div class="bg-white rounded shadow p-4">
    <h3 class="title-phone"><strong>{{ $chartTitle3 }}</strong></h3>
    <h6>Update {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
    
    <div class="row align-items-center">
        
        {{-- chart --}}
        <div class="container align-items-center col-10" style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
        
        <div class="traffic-phone">

                {!! $graph3->container() !!}
              </div>
    </div>
    
        {{-- description --}}
        <div class="col">
            <h6>LHR YTD Aktual</h6>
            <h1><strong>{{ $chart3->getLhrYtd('curr', $currentYear) }}</strong></h1>
            <br>
            
            <div class="col">
                
            <div class="row justify-content-start">
                
            <h6>Aktual {{ $prevYear }}</h6>
            </div>
            
            <div class="row justify-content-start">
                <h4 class=""><strong>{{ $chart3->getLhrYtd('prev', $currentYear) }}</strong></h4>
                @if($chart3->getGrowth($currentYear) <= 0)
                    <span class="col p-0 text-danger">    &#9660; {{ $chart3->getGrowth($currentYear) }} %</span>
                @else
                    <span class="col p-0 text-success">    &#9650; {{ $chart3->getGrowth($currentYear) }} %</span>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="{{ $graph3->cdn() }}"></script>

{{ $graph3->script() }}