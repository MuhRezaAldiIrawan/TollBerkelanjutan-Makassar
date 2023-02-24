@extends('frontend.layouts.layout')
@section('content')
<section class="faq-wrapper">
<!-- faq starts -->
    <div class="faq">
        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-content">
                        <div class="card-body py-2">
                            <div class="swiper-centered-slides swiper-container p-3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide rounded swiper-shadow" id="getting-started-text">
                                        <i class="ft-flag font-large-1"></i>
                                        <div class="swiper-text pt-md-2 pt-sm-1">Tentang Kami</div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow" id="pricing-plans-text">
                                        <i class="ft-dollar-sign font-large-1"></i>
                                        <div class="swiper-text pt-md-2 pt-sm-1">Sejarah Perusahaan</div>
                                    </div>
                                    <div class="swiper-slide rounded swiper-shadow" id="sales-question-text">
                                        <i class="ft-shopping-bag font-large-1"></i>
                                        <div class="swiper-text pt-md-2 pt-sm-1">Visi & Misi</div>
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="main-wrapper-content">
                            <!-- Getting Started Accordion -->
                                <div class="wrapper-content" data-faq="getting-started-text">
                                    <div class="card collapse-icon accordion-icon-rotate">
                                        <div class="text-center p-md-4 p-sm-1 py-1 p-0">
                                            <h1 class="faq-title">{{$about->judul}}</h1>
                                            <p>{{$about->konten}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pricing & Plans Accordion -->
                                <div class="wrapper-content" data-faq="pricing-plans-text">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <section class="cd-horizontal-timeline">
                                                    <div class="timeline">
                                                        <div class="events-wrapper">
                                                            <div class="events">
                                                                <ol>
                                                                    <li>
                                                                        <a data-date="{{date('d/m/Y', strtotime($timeline_date_first->tanggal))}}" class="selected">{{date('Y', strtotime($timeline_date_first->tanggal))}}</a>
                                                                    </li>
                                                                    @foreach($timeline_date as $td)
                                                                    <li>
                                                                        <a data-date="{{date('d/m/Y', strtotime($td->tanggal))}}">{{date('Y', strtotime($td->tanggal))}}</a>
                                                                    </li>
                                                                    @endforeach
                                                                </ol>
                                                                <span class="filling-line" aria-hidden="true"></span>
                                                            </div>
                                                        </div>

                                                        <ul class="cd-timeline-navigation">
                                                            <li><a href="#" class="prev inactive">Prev</a></li>
                                                            <li><a href="#" class="next">Next</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="events-content">
                                                        <ol>
                                                            <li class="selected" data-date="{{date('d/m/Y', strtotime($timeline_first->tanggal))}}">
                                                                <h1 class="text-bold-700 mb-2">{{$timeline_first->judul}}</h1>
                                                                <h4 class="mb-2">{{date('M jS, Y', strtotime($timeline_first->tanggal))}}</h4>
                                                                <p>{{$timeline_first->konten}}</p>
                                                            </li>
                                                            @foreach($timeline as $t)
                                                            <li data-date="{{date('d/m/Y', strtotime($t->tanggal))}}">
                                                                <h1 class="text-bold-700 mb-2">{{$t->judul}}</h1>
                                                                <h4 class="mb-2">{{date('M jS, Y', strtotime($t->tanggal))}}</h4>
                                                                <p>{{$t->konten}}</p>
                                                            </li>
                                                            @endforeach
                                                        </ol>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Sales Question Accordion -->
                                <div class="wrapper-content active" data-faq="sales-question-text">
                                    <div class="card collapse-icon accordion-icon-rotate">
                                        <div class="text-center p-md-4 p-sm-1 py-1 p-0">
                                            <h1 class="faq-title">{{$visi->judul}}</h1>
                                            <p>Visi<br/>
                                                {{$visi->visi}}
                                            </p>
                                            <p>Misi<br/>
                                                {{$visi->misi}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq ends -->
</section>
@push('scripts')
<script src="{{ asset('apexnew/app-assets/vendors/js/horizontal-timeline.js')}}"></script>
<script src="{{ asset('apexnew/app-assets/js/page-faq.js') }}"></script>
@endpush
@endsection