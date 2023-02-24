@extends('frontend.layouts.layout')


@section('content')

<style>
    @media only screen and (max-width: 767px) {
        /* For tablets: */
    /* .scr-phone {display: inline;} */
    .title-phone{font-size: 20px;}
    }
</style>

<br>
<div class="container p-0">
    @if (request()->routeIS('mmn-harian') || request()->routeIS('jtse-harian') || request()->routeIS('mmn-harian-bulan') || request()->routeIS('jtse-harian-bulan'))
        <center><h3 class="title-phone"><strong>{{ $title }}</strong></h3></center>
        @include('frontend.pages.about-us.chart-section.section1')

    @elseif (request()->routeIS('mmn-gerbang-harian') || request()->routeIS('jtse-gerbang-harian') || request()->routeIS('mmn-gerbang-harian-detail') || request()->routeIS('jtse-gerbang-harian-detail'))
        <center><h3 class="title-phone"><strong>{{ $title }}</strong></h3></center>
        @include('frontend.pages.about-us.chart-section.section2')

    @elseif (request()->routeIS('mmn-bulanan') || request()->routeIS('jtse-bulanan'))
            <center><h3 class="title-phone"><strong>{{ $title }}</strong></h3></center>
        @include('frontend.pages.about-us.chart-section.section3')
        
    @elseif (request()->routeIS('mmn-komposisi') || request()->routeIS('jtse-komposisi'))
        <center><h3 class="title-phone"><strong>{{ $title }}</strong></h3></center>
         @include('frontend.pages.about-us.chart-section.section4')

    @elseif (request()->routeIS('mmn-traffic-history') || request()->routeIS('jtse-traffic-history'))
        <center><h3 class="title-phone"><strong>{{ $title }}</strong></h3></center>
        @include('frontend.pages.about-us.chart-section.section5')

    @endif
</div>


@endsection