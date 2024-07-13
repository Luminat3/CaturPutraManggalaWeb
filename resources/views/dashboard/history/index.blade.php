@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Riwayat Transaksi</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <div class="card card-primary">
        <!-- .card-body -->
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-2">ID Pelanggan</th>
                        <th class="col-2">Nama Pelanggan</th>
                        <th class="col-3">Tanggal Selesai</th>
                        <th class="col-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaction as $transaksi)
                <tr onclick="window.location='/dashboard/transaction/detail/{{$transaksi->id}}'" role="button">
                    <td>{{$transaksi['id_customer']}}</td>
                    <td>{{$transaksi['nama_customer']}}</td>
                    <td>{{$transaksi['updated_at']}}</td>
                    <td>
                        @if($transaksi['status'] == false )
                            Belum Selesai
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            order: []
        } );
        let table = new DataTable('#myTable');
    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->
