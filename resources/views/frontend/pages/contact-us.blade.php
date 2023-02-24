@extends('frontend.layouts.layout')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="content-header">
                Hubungi Kami | <small class="text-muted font-small-3"><em>Contact Us</em></small>
             </div>
        </div>
    </div>
<div class="row">
    <div class="col-12">  
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">          
                                        <p>
                                            {!! $alamat1->alamat !!}
                                        </p>
                                        @foreach($info as $i)
                                        <a type="button" target="_blank" href="{{$i->link}}" class="btn btn-social-icon {{$i->btn}} mr-2">
                                            <i class="{{$i->cl}}"></i>
                                        </a>
                                        @endforeach
                                        <!-- <a type="button" target="_blank" href="http://www.twitter.com/infotolbsd" class="btn btn-social-icon btn-twitter mr-2">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a type="button" target="_blank" href="http://www.instagram.com/infobsdtol" class="btn btn-social-icon btn-instagram round">
                                            <i class="fa fa-instagram"></i>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="map-contact" style="width: auto; height: 50vh;">
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

              <div class="card" style="overflow-y: auto;max-height: 300px; width:100%">
                <div class="card-content">
                    <div class="card-body">
                        <img class="card-img img-fluid rounded mb-3" src="{{ asset('apexnew/app-assets/img/menara.jpg') }}">
                        <h5 class="card-title">Manara Bosowa Lantai 4</h5>
                        <p class="card-text">Jalan Jenderal Sudirman No. 5, Makassar 90115, Sulawesi Selatan - Indonesia</p>
                    </div>
                </div>
              </div>

            `

    var popup = new mapboxgl.Popup({ offset: 25 }).setHTML(content).setMaxWidth("400px");

    new mapboxgl.Marker()
        .setLngLat([ 119.4144549, -5.1347684])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);
</script>
@endpush
@endsection