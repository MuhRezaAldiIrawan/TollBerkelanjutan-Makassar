@extends('frontend.layouts.layout')


@section('content')
<div class="container flex-grow-1 my-3">
    <div class="row">
        <div class="col-md-12">
            <h5 class="">
                <i class="fa fa-filter mr-2" aria-hidden="true"></i> Filtering Data</h5>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Location</label>
                        <select class="custom-select">
                            <option selected disabled>Pilih Lokasi Filter data</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="row mt-2">
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Start Date</label>
                            <input class="form-control" type="date" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">End Date</label>
                            <input class="form-control" type="date" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <span class="ft-search"></span>&nbsp; Search
                      </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 class=""><i class="fa fa-car mr-2" aria-hidden="true"></i> Object Counter</h5>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-column flex-md-row">
                            <h5 class="font-weight-bold" style="color:#124C83">Toll Petterani</h5>
                            <h6 class="font-weight-bold" style="color:#124C83; font-size: 14px;">Priode: 10/01/2023 - 11/01/2023</h6>
                        </div>
                            {!! $graph->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 class=""><i class="fa fa-map-marker mr-2" aria-hidden="true"></i>Location Map</h5>
            <div class="shadow-sm card p-2 mb-4">
                <iframe style="border: 0" allowfullscreen="true" loading="lazy" width="100%" src="https://maps.google.com/maps?q=-5.1174489,119.441335&z=13&center&output=embed" height="450"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="{{ $graph->cdn() }}"></script>
{{ $graph->script() }}
@endsection
