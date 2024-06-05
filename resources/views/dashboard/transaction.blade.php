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
                            <option>{{$customer['customer_name']}}</option> 
                        @endforeach
                    </select>   
                </div>

                <!-- TODO
                Buat Repeater untuk item yang dibuat-->
                <label for="">Item :</label>
                <a class="btn btn-success my-2" id="tambah_barang">Tambah Item</a>
                <table id="tabel_barang" class="table border-0">
                    <tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="namaBarang">
                                    <option>--Pilih Barang--</option> 
                                    @foreach($stock as $stock)
                                        <option>{{$stock['nama_barang']}}</option> 
                                    @endforeach
                                </select>   
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="inputJumlah" placeholder="Jumlah ">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputHarga" name="inputHarga" placeholder="Harga ">
                            </div>
                        </td>
                        <td>
                        <a type="button" class="btn btn-danger invisible">X</a>
                        </td>
                    </tr>
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
        var i = 0;
        $('#tambah_barang').click(function(){
            ++i;
                $('#tabel_barang').append(
                `<tr>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="namaBarang[`+i+`]" name="namaBarang">
                                <option></option>
                                <option>Value 1</option>
                                <option>Value 2</option>
                                <option>Value 3</option>
                            </select>   
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="inputJumlah" name="inputJumlah[`+i+`]" placeholder="Jumlah ">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="inputHarga" name="inputHarga[`+i+`]" placeholder="Harga ">
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <a type="button" class="btn btn-danger remove-table-row">X</a>
                        </div>
                    </td>
                </tr>`
            );
        });

        $(document).on('click', '.remove-table-row', function(){
            $(this).parents('tr').remove();
        });
    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

<!-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop -->