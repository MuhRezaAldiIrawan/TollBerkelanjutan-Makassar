@extends('frontend.layouts.layout')


@section('content')
    <div class="container-xl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="mt-2 ml-3">
                        <i class="fa fa-filter mr-2" aria-hidden="true"></i> Filtering Data
                    </h5>
                    <div class="card-body mt-0">
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
                            <button type="button" class="btn btn-primary ml-2">
                                <span class="ft-search"></span>&nbsp; Search
                            </button>
                        </div>
                    </div>
                    @if (request()->routeIS('Traffic'))
                        @include('frontend.pages.about-us.chart-section.section4')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
