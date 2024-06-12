@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- TODO :
    Buat Form untuk melakukan transaksi
    Buat API POST untuk create data baru -->
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <form action = "/" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="namaCustomer">Nama Pelanggan :</label>
                    <select class="custom-select rounded-0" id="namaCustomer">
                        <option>--Pilih Pelanggan--</option> 
                        @foreach($customer as $customer)
                            <option>{{$customer['customer_name']}}, {{$customer['lokasi']}}</option> 
                        @endforeach
                    </select>   
                </div>

                <!-- TODO
                Buat Repeater untuk item yang dibuat-->
                <table id="stockTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @foreach($stock as $stock)
                        <tr>
                            <td>{{$stock['id']}}</td>
                            <td>{{$stock['nama_barang']}}</td>
                            <td>{{$stock['jumlah']}}</td>
                            <td>
                                <div class="form-group">
                                    <label for="inputAlamat">Jumlah Awal Barang</label>
                                    <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukkan Jumlah Barang">
                                </div>
                            </td>
                        </tr>
                      @endforeach --}}
                    </tbody>
                  </table>

                <div class="form-group">
                    <label for="exampleInputFile">Purchase Order :</label>
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
                <button type="submit" class="btn btn-primary">Submit & Download Invoice</button>
            </div>
        </form>
    </div>


    <script>


    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->