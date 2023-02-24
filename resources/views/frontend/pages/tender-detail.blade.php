@extends('frontend.layouts.layout')
@section('content')

    <div class="row">
    	<!-- Default Headings starts -->
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                    <p style="font-size: 14px;color: #124c83;">{!! $tender->created_at !!}</p>    
                    <h4 class="card-title mb-3">{{$tender->nama_proyek}}</h4>
                    </div>
                </div>
            </div>
    	</div>
    	<!-- Default Headings ends -->
    </div>
@endsection