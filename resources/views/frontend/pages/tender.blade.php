@extends('frontend.layouts.layout')
@section('content')
<section id="horizontal-examples">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Tender | <small class="text-muted font-small-3"><em>Tender</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        @foreach($data as $m)
        <div class="col-xl-6 col-lg-12">
            <div class="card overflow-hidden">
                <div class="row">
	                <!-- <div class="col-sm-6 col-12">
                        <div class="card-img">
                            <img class="img-fluid" src="{{asset('../storage/app/'.$m->image)}}" alt="Card image cap">
                        </div>
                    </div> -->
                    <div class="col-sm-6 col-12 d-flex align-items-center">
                        <div class="card-body">
                            <div class="align-self-center">
                                <div class="px-3">
                                    <p style="font-size: 12px; color: #124c83; text-align: left">{{ $m->created_at }}</p>
                                    <h4 class="card-title mb-3">{{$m->nama_proyek}}</h4>
                                    <p class="m-0"><a target="_blank" href="{{route('tender-detail',['id'=>$m->id])}}">. . . Selengkapnya</a></p>
                                    
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