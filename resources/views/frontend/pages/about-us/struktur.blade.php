@extends('frontend.layouts.layout')
@section('content')
<section id="struktur">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Struktur Kepemilikan | <small class="text-muted font-small-3"><em>Stakeholder</em></small>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-img">
                        <img class="img-fluid" src="{{asset($struktur->image)}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="struktur">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                {{$data['ind_1']}} | <small class="text-muted font-small-3"><em>{{$data['eng_1']}}</em></small>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($sertifikat as $s)
                        <div class="col-12 col-lg-3 mt-2">
                            <img class="img-fluid" src="{{asset($s->image)}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection