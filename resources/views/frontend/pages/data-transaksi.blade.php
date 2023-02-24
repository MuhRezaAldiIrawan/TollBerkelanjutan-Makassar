<!DOCTYPE html>
<html>
<head>
	<title>Data Transaksi</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="application/pdf"/>
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
	<link rel="stylesheet" href="{{public_path('apexnew/app-assets/css/bootstrap.css')}}">

	<style type="text/css">
		.page-break{
			page-break-after: always;
		}
	</style>
</head>
<body>
	<!-- <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Transaksi</h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Waktu Transaksi</th>
				<th>Gardu</th>
				<th>Gol</th>
				<th>Tarif</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table> -->
	@php($i = 1)
	@foreach($datas as $d)
	<div class="row">
		<div class="col-12 col-lg-4 bg-white">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<img src="{{public_path('apexnew/app-assets/img/mmn_small.png')}}" class="float-left">
						</div>
						<div class="col-md-6">
							<img src="{{public_path('apexnew/app-assets/img/jtse_small.png')}}" class="float-right">
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center" style="font-size: 12pt;">
							PT. Makassar Metro Network<br/>
							PT. Jalan Tol Seksi Empat
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-center text-danger" style="font-size: 10pt;">
						<span style="display:inline-block; width: 80px;"></span>
							Info Tol 1500722
						</div>
					</div>					
					<hr>
					<table style="font-size: 10pt">
{{-- 						
						<tr>
							<td colspan="2" style="width: 205px; text-align: left;">{{$d['gardu']}}</td>
						</tr>
						 --}}
						<tr>
							<td style="width: 205px; text-align: left;">{{$d['plaza']}}</td>
							<td style="width: 205px; text-align: right;">{{$d['gardu']}}</td>
						</tr>

						<tr>
							<td style="width: 205px; text-align: left;">{{$d['resi']}}</td>
							<td style="width: 205px; text-align: right;">Gol {{$d['gol']}} {{$d['payment']}}</td>
						</tr>
						<tr>
							<td style="width: 205px; text-align: left;">SLD {{$d['saldo']}}</td>
							<td style="width: 205px; text-align: right;">{{$d['kartu']}}</td>
						</tr>
						<tr>
							<td style="width: 205px; text-align: left;">{{$d['transaksi']}}</td>
							<td style="width: 205px; text-align: right;">{{$d['metode']}}</td>
						</tr>
						<tr>
							<td style="width: 205px; text-align: left;">KEPMEN.552/KPTS/M/2021</td>
							<td style="width: 205px; text-align: right;">KEPMEN.1485/KPTS/M/2021</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	@if($i<$jml)
	<div class="page-break"></div>
	@else
	@endif
	@php($i++)
	@endforeach
</body>
</html>