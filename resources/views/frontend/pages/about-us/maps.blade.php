@extends('frontend.layouts.layout')


@section('content')

<style>
    @media only screen and (max-width: 767px) {

        /* For tablets: */
        /* .scr-phone {display: inline;} */
        .traffic-phone1 {
            width: 650px;
        }

        .title-phone {
            font-size: 20px;
        }
    }
</style>
<br>
<div class="container p-0">
    <h3><strong>
            <center>Makassar Toll-Road Connectivity</center>
        </strong>
    </h3>
    <div class="container align-items-center bg-white rounded shadow p-0" style="overflow: auto; white-space: nowrap; overflow-y: hidden;">
    
        <div class="traffic-phone1">
            <a href="{{ asset('apexnew/app-assets/img/tol-map.png') }}" target="_blank">
                <div class="bg-white rounded shadow p-0">
                    <img class="img-fluid rounded" src="{{ asset('apexnew/app-assets/img/tol-map.jpg') }}">
                </div>
            </a>
        </div>
    </div>
    
</div>

@endsection