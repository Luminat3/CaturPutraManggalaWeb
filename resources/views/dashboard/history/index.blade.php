@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Riwayat Transaksi</h1>
@stop

@section('content')
    <div class="card card-primary">
        <!-- .card-body -->
        <div class="card-body">
            <table id="tableTransaksi" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-2">ID Pelanggan</th>
                        <th class="col-2">Nama Pelanggan</th>
                        <th class="col-3">Tanggal Transaksi</th>
                        <th class="col-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaction as $transaksi)
                <tr onclick="window.location='/dashboard/transaction/detail/{{$transaksi->id}}'" role="button">
                    <td>{{$transaksi['id_customer']}}</td>
                    <td>{{$transaksi['nama_customer']}}</td>    
                    <td>{{$transaksi['created_at']}}</td>
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
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->