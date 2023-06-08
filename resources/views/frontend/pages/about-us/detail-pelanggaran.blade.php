@extends('frontend.layouts.layout')
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link rel="icon" href="https://tolmakassar.com/apexnew/app-assets/img/Logo_MMN_JTSE.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/0ca54e6540.js"crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <style>
        @media print {
        #printPageButton {
            display: none;
        }
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }    
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888; 
        }
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }
        .card-1{
        border: none;
            border-radius: 10px;
            width: 100%;
            background-color: #fff;
        }
        .icons i {
        margin-left: 20px;
        }
        .gmd-4 {
        -webkit-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        -ms-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        -o-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
        tr > * + * {
        padding-left: 4em;
        }   
        .dropdown-menu {
            max-height: 600px;
            overflow-y: scroll;
          }
          
    </style>

@section('content')
        <div class="container mt-5" >
        <h1 class="Counting" id="Counting" style="margin-top:80px"><center>Data Pelanggaran Lalu Lintas</center></h1>
        <button type="button" class="btn btn-outline-success" onclick="exportData()">Download Data</button>
            <table  id="data_pelanggaran" class="table table-borderless table-responsive card-1 p-4 gmd-4" style="margin-top: 20px;">
            <thead>
            <tr class="border-bottom">
            <th>
                <span class="ml-2">Waktu</span>
            </th>
            <th>
                <span class="ml-2">Gambar</span>
            </th>
            <th>
                <span class="ml-2">Jenis Pelanggaran</span>
            </th>
            <th>
                <span class="ml-2">Lokasi</span>
            </th>
            <th>
                <span class="ml-4">Action</span>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data )
            <tr class="border-bottom">
                <th>
                    <span class="ml-2">{{ $data->WAKTU }}</span>
                </th>
                <th>
                    @if ($data->JENIS_PELANGGARAN == 'Ada Orang' || $data->JENIS_PELANGGARAN == 'Selain Kendaraan Roda 4 Memasuki Tol')
                    <span class="ml-2 w-50 h-100 rounded'"><img src="http://192.168.0.211:5000/static/counting000/{{ substr($data->project,11) }}/person/{{ $data->GAMBAR }}" alt=""></span>
                    @else
                    <span class="ml-2 w-50 h-100 rounded'"><img src="http://192.168.0.211:5000/static/counting000/{{ substr($data->project,11) }}/melawan_arus/{{ $data->GAMBAR }}" alt=""></span>   
                    @endif
                    
                </th>
                <th>
                    <span class="ml-2">{{ $data->JENIS_PELANGGARAN }}</span>
                </th>
                <th>
                    <span class="ml-2">{{ $data->LOKASI }}</span>
                </th>
                <th>
                    <span class="ml-4">
                        <a href="#" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Hapus</a>
                    </span>
                </tr>
                @endforeach
        </tbody>
            </table>
     </div>
    <!-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script> -->
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>'#'</script>
    <script>
        function printDetail(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <script>
    function exportData(){
        /* Get the HTML data using Element by Id */
        var table = document.getElementById("data_pelanggaran");
    
        /* Declaring array variable */
        var rows =[];
    
        //iterate through rows of table
        for(var i=0,row; row = table.rows[i];i++){
            //rows would be accessed using the "row" variable assigned in the for loop
            //Get each cell value/column from the row
            column1 = row.cells[0].innerText;
            column2 = row.cells[2].innerText;
            column3 = row.cells[3].innerText;
    
        /* add a new records in the array */
            rows.push(
                [
                    column1,
                    column2,
                    column3,
                ]
            );
    
            }
            csvContent = "data:text/csv;charset=utf-8,";
            /* add the column delimiter as semicolon(;) and each row splitted by new line character (\n) */
            rows.forEach(function(rowArray){
                row = rowArray.join(";");
                csvContent += row + "\r\n";
            });
    
            /* create a hidden <a> DOM node and set its download attribute */
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "Data Pelanggaran.csv");
            document.body.appendChild(link);
            link.click();
        }
    </script>

@endsection