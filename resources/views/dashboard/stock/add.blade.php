@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tambah Stock</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- TODO :
    Buat Form untuk melakukan transaksi -->
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
        <form action = "/dashboard/stock/add" method="POST">
            @csrf
            <div class="card-body">
                <label for="">Item  <a class="text-danger">*</a> : </label>
                <a class="btn btn-success my-2" id="tambah_barang">Tambah Item</a>
                <table id="tabel_barang" class="table border-0">
                    <tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="nama_barang">
                                    <option>--Pilih Barang--</option> 
                                    @foreach($stock as $st)
                                        <option value="{{$st['id']}}">{{$st['nama_barang']}}</option> 
                                    @endforeach
                                </select>   
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Jumlah ">
                            </div>
                        </td>
                        
                        <td>
                        <a type="button" class="btn btn-danger invisible">X</a>
                        </td>
                    </tr>
                </table>


                <div class="form-group">
                    <label for="exampleInputFile">Bukti Terima Barang :  <a class="text-danger">*</a></label>
                    <div class="mb-3">
                        <input type="file" class="form-control-input" id="formFileMultiple" name="image">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Keterangan</label> 
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="text" class="form-control" id="inputKeterangan" name="keterangan" placeholder="Keterangan">
                        </div>
                    </div>
                </div>

                {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                                <select class="custom-select rounded-0" id="namaBarang" name="nama_barang">
                                    <option>--Pilih Barang--</option> 
                                    @foreach($stock as $st)
                                        <option>{{$st['nama_barang']}}</option> 
                                    @endforeach
                                </select>   
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Jumlah ">
                            </div>
                        </td>
                        
                        <td>
                        <a type="button" class="btn btn-danger remove-table-row">X</a>
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