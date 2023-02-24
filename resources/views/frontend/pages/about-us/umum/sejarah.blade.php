@extends('frontend.layouts.layout')
@section('content')
<section id="vertical-timeline">
	<div class="row">
        <div class="col-12">
            <div class="content-header">
              	{{$data['ind']}} | <small class="text-muted font-small-3"><em>{{$data['eng']}}</em></small>
             </div>
        </div>
    </div>
	<section id="vertical-timeline-left" class="timeline-left timeline-wrapper col-sm-10 col-12 offset-sm-1">
        <ul class="timeline">
            <li class="timeline-line mt-4"></li>
            <li class="timeline-group">
                <h5>
                <span class="badge badge-primary cursor-default">
                    <i class="fa ft-award"></i>
                </span>
                </h5>
            </li>
        </ul>
        <ul class="timeline">
            <li class="timeline-line"></li>
            @foreach($sejarah as $s)
            <li class="timeline-item">
                <div class="timeline-badge">
                    <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work">
                        <i class="primary font-small-3">{{date('Y',strtotime($s->tanggal))}}</i>
                    </span>
                </div>
                <div class="timeline-card card shadow-z-1">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title mb-1">{{date('d F Y', strtotime($s->tanggal))}}</h4>
                            <hr class="mt-0 mb-2">
                            <p class="m-0">{{$s->judul_indo}}</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <ul class="timeline">
            <li class="timeline-line mb-4"></li>
            <li class="timeline-group">
        	    <h5>
            	   	<span class="badge badge-primary cursor-default">. </span>
            	</h5>
            </li>
        </ul>
    </section>
</section>
@endsection