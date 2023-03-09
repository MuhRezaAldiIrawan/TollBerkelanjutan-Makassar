@extends('frontend.layouts.layout')


@section('content')
    <style>
        .btn-hover:active {
            background: #13599b !important;
        }
        .btn-hover:hover {
            background: #13599b !important;
        }

    </style>
    <div class="container-xl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <h5 class="mt-2 ml-3">
                        <i class="fa fa-filter mr-2" aria-hidden="true"></i> Filtering Data
                    </h5>
                    <form class="card-body  mt-0" method="GET" action="/Traffic">
                        @csrf
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Location</label>
                            <select class="custom-select" name="location" value="{{ request()->query('location')}}">
                                <option value="">Pilih Lokasi Filter data</option>
                                @foreach ($locations as $location)
                                    <option {{ $location->lokasi == request()->query('location') ? 'selected' : '' }} value="{{ $location->lokasi }}">{{ $location->lokasi }}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-2">
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Start Date</label>
                                <input class="form-control" type="date" name="start" value="{{ request()->query('start') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">End Date</label>
                                <input class="form-control" type="date" name="end" value="{{ request()->query('end') }}" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-hover ml-2">
                                <span class="ft-search"></span>&nbsp; Search
                            </button>
                        </div>
                    </form>
                </div>
                @if (request()->routeIS('Traffic'))
                    @include('frontend.pages.about-us.chart-section.section1Traffic')
                @endif
            </div>
        </div>
    </div>
@endsection
