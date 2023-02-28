<style>
    @media only screen and (max-width: 767px) {
    
    /* For tablets: */
    /* .scr-phone {display: inline;} */
    .traffic-phone1 {
    width: 650px;
    }
    
    /*.title-phone {*/
    /*font-size: 20px;*/
    /*}*/
    }

    @media only screen and (max-width: 555px) {
        .title-phone2 {
        font-size: 15px;
        }
        .title-phone3 {
        font-size: 12px;
        }
        .table-phone{
            overflow: auto; 
            white-space: nowrap; 
            overflow-y: hidden; 
            width: 510px;
        }
        .title-perbandingan{
            font-size: 20px;
        }
    }
</style>

    <div class="row m-0 justify-content-between">
        <div class=" col p-4 bg-white rounded shadow ">
            <h3 class="title-phone"><strong>{{ $chartTitle4 }}</strong></h3>
            <h6>Periode {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
            {!! $graph4->container() !!} <br><br>
            <h3 class="title-perbandingan"><strong>Perbandingan Per Gerbang</strong></h3>
            <h6>{{ $currentYear }} vs {{ $prevYear }}</h6><br>
            <div class="container align-items-center table-phone col">
            <table class="table table-hover table-sm text-small  text-wrap title-phone2">
                <thead>
                    <tr>
                        <th scope="col-9"></th>
                        @foreach ($chart4->getGraphData('Mobil', 'curr', $currentYear, $currentMonthNumber) as $Mobil)
                            <th scope="col-1" style="font-size: 12px;"class="test">{{ $Mobil }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="test">{{ $currentYear }}</th>
                        @foreach ($chart4->getGraphData('percentage', 'curr', $currentYear, $currentMonthNumber) as $percentage)
                            <td class="test">{{ $percentage }}%</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row" class="test">{{ $prevYear }}</th>
                        @foreach ($chart4->getGraphData('percentage', 'prev', $currentYear, $currentMonthNumber) as $percentage)
                            <td class="test">{{ $percentage }}%</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="container align-items-center col-10" style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
            
                {{-- <div class="traffic-phone1">
                    {!! $chart7->container() !!}
                </div> --}}
            </div>
        </div>


        {{-- <div class="col p-4 bg-white rounded shadow">
            <h3 class="title-perbandingan"><strong>{{ $chartTitle5 }}</strong></h3>
            <h6>Periode {{ $currentMonthFullName }} {{ $currentYear }}</h6><br>
            {!! $graph5->container() !!} <br><br>
            <h3 class="title-perbandingan"><strong>Perbandingan Per Golongan</strong></h3>
            <h6>{{ $currentYear }} vs {{ $prevYear }}</h6><br>
            <table class="table table-hover table-sm text-small">
                <thead>
                    <tr>
                        <th scope="col-9"></th>
                        @foreach ($chart5->getGraphData('class', 'curr', $currentYear, $currentMonthNumber) as $class)
                            <th scope="col-1" class="test title-phone3" >{{ $class }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="test">{{ $currentYear }}</th>
                        @foreach ($chart5->getGraphData('percentage', 'curr', $currentYear, $currentMonthNumber) as $percentage)
                            <td class="test">{{ $percentage }}%</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row" class="test">{{ $prevYear }}</th>
                        @foreach ($chart5->getGraphData('percentage', 'prev', $currentYear, $currentMonthNumber) as $percentage)
                            <td class="test">{{ $percentage }}%</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <div class="container align-items-center col-10" style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
            
                <div class="traffic-phone1">
                    {!! $chart8->container() !!}
                </div>
            </div>
        </div>
    </div>

<script src="{{ $graph4->cdn() }}"></script>
<script src="{{ $graph5->cdn() }}"></script>
<script src="{{ $chart7->cdn() }}"></script>
<script src="{{ $chart8->cdn() }}"></script>

{{ $graph4->script() }}
{{ $graph5->script() }}
{{ $chart7->script() }}
{{ $chart8->script() }} --}}