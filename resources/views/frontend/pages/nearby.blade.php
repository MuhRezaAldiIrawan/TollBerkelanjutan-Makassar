@extends('frontend.layouts.layout')
@section('content')
<!-- Tabs with Icons start -->
<section id="tabs-with-icons">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                Lokasi Terdekat | <small class="text-muted font-small-3"><em>Nearby Location</em></small>
             </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="baseIcon-tab1" data-toggle="tab" aria-controls="tabIcon1" href="#all" aria-expanded="true"><i class="fa fa-search mr-1"></i>Semua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseIcon-tab2" data-toggle="tab" aria-controls="tabIcon2" href="#facility-recreation" aria-expanded="false"><i class="fa fa-star"></i> Fasilitas dan rekreasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#hotel" aria-expanded="false"><i class="fa fa-hotel mr-1"></i>Hotel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#mall" aria-expanded="false"><i class="fa fa-building mr-1"></i>Mall</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#hospital" aria-expanded="false"><i class="fa fa-hospital-o mr-1"></i>Rumah Sakit</a>
                            <li class="nav-item">
                                <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#residential" aria-expanded="false"><i class="fa fa-home mr-1"></i>Residensial</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="all" aria-expanded="true" aria-labelledby="baseIcon-tab1">
                                <div class="row">
                                    @foreach($nearby as $n)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="facility-recreation" aria-labelledby="baseIcon-tab2">
                                <div class="row">
                                    @forelse($nearby_1 as $n1)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n1->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n1->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n1->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n1->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n1->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-content">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title">No data</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="hotel" aria-labelledby="baseIcon-tab2">
                                <div class="row">
                                    @forelse($nearby_2 as $n2)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n2->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n2->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n2->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n2->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n2->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-content">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title">No data</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="mall" aria-labelledby="baseIcon-tab2">
                                <div class="row">
                                    @forelse($nearby_3 as $n3)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n3->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n3->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n3->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n3->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n3->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title">No data</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="hospital" aria-labelledby="baseIcon-tab2">
                                <div class="row">
                                    @forelse($nearby_4 as $n4)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n4->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n4->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n4->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n4->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n4->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-content">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title">No data</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane" id="residential" aria-labelledby="baseIcon-tab2">
                                <div class="row">
                                    @forelse($nearby_5 as $n5)
                                    <div class="col-lg-6 col-md-7 col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title cursor-pointer">
                                                            <a>{{$n5->name}}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <img src="{{asset($n5->image)}}" class="img-fluid">
                                                                </div>
                                                                <div class="col-8">
                                                                    <p>{{$n5->description}}</p>
                                                                    <p style="font-size: 14px; color: #124c83; text-align: left">{{$n5->location}}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Vuexy</span>
                                                            <span class="badge bg-light-primary mb-sm-0 mb-1 mr-2" style="visibility: hidden;">Template</span>
                                                            <a target="_blank" href="{{$n5->maps}}"><span class="badge bg-light-primary mb-sm-0 mb-1 mr-2 float-right">Go To Place</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12 order-2 order-md-1">
                                        <div id="searchResults" class="row search-results">
                                            <!-- Web results -->
                                            <div class="col-12 web-result">
                                                <div class="card card-outline-info box-shadow-0">
                                                    <div class="card-content">
                                                        <div class="card-body text-center">
                                                            <h3 class="card-title">No data</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tabs with Icons Ends -->
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
@endpush
@endsection