<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Upload CSV</div>
    <div class='panel-body'>
    <form method="POST" enctype="multipart/form-data" accept="application/csv" action="{{route('delayedPay.import')}}">
        @csrf
        <div class="form-group">
                <label for="title">Choose CSV File:</label>
                <input type="file" name="file" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
  </div>
@endsection