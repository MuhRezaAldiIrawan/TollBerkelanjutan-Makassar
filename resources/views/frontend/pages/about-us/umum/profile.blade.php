@extends('frontend.layouts.layout')
@section('content')
<section id="header">
	<div class="row">
        <div class="col-12">
            <div class="content-header">
              	{{$data['ind']}} | <small class="text-muted font-small-3"><em>{{$data['eng']}}</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h5 class="card-title">{{$profile_bsd->judul}}</h5>
                    <hr class="mt-0 mb-2 border border-danger">
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <div class="card-img container-fluid">
                                <img class="img-fluid" src="{{asset($profile_bsd->image)}}" alt="Card image cap">
                            </div>
                        </div>
                        <div class="col-sm-9 col-12 d-flex">
                            <div class="card-body">
                                <p>{{$profile_bsd->konten}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr class="mt-0 mb-2 border">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Bidang Usaha</h5>
                        <hr class="mt-0 mb-2 border">
                        <h6>{{$profile_bsd->bidang_usaha}}</h6>
                        <hr class="mt-0 mb-2 border">
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Struktur Kepemilikan</h5>
                        <hr class="mt-0 mb-2 border">
                        <div class="card-img container-fluid text-center">
                            <img class="img-fluid width-600 height-600 text-center" src="{{asset($profile_bsd->struktur)}}" alt="Card image cap">
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Sejarah Singkat Perusahaan</h5>
                        <hr class="mt-0 mb-2 border">
                        <p>{!! $profile_bsd->sejarah !!}</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Sertifikasi dan Pencapaian</h5>
                        <hr class="mt-0 mb-2 border">
                        <div class="row">
                        @foreach($sertifikat as $s)
                        <div class="col-12 col-lg-3 mt-2">
                            <img class="img-fluid height-300 text-center" src="{{asset($s->image)}}">
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection