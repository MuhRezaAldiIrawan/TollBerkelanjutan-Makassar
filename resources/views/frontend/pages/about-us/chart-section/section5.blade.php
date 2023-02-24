<style>
    @media only screen and (max-width: 767px) {
        /* For tablets: */
    /* .scr-phone {display: inline;} */
    .scr-pc {display: none;}
    .traffic-phone{width: 650px;}
    .title-phone{font-size: 20px;}
    }

    @media only screen and (min-width: 767px) {
        /* For tablets: */
    .scr-phone {display: none;}
    /* .scr-pc {display: inline;} */
    }
</style>


<div class="bg-white rounded shadow p-4">
        <h3 class="title-phone"><strong>{{ $chartTitle6 }}</strong></h3>

    {{-- chart --}}

    <div class="container">
        <div class="container align-items-center" align="center" style="overflow: auto; white-space: nowrap;">
            <div class="align-items-center traffic-phone">
                {!! $chart6->container() !!}
            </div>
        </div>
        <br><br>
        <div class="">
            <table class="table table-hover">
                    <thead>
                        <tr class="scr-pc">
                            <th scope="col-9">Tahun</th>
                            <th scope="col-1">Deskripsi</th>
                        </tr>
                    </thead>

                <tbody>

                    @foreach($data as $row)
                        <tr class="scr-pc">
                            <th scope="row">{{ $row->title }}</th>
                            <td>{!!  $row->content  !!}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <table class="table table-hover">
                    @foreach($data as $row)
                        <thead>
                            <tr class="align-items-center scr-phone" align="center">
                                <th scope="col-9">Tahun {{ $row->title }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="scr-phone">
                                <td scope="col-9">{!!  $row->content  !!}</td>
                            </tr>
                        </tbody>
                    @endforeach
            </table>

        </div>
    </div>
</div>

<script src="{{ $chart6->cdn() }}"></script>

{{ $chart6->script() }}