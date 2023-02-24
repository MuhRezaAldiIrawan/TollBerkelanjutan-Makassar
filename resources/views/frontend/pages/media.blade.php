@extends('frontend.layouts.layout')
@section('content')
<section id="horizontal-examples">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Artikel | <small class="text-muted font-small-3"><em>Article</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        @foreach($medias as $m)
        <div class="col-xl-6 col-lg-12">
            <div class="card overflow-hidden">
                <div class="row">
	                <div class="col-sm-6 col-12">
                        <div class="card-img">
                            <img class="img-fluid" src="{{asset($m->image)}}" alt="Card image cap">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 d-flex align-items-center">
                        <div class="card-body">
                            <div class="align-self-center">
                                <div class="px-3">
                                    <p style="font-size: 12px; color: #124c83; text-align: left">{{ $m->created_at }}</p>
                                    <h4 class="card-title mb-3">{{$m->title}}</h4>
                                    <p class="m-0">{{substr($m->konten,0,50)}}<a target="_blank" href="{{route('media-detail',['id'=>$m->id])}}">. . . Selengkapnya</a></p>
                                    
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