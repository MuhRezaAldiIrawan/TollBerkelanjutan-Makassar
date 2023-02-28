@extends('frontend.layouts.layout')


@section('content')
    <div class="container flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="d-flex align-items-end justify-content-start">
                        <i class="ft-filter ml-3"></i>
                        <h5 class="card-header" style="padding-left: 8px ">Filtering Data</h5>
                    </div>
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
                    @include('frontend.pages.about-us.chart-section.section6')
                </div>
            </div>
        </div>
    </div>

@endsection
