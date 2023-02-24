@extends('frontend.layouts.layout')
@section('content')

    <div class="row">
    	<!-- Default Headings starts -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-img text-center">
                        <img class="img-fluid" src="{{asset($media->image)}}" alt="Card image cap">
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <p style="font-size: 14px;color: #124c83;">{!! $media->created_at !!}</p>    
                    <h4 class="card-title mb-3">{{$media->title}}</h4>
                    <p>{!! $media->konten !!}</p>
                    </div>
                </div>
            </div>
    	</div>
    	<!-- Default Headings ends -->
    </div>
@endsection