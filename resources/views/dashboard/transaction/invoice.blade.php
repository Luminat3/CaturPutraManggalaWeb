@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cetak Invoice</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
                <!-- /.card-header -->
        <div class="card-body">
            <form action = "/dashboard/transaction/invoice/{{$data}}/update" method="POST">
                @csrf
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga / pcs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailTransaksi as $data)
                            <tr>
                                <td><input type="text" name="nama_barang[]" class="form-control" value="{{ $data->nama_barang }}" readonly></td>
                                <td><input type="number" name="jumlah[]" class="form-control" value="{{ $data->jumlah }}" readonly></td>
                                <td>
                                    <input type="number" name="harga_pcs[]" class="form-control" placeholder="Masukkan harga">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Submit</button>
            <form>
        </div>
    </div>


@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

 {{-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop --}}
