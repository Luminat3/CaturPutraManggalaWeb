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

            {{-- Error Handling --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all(':message')) !!}
                </div>
            @endif

            <!-- form start -->
            <form action="/dashboard/customer/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputPelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="inputPelanggan" name="customer_name" placeholder="Masukkan nama pelanggan">
                    </div>

                    <div class="form-group">
                        <label for="inputAlamat">Lokasi</label>
                        <input type="text" class="form-control" id="inputAlamat" name="lokasi" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="inputTelepon">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="inputTelepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon">
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