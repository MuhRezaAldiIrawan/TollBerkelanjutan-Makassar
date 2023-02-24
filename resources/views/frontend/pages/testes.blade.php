<!DOCTYPE html>
<html>
<head>
	<title>Data Transaksi</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="application/pdf"/>
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
	<link rel="stylesheet" href="{{asset('apexnew/app-assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('apexnew/app-assets/css/print.min.css')}}">
	<style type="text/css">
		.page-break{
			page-break-after: always;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			@foreach($data as $d)
			<div class="col-12 col-md-6 mt-2 mr-0">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img src="{{asset('apexnew/app-assets/img/nusantara_logo.png')}}" style="width: 65%;" class="float-left">
							</div>
							<div class="col-md-4">
								<p class="text-center" style="font-size: 7pt;">PT.BSD - Pondok Aren<br/>Info Tol 14080</p>
							</div>
							<div class="col-md-4">
								<img src="{{asset('apexnew/app-assets/img/logo_bsd.png')}}" style="width: 65%;" class="float-right">
							</div>
						</div>
						<hr class="mt-0">
						<table class="table table-borderless" style="font-size: 10pt">
						<tr>
							<td colspan="2" style="width: 205px; text-align: left;">{{$d['gardu']}}</td>
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
							<td style="width: 205px; text-align: right;">KEPMEN.1233/KPTS/M/2019</td>
						</tr>
					</table>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</body>
<script type="text/javascript">
	window.print()
</script>
</html>