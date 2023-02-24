@extends('frontend.layouts.layout')
@section('content')
<section class="page-user-profile">

    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Pusat Panggilan 1500722 | <small class="text-muted font-small-3"><em>Call Center 1500722</em></small>
             </div>
        </div>
    </div>

    
    <div class="row">
        @foreach($call_center as $c)
        <div class="col-12">
            <div class="card text-center">
                <div class="user-profile-images">
                    <!-- user timeline image -->
                    <img src="{{asset($c->photo)}}" class="img-fluid rounded-top user-timeline-image" alt="Foto rest area">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-content">
                        {!! $c->peraturan ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach()
    </div>
    

    <div class="row match-height">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Layanan Jalan Tol</h3>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="row">
                            @foreach($call_center_child as $a)
                            <div class="col-12 col-sm-3">
                                <img src="{{asset($a->foto)}}" class="img-fluid" style="width: 50%; max-height: 250px;">
                                <p>{{$a->title}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@push('scripts')
<link rel="stylesheet" href="{{ asset('apexnew/app-assets/css/pages/page-user-profile.css')}}">
@endpush
@endsection