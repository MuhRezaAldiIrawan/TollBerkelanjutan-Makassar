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
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-4">
                                {!!$visimisi->konten!!}
                            </div>
                            <div class="col-md-8">
                                <div class="card-img container-fluid">
                                    <img class="card-img img-fluid" src="{{asset($visimisi->image)}}" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="kebijakan manajemen sistem">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                 {{$data['kebijakan']}} | <small class="text-muted font-small-3"><em>Management Policy System</em></small>
            </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="card-img container-fluid">
                            <img class="card-img img-fluid width-600 height-600" src="{{asset($visimisi->image2)}}" alt="Card image cap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="description-list-alignment">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                {{$data['nil_indo']}} | <small class="text-muted font-small-3"><em>{{$data['nil_eng']}}</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        @foreach($nilai as $n)
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <dl class="row">
                                <dt class="col-sm-3">
                                    <img class="card-img img-fluid width-60 height-60" src="{{asset($n->icon)}}" alt="Card image cap">
                                </dt>
                                <dd class="col-sm-9">
                                    <h4>{{$n->judul}}</h4>
                                    <h6>{{$n->deskripsi}}</h6>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection