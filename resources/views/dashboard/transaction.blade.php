@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<!-- TODO :
    Buat Form untuk melakukan transaksi
    Buat API POST untuk create data baru -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulir Transaksi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action = "/" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="namaCustomer">Nama Pelanggan :</label>
                    <select class="custom-select rounded-0" id="namaCustomer">
                        <option></option>
                        <option>Value 1</option>
                        <option>Value 2</option>
                        <option>Value 3</option>
                    </select>   
                </div>

                <!-- TODO
                Buat Repeater untuk item yang dibuat-->
                <div class="form-row">
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="namaBarang">Item :</label>
                            <select class="custom-select rounded-0" id="namaBarang">
                                <option></option>
                                <option>Value 1</option>
                                <option>Value 2</option>
                                <option>Value 3</option>
                            </select>   
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="inputJumlah">&zwnj;</label>
                            <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Jumlah ">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Invoice :</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Pilih File Invoice / Nota</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

                <label>Tanggal Transaksi :</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <label>Tanggal Pelunasan :</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->