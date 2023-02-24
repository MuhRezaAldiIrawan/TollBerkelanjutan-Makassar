@extends('frontend.layouts.layout')
@section('content')
<h2 class="text-center py-4">Manajemen</h2>
<!--Vertical Timeline Starts-->
<section id="vertical-timeline-center" class="timeline-center timeline-wrapper col-sm-10 col-12 offset-sm-1">
    <ul class="timeline">
        <li class="timeline-line mt-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Komisaris</span></h5>
        </li>
    </ul>
    <ul class="timeline">
        <li class="timeline-line"></li>
        @foreach($direktur as $d)
        <li class="timeline-item">
            <div class="timeline-badge">
                <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{ asset($d->foto)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$d->nama}}</h4>
                        <hr class="mt-0 mb-2">
                        <p class="m-0">{{$d->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <ul class="timeline">
        <li class="timeline-line mt-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Direktur Utama</span></h5>
        </li>
    </ul>
    <ul class="timeline">
        <li class="timeline-line tline-t-none"></li>
        <li class="timeline-item center-block">
			@foreach($dirut as $dt)
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{ asset($dt->foto)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$dt->nama}}</h4>
                        <hr class="mt-0 mb-2">
                        <p class="m-0">{{$dt->deskripsi}}</p>
                    </div>
                </div>
            </div>
			@endforeach
        </li>
    </ul>

    <!-- Last Week -->
    <ul class="timeline">
        <li class="timeline-line"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">Direktur</span></h5>
        </li>
    </ul>
    <ul class="timeline">
        <li class="timeline-line"></li>
		@foreach($direktur as $d)
        <li class="timeline-item">
            <div class="timeline-badge">
                <span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work">
                    <i class="ft-award primary"></i>
                </span>
            </div>
            <div class="timeline-card card shadow-z-1">
                <div class="card-header">
                    <img class="img-fluid" src="{{ asset('$d->foto)}}" alt="Timeline Image 1">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title mb-0">{{$d->nama}}</h4>
                        <hr class="mt-0 mb-2">
                        <p class="m-0">{{$d->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </li>
		@endforeach
    </ul>
    <ul class="timeline">
        <li class="timeline-line mb-4"></li>
        <li class="timeline-group">
            <h5><span class="badge badge-primary cursor-default">o</span></h5>
        </li>
    </ul>
</section>
<!--Vertical Timeline Ends-->
@endsection