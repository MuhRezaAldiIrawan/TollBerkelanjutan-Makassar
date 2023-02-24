@extends('frontend.layouts.layout')
@section('content')

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card">
                <div class="user-profile-images">
                    <div class="swiper-autoplay swiper-container">
                        <div class="swiper-wrapper">
                        @foreach($banner as $b)
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-top user-timeline-image align-self-center" src="{{ asset($b->image)}}" alt="banner">
                            </div>
                        @endforeach
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
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div id="map-contact" style="width: auto; height: 240px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{route('struk')}}" target="struk">
                        <div class="card white font-small-3" style="background-color: #b90008;">
                            <div class="card-content">
                                <div class="card-body p-2 text-center">
                                    <h3><i class="fa fa-file-text-o white"></i></h3>
                                    <p><h4 class="white">Cetak Struk</h4></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-sm-6">
                    <a href="#" target="maintenance">
                        <div class="card font-small-1">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left">
                                            <i class="fa fa-video-camera font-large-1"></i>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <h3 class="card-title float-right">Live CCTV</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>  -->
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title blue text-center">
                                Instagram
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-2">
                                <h4 class="text-center blue"><i class="fa fa-instagram"></i></h4>
                                <p class="text-center blue">@infotolmakassar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title blue text-center">
                                Twitter
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-2">
                                <h4 class="text-center blue"><i class="fa fa-twitter"></i></h4>
                                <p class="text-center blue">@infotolmakassar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title blue text-center">
                                Call Center
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-2">
                                <h4 class="text-center blue"><i class="ft-phone"></i></h4>
                                <p class="text-center blue">1500722</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>  
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        
        <div class="col-sm-1"></div>
        <div class="col-md-4 col-12">
            <div class="card card-outline-info box-shadow-0">
                <div class="card-header">
                    <h3 class="card-title">
                        Artikel
                    </h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="swiper-autoplay swiper-container">
                            <div class="swiper-wrapper">
                            @foreach($media as $m)
                                <div class="swiper-slide">
                                    <img class="card-img-top img-fluid height-300 text-center" src="{{ url($m->image)}}" alt="banner">
                                <p></p>
                                    <div class="mb-2 text-center">
                                        <button type="button" class="btn gradient-purple-bliss shadow-z-1-hover"><a class="white" href="{{route('media-detail',['id'=>$m->id])}}">{{ $m->title }}</a></button>

                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="swiper-autoplay swiper-container">
                        <div class="swiper-wrapper">
                        @foreach($infotarif as $index)
                            @if(empty($index->integrasi))
                                <div class="swiper-slide">
                                    <div class="title text-center"><h4>{{ $index->gerbang }}</h4></div>
                                    <div class="subtitle mb-1 text-center">{{ $index->arah }}</div>
                                    <img class="card-img-top img-fluid height-300" src="{{ asset($index->image)}}" alt="banner">
                                    <div class="table-responsive">
                                        <table class="table table-sm m-0">
                                          <thead>
                                            <tr>
                                              <th>Tarif</th>
                                              <th>Gol 1</th>
                                              <th>Gol 2</th>
                                              <th>Gol 3</th>
                                              <th>Gol 4</th>
                                              <th>Gol 5</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th scope="row">{{ $index->ruas }}</th>
                                              <td>{{ number_format($index->golongan1) }}</td>
                                              <td>{{ number_format($index->golongan2) }}</td>
                                              <td>{{ number_format($index->golongan3) }}</td>
                                              <td>{{ number_format($index->golongan4) }}</td>
                                              <td>{{ number_format($index->golongan5) }}</td>
                                            </tr>
                                            <tr>
                                              <th scope="row">{{ $index->total }}</th>
                                              <td>{{ number_format($index->total1) }}</td>
                                              <td>{{ number_format($index->total2) }}</td>
                                              <td>{{ number_format($index->total3) }}</td>
                                              <td>{{ number_format($index->total4) }}</td>
                                              <td>{{ number_format($index->total5) }}</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            @elseif(!empty($index->integrasi))
                                <div class="swiper-slide">
                                    <div class="title text-center"><h4>{{ $index->gerbang }}</h4></div>
                                    <div class="subtitle mb-1 text-center">{{ $index->arah }}</div>
                                    <img class="card-img-top img-fluid height-300" src="{{ asset($index->image)}}" alt="banner">
                                    <div class="table-responsive">
                                        <table class="table table-sm m-0">
                                          <thead>
                                            <tr>
                                              <th>Tarif</th>
                                              <th>Gol 1</th>
                                              <th>Gol 2</th>
                                              <th>Gol 3</th>
                                              <th>Gol 4</th>
                                              <th>Gol 5</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th scope="row">{{ $index->ruas }}</th>
                                              <td>{{ number_format($index->golongan1) }}</td>
                                              <td>{{ number_format($index->golongan2) }}</td>
                                              <td>{{ number_format($index->golongan3) }}</td>
                                              <td>{{ number_format($index->golongan4) }}</td>
                                              <td>{{ number_format($index->golongan5) }}</td>
                                            </tr>
                                            <tr>
                                              <th scope="row">{{ $index->integrasi }}</th>
                                              <td>{{ number_format($index->gol1_int) }}</td>
                                              <td>{{ number_format($index->gol2_int) }}</td>
                                              <td>{{ number_format($index->gol3_int) }}</td>
                                              <td>{{ number_format($index->gol4_int) }}</td>
                                              <td>{{ number_format($index->gol5_int) }}</td>
                                            </tr>
                                            <tr>
                                              <th scope="row">{{ $index->total }}</th>
                                              <td>{{ number_format($index->total1) }}</td>
                                              <td>{{ number_format($index->total2) }}</td>
                                              <td>{{ number_format($index->total3) }}</td>
                                              <td>{{ number_format($index->total4) }}</td>
                                              <td>{{ number_format($index->total5) }}</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>


@push('scripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<script type="text/javascript">
    mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
    var map = new mapboxgl.Map({
        container: 'map-contact', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [ 119.4144549, -5.1347684], // starting position [lng, lat]
        zoom: 15 // starting zoom
    });

    const style = "streets-v11"
    //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
    map.setStyle(`mapbox://styles/mapbox/${style}`)

    map.addControl(new mapboxgl.NavigationControl())

    // var marker1 = new mapboxgl.Marker().setLngLat([106.68962, -6.3105585]).addTo(map);

    const content = `

              <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <img class="card-img img-fluid rounded mb-3" src="{{ asset('apexnew/app-assets/img/menara.jpg') }}">
                        <h5 class="card-title">Manara Bosowa Lantai 4</h5>
                        <p class="card-text">Jalan Jenderal Sudirman No. 5, Makassar 90115, Sulawesi Selatan - Indonesia</p>
                    </div>
                </div>
              </div>

            `

    var popup = new mapboxgl.Popup({ offset: 15 }).setHTML(content).setMaxWidth("200px");

    new mapboxgl.Marker()
        .setLngLat([ 119.4144549, -5.1347684])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);
</script>
@endpush
@endsection


