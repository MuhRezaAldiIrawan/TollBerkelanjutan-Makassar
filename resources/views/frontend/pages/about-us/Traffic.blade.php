@extends('frontend.layouts.layout')


@section('content')
    <main class="container">
        <form method="POST" action="{{route('login')}}">
            @csrf
            <h4 class="mb-2 card-title">Filter Data</h4>
            <div class="d-flex flex-direction-row">
                <div>
                    <select class="custom-select">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="d-flex flex-row " style="gap: 20px; margin-top: 10px;">
                        <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
                        <input placeholder="Select date" type="text" id="example" class="form-control">
                        <label for="example">Try me...</label>
                        <i class="fas fa-calendar input-prefix"></i>
                      </div>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-sm-row flex-column">
                <a href="/admin/login" class="btn bg-light-primary mb-2 mb-sm-0">Admin</a>
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>
        </form>
    </main>
@endsection
