@extends('frontend/layouts/layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="content-header">
            Billboard
         </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div id="map" style="width: 100%; height: 90vh;"></div>
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
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [ 119.4589424,-5.1018134], // starting position [lng, lat]
    zoom: 12 // starting zoom
  });

  const loadLocations = (geoJson) => {
          geoJson.features.forEach((location) => {
            const {geometry, properties} = location
            const {iconSize, locationId, title, description, specification, image} = properties

            let markerElement = document.createElement('div')
            markerElement.className = 'marker'+locationId
            markerElement.id = locationId
            markerElement.style.backgroundImage = 'url(https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png)'
            markerElement.style.backgroundSize = 'cover'
            markerElement.style.width = '50px'
            markerElement.style.height = '50px'

            const imageUrl = '{{url("")}}' + '/' + image

            const content = `

              <div style="overflow-y: auto;max-height: 400px; width:100%">
              <table class="table table-sm mt-2">
                <tbody>
                  <tr>
                    <td>Title</td>
                    <td>${title}</td>
                  </tr>
                  <tr>
                    <td>Picture</td>
                    <td><img src="${imageUrl}" loading="lazy" class="img-fluid"></td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>${description}</td>
                  </tr>
                  <tr>
                    <td>Spesification</td>
                    <td>${specification}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            `

            const popUp = new mapboxgl.Popup({
              offset:25
            }).setHTML(content).setMaxWidth("400px")

            new mapboxgl.Marker()
            .setLngLat(geometry.coordinates)
            .setPopup(popUp)
            .addTo(map)
          })
        }

        loadLocations({!! $geoJson !!})

  const style = "streets-v11"
  //light-v10, outdoors-v11, satellite-v9, streets-v11, dark-v10
  map.setStyle(`mapbox://styles/mapbox/${style}`)

  map.addControl(new mapboxgl.NavigationControl())
</script>
@endpush
@endsection