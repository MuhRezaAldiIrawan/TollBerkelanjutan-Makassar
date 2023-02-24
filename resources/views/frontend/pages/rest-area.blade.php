@extends('frontend.layouts.layout')
@section('content')
<section class="page-user-profile">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                {{$data['ind']}} | <small class="text-muted font-small-3"><em>{{$data['eng']}}</em></small>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="user-profile-images">
                    <!-- user timeline image -->
                    <img src="{{url($rest->foto)}}" class="img-fluid rounded-top user-timeline-image" alt="Foto rest area">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row match-height">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">KM 07+200 A Ruas Tol Pondok Aren - Serpong</h3>
                    <h3 class="card-title">Fasilitas Rest Area | <small class="text-muted font-small-3"><em>Rest Area Facilities</em></small></h3>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="row">
                            @foreach($detail as $d)
                            <div class="col-12 col-md-4">
                                <img src="{{asset($d->icon)}}" class="img-fluid" style="width: 20%; max-height: 100px;">
                                <p>{{$d->nama}} | <small class="text-muted font-small-3"><em>{{$d->nama_inggris}}</em></small></p>
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