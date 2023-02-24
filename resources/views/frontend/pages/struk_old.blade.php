@extends('frontend.layouts.layout')
@section('content')
@push('styles')
   #data-transaksi.dataTable.no-footer{
      border-bottom: unset;
    }
    #data-transaksi tbody td {
        display: block;
        border: unset;
    }
    #data-transaksi>tbody>tr>td{
      border-top: none !important;
    }
@endpush
<section id="compact-style">
	<div class="row">
		<div class="col-12">
		<div class="card">
				<div class="card-content">
					<div class="card-body">
						<img src="{{asset('uploads/4/2021-08/Spanduk.png')}}" class="card-img">
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="row">
    <div class="col-sm-12">
        <div class="content-header">Data Struk | Jalan Tol Makassar</div>
    </div>
  </div>
  <div class="row">

    <!-- BEGIN : FILTER -->
    <div class="col-12">
      <div class="card">
		<div class="card-content">
			<div class="card-body">
				<form action="" method="get">
			{{csrf_field()}}
				<div class="input-group">
					<input placeholder="Masukan nomor kartu" name="kartu" id="kartu" type="text" class="form-control">

					<div class="input-group-append">
						<p class="input-group-text"><i class="fa fa-credit-card"></i></p>
					</div>
				</div>
				<div class="input-group date" id="date-from" data-target-input="nearest">
					<input name="from" id="from" placeholder="Tanggal awal" type="text" class="form-control datetimepicker-input" data-target="#date-from"/>
					<div class="input-group-append" data-target="#date-from" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<div class="input-group date" id="date-to" data-target-input="nearest">
					<input name="to" id="to" placeholder="Tanggal akhir" type="text" class="form-control datetimepicker-input" data-target="#date-to"/>
					<div class="input-group-append" data-target="#date-to" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<button type="button" id="filter" class="btn btn-outline-info">Cari Struk</button>
				<button type="button" id="all" class="btn btn-outline-warning" style="visibility: hidden;">Pilih semua</button>
				<button type="button" target="_blank" id="filter1" class="btn btn-outline-warning" style="visibility: hidden;">Cetak</button>
				<!-- <button type="submit" id="export" class="btn btn-outline-success">Cetak Struk</button> -->
			</form>
			</div>
		</div>
	</div>
    </div>
    <!-- END : FILTER -->

    <!-- BEGIN : TIME TABLE -->
    <div class="col-12">
      <div class="card">
        <!-- <div class="card-header">
          <h4 class="card-title">Data Struk</h4>
        </div> -->
        <div class="card-content">
          <div class="card-body card-dashboard">
              <table id="data-transaksi" class="table w-100">
                <thead style="font-size: 14px">
                  <tr>
                    <th>Waktu Transaksi</th>
                    <th>Gardu</th>
                    <th>Golongan</th>
                    <th>Tarif</th>
                    <th>Saldo</th>
                    <th style="display: none;">Kartu</th>
                    <th style="display: none;">Resi</th>
                    <th>Gardu</th>
                  </tr>
                </thead>
              </table>
          </div>
        </div>
      </div>
    </div>
    <!-- END : TIME TABLE -->

  </div>
</section>
@push('scripts')
<script>
	$(document).ready(function(){
		$("#date-from").datetimepicker({
			format: 'YYYY-MM-DD'
		});
		$("#date-to").datetimepicker({
			format: 'YYYY-MM-DD'
		});

		$("#data-transaksi thead").hide();
		
		// var dt = "";
		
		function load_data(kartu,tanggal_awal,tanggal_akhir){
			var dt = $("#data-transaksi").DataTable({
			// select:{
			// 	style: 'multi'
			// },
			processing: true,
			serverSide: true,
			bInfo: false,
			// pageLength: 8,
			paging: false,
			searching: false,
			lengthChange: false,
			deferRender: false,
			language:{
				paginate:{
					previous: "<",
					next: ">"
				},
			},
			ajax:{
				url:'{{route("struk")}}',
				data:{kartu:kartu,tanggal_awal:tanggal_awal,tanggal_akhir:tanggal_akhir},
				type: "GET"
			},
			columns:[
			{
				render: function (data, type, row, meta){
					var html = '<div class="card card-outline-info box-shadow-0">'+
					'<div class="card-content">'+
					'<div class="card-body">'+
					'<p >Waktu Transaksi: '+row.transaksi+'</p>'+
					'<p >'+row.gardu+'</p>'+
					'<p >Golongan: '+row.gol+'</p>'+
					'<p >Tarif: '+row.payment+'</p>'+
					'<p >Sisa Saldo: '+row.saldo+'</p>'+
					'<p  style="display:none;">'+row.kartu+'</p>'+
					'<p  style="display: none;">No. Resi: '+row.resi+'</p>'+
					'</div>'+
					'</div>'+
					'</div>';
					return html;
				}
			}
			],

			});

			$('#filter1').css("visibility","visible")
			$('#all').css("visibility","visible")

			$("#data-transaksi tbody").addClass("row");
			$("#data-transaksi tbody tr").addClass("col-lg-3 col-md-4 col-sm-12");


			$('#data-transaksi tbody').on( 'click', 'div', function () {
		        // $('td').toggleClass('a');
		        $(this).toggleClass('text-white gradient-purple-bliss')
		    } );
		    $('#data-transaksi tbody').on( 'click', 'tr', function () {
		        $(this).toggleClass('a');
		        // $(this).toggleClass('text-white gradient-purple-bliss')
		    } );

		    $('#all').on("click", function(){
		    	$('#data-transaksi tbody div').toggleClass('text-white gradient-purple-bliss')
		    	$('#data-transaksi tbody tr').toggleClass('a')
		    })

		    $('#filter1').click( function () {
		    	// var x = 0;
		    	let datanya = dt.rows('.a').data();
		    	let jml = dt.rows('.a').count();
		    	var data = [];
		    	for(x=0;x<jml; x++){
		    		data[x] = datanya[x];
		    	}

		    	if(jml<1){
		    		alert("Pilih data terlebih dahulu!")
		    	}else{
		    		let datas = JSON.stringify(data);
		    		console.log(data);
			    	$.ajax({
			    		type:'post',
			    		url:'{{url("/struk-dd")}}',
			    		data: {
			    			"_token": "{{csrf_token()}}",
			    			"data": datas,
			    			"jml": jml

			    		},
			    		success:function(data){
			    			// console.log(data)
			    			// var blob = new Blob([data]);
			    			var link = document.createElement('a');
			    			link.href = data.url;
			    			link.target = "_blank"
			    			// link.setAttribute('download',data.file)
			    			// console.log(data)
			    			// link.download = 'tes.pdf';
			    			link.click();
			    		},
			    		error:function(blob){
			    			console.log(blob);
			    		}
			    	});
		    	}
		        
		        // alert( dt.rows('.selected').data().length +' row(s) selected' );
		    } );

		}

		
		$('#filter').click(function(){
			var kartu = $('#kartu').val();
			var tanggal_awal = $('#from').val();
			var tanggal_akhir = $('#to').val();
			
			if(kartu != '' && tanggal_awal != '' && tanggal_akhir != ''){
				$('#data-transaksi').DataTable().destroy();
				load_data(kartu,tanggal_awal,tanggal_akhir);
				// dt.on("draw", function(data){
				// $("#data-transaksi tbody").addClass("row");
				// $("#data-transaksi tbody tr").addClass("col-lg-3 col-md-4 col-sm-12");
			// });
			}else{
				alert("Data wajib diisi");
			}
		});
	})
</script>
@endpush
@endsection
