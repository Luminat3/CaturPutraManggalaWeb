@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pelanggan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tambah Item</h3>
        </div>
                <!-- /.card-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/dashboard/stock/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputPelanggan">Nama Barang</label>
                        <input type="text" class="form-control" id="inputBarang" name="nama_barang" placeholder="Masukkan nama Barang">
                    </div>

                    <div class="form-group">
                        <label for="inputAlamat">Jumlah Awal Barang</label>
                        <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukkan Jumlah Barang">
                    </div>
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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