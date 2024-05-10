@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pelanggan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tambah Pelanggan</h3>
        </div>
                <!-- /.card-header -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputPelanggan">Nama Pelanggan</label>
                        <input type="string" class="form-control" id="inputPelanggan" placeholder="Masukkan nama pelanggan">
                    </div>

                    <div class="form-group">
                        <label for="inputAlamat">Alamat</label>
                        <input type="password" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="inputTelepon">Nomor Telepon</label>
                        <input type="password" class="form-control" id="inputTelepon" placeholder="Masukkan Nomor Telepon">
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