@extends('frontend.layouts.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="content-header">
            {{$data['ind']}} | <small class="text-muted font-small-3"><em>{{$data['eng']}}</em></small>
        </div>
    </div>
</div>
<section id="vertical-timeline-center" class="timeline-center timeline-wrapper col-sm-10 col-12 offset-sm-1">
    <!-- <ul class="timeline">
        <li class="timeline-line mt-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Start</span></h5>
        </li>
    </ul> -->
	<ul class="timeline">
        <li class="timeline-line mt-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Dewan Komisaris</span></h5>
        </li>
    </ul>
    <!-- Komisioner -->
    <ul class="timeline">
        <li class="timeline-line"></li>
        <li class="timeline-item">
            <div class="timeline-badge">
                <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{asset($komisaris_first->image)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$komisaris_first->nama}}</h4>
                        <div class="card-subtitle text-muted mt-0">
                            <span class="font-small-3">{{$komisaris_first->posisi}}</span>
                        </div>
                        <hr class="mt-0 mb-2">
                        <!-- <p class="m-0">{!! $komisaris_first->deskripsi !!}</p> -->
                        <?php
                            $r = preg_replace("/<p>/", "", $komisaris_first->deskripsi);
                            $s = explode("</p>", $r);
                            $t = array_slice($s, 0,1);
                            $u = array_slice($s, 1);
                        ?>
                        <p class="m-0">{{ $t[0] }}</p>
                        @foreach($u as $v)
                        <p class="m-0 pesan{{$komisaris_first->id}}">{{$v}}</p>
                        @endforeach
                        <button class="btn btn-primary mt-2 read{{$komisaris_first->id}}">Read More . . .</button>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </li>
        @foreach($komisaris as $l)
        <li class="timeline-item mt-5">
            <div class="timeline-badge">
                <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{asset($l->image)}}" alt="Timeline Image 1">
                </div>
				<div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$l->nama}}</h4>
                        <div class="card-subtitle text-muted mt-0">
                            <span class="font-small-3">{{$l->posisi}}</span>
                        </div>
                        <hr class="mt-0 mb-2">
                        <?php
                            $m = preg_replace("/<p>/", "", $l->deskripsi);
                            $n = explode("</p>", $m);
                            $o = array_slice($n,0,1);
                            $p = array_slice($n, 1);
                        ?>
                        <p class="m-0">{{ $o[0] }}</p>
                        @foreach($p as $q)
                        <p class="m-0 pesan{{$l->id}}">{{$q}}</p>
                        @endforeach
                        <button class="btn btn-primary mt-2 read{{$l->id}}">Read More . . .</button>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
	<ul class="timeline">
        <li class="timeline-line mt-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Direksi</span></h5>
        </li>
    </ul>
    <!-- Direktur -->
    <ul class="timeline">
        <li class="timeline-line"></li>
        <li class="timeline-item">
            <div class="timeline-badge">
				<span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{asset($direksi_first->image)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$direksi_first->nama}}</h4>
                        <div class="card-subtitle text-muted mt-0">
							<span class="font-small-3">{{$direksi_first->posisi}}</span>
						</div>
                        <hr class="mt-0 mb-2">
                        <!-- <p class="m-0">{!! $direksi_first->deskripsi !!}</p> -->
                        <?php
                            $g = preg_replace("/<p>/","",$direksi_first->deskripsi);
                            $h = explode("</p>", $g);
                            $i = array_slice($h,0,1);
                            $j = array_slice($h,1);
                        ?>
                        <p class="m-0">{{ $i[0] }}</p>
                        @foreach($j as $k)
                        <p class="m-0 pesan{{$direksi_first->id}}">{{$k}}</p>
                        @endforeach
                        <button class="btn btn-primary mt-2 read{{$direksi_first->id}}">Read More . . .</button>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </li>
        @foreach($direksi as $d)
        <li class="timeline-item mt-5">
            <div class="timeline-badge">
                <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{asset($d->image)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$d->nama}}</h4>
                        <div class="card-subtitle text-muted mt-0">
                            <span class="font-small-3">{{$d->posisi}}</span>
                        </div>
                        <hr class="mt-0 mb-2">
                        <?php 
                            $a = preg_replace("/<p>/","",$d->deskripsi);
                            $b = explode("</p>", $a);
                            $c = array_slice($b,0,1);
                            $e = array_slice($b,1);
                        ?>
                        <p class="m-0">{{ $c[0] }}</p>
                        @foreach($e as $f)
                        <p class="m-0 pesan{{$d->id}}">{{$f}}</p>
                        @endforeach
                        <button class="btn btn-primary mt-2 read{{$d->id}}">Read More . . .</button>
                        <hr class="my-2">
                    </div>`
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <ul class="timeline">
        <li class="timeline-line mb-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">.</span></h5>
        </li>
    </ul>
</section>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        // $('.pesan').hide()
        @foreach($data_id as $c)
        $(".pesan{{$c->id}}").hide()
        $(".read{{$c->id}}").click(function(){
            if($(this).html() == 'Read More . . .'){
                $(".pesan{{$c->id}}").toggle("slow") 
                $(this).html('Minimize')
            }else{
                $(".pesan{{$c->id}}").toggle("slow") 
                $(this).html('Read More . . .')
            }
        })
        @endforeach
    })
</script>
@endpush
@endsection