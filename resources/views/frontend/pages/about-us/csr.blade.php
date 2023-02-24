@extends('frontend.layouts.layout')
@section('content')
<section id="csr">
	<div class="row">
        <div class="col-12">
            <div class="content-header">
              	Tanggung Jawab Sosial Perusahaan | <small class="text-muted font-small-3"><em>{{$data['eng']}}</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        @foreach($csr as $c)
        <div class="col-xl-6 col-lg-12">
            <div class="card overflow-hidden">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="card-img">
                            <img class="img-fluid" src="{{asset($c->image)}}" alt="Card image cap">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 align-items-center">
                        <div class="card-body">
                            <div class="align-self-center">
                                <div class="px-3">
                                    <p style="font-size: 12px; color: #124c83; text-align: left">{{ $c->created_at }}</p>
                                    <h4 class="card-title mb-3">{{$c->title}}</h4>
                                    <p class="m-0">{{substr($c->konten,0,50)}}<a target="_blank" href="{{route('media-detail',['id'=>$c->id])}}">. . . Selengkapnya</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection