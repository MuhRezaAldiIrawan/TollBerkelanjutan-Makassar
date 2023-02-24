@extends('frontend.layouts.layout')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="content-header">Informasi Tarif | <small class="text-muted font-small-3"><em>Tariff Information</em></small></div>
  </div>
</div>

<div class="row match-height">
  @foreach($tarif as $index)
    @if(empty($index->integrasi))
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $index->gerbang }}</h4>
            <h6 class="card-subtitle text-muted">{{ $index->arah }}</h6>
          </div>
          <div class="card-content">
            <div class="card-img">
              <img class="card-img-top img-fluid height-300" src="{{ $index->image }}" alt="Card image cap">
            </div>
            <div class="card-body mt-1">

              <div class="table-responsive">
                <table class="table table-sm m-0">
                  <thead>
                    <tr>
                      <th>Tarif</th>
                      <th>Gol 1</th>
                      <th>Gol 2</th>
                      <th>Gol 3</th>
                      <th>Gol 4</th>
                      <th>Gol 5</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{ $index->ruas }}</th>
                      <td>{{ number_format($index->golongan1) }}</td>
                      <td>{{ number_format($index->golongan2) }}</td>
                      <td>{{ number_format($index->golongan3) }}</td>
                      <td>{{ number_format($index->golongan4) }}</td>
                      <td>{{ number_format($index->golongan5) }}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ $index->total }}</th>
                      <td>{{ number_format($index->total1) }}</td>
                      <td>{{ number_format($index->total2) }}</td>
                      <td>{{ number_format($index->total3) }}</td>
                      <td>{{ number_format($index->total4) }}</td>
                      <td>{{ number_format($index->total5) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
</div>


<div class="row match-height">
  @foreach($tarif as $index)
    @if(!empty($index->integrasi))
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $index->gerbang }}</h4>
            <h6 class="card-subtitle text-muted">{{ $index->arah }}</h6>
          </div>
          <div class="card-content">
            <div class="card-img">
              <img class="card-img-top img-fluid height-300" src="{{ $index->image }}" alt="Card image cap">
            </div>
            <div class="card-body mt-1">

              <div class="table-responsive">
                <table class="table table-sm m-0">
                  <thead>
                    <tr>
                      <th>Tarif</th>
                      <th>Gol 1</th>
                      <th>Gol 2</th>
                      <th>Gol 3</th>
                      <th>Gol 4</th>
                      <th>Gol 5</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{ $index->ruas }}</th>
                      <td>{{ number_format($index->golongan1) }}</td>
                      <td>{{ number_format($index->golongan2) }}</td>
                      <td>{{ number_format($index->golongan3) }}</td>
                      <td>{{ number_format($index->golongan4) }}</td>
                      <td>{{ number_format($index->golongan5) }}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ $index->integrasi }}</th>
                      <td>{{ number_format($index->gol1_int) }}</td>
                      <td>{{ number_format($index->gol2_int) }}</td>
                      <td>{{ number_format($index->gol3_int) }}</td>
                      <td>{{ number_format($index->gol4_int) }}</td>
                      <td>{{ number_format($index->gol5_int) }}</td>
                    </tr>
                    <tr>
                      <th scope="row">{{ $index->total }}</th>
                      <td>{{ number_format($index->total1) }}</td>
                      <td>{{ number_format($index->total2) }}</td>
                      <td>{{ number_format($index->total3) }}</td>
                      <td>{{ number_format($index->total4) }}</td>
                      <td>{{ number_format($index->total5) }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
</div>



@endsection