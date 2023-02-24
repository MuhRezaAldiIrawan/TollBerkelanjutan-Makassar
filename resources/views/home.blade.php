@extends('layouts.app')

@section('content')
<div class="container">

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <table class="table">
                <thead>
                    <tr>
                    <th style="width: 20%" scope="col">Tahun</th>
                    <th scope="col">Deskripsi</th>
                    </tr>
                </thead>

                <div class="card-body">
                    @foreach($result as $row)
                    <tbody>
                        <tr>
                        <th scope="row">{{ $row->title }}</th>
                        <td>{!! $row->content !!}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


