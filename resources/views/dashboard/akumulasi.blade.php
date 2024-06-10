@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Tambah Pengeluaran Akumulasi</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<!-- TODO :
    Buat Form untuk melakukan transaksi
    Buat API POST untuk create data baru -->
<div class="card card-primary">
    <!-- /.card-header -->
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            {!! implode('', $errors->all(':message')) !!}
        </div>
    @endif
    <!-- form start -->
    <form action="/dashboard/akumulasi/create" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="namaCustomer">Nama Pelanggan :</label>
                <select class="custom-select rounded-0" id="namaCustomer" name="id_customer" onchange="">
                    <option value="">--Pilih Pelanggan--</option>
                    @foreach($customer as $cust)
                        <option value="{{$cust['id']}}">{{$cust['customer_name']}}, {{$cust['lokasi']}}</option>
                    @endforeach
                </select>
            </div>


            <label for="">Item :</label>
            <a class="btn btn-success my-2" id="tambah_barang">Tambah Item</a>


            <table id="tabel_barang" class="table border-0">
                <tr>
                    <td>
                        <div class="form-group">
                            <select class="custom-select rounded-0" id="namaBarang" name="input[0][id_barang]">
                                <option value="">--Pilih Barang--</option>
                                @foreach($stock as $st)
                                    <option value="{{$st['id']}}">{{$st['nama_barang']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="inputJumlah" name="input[0][jumlah]"
                                placeholder="Jumlah ">
                        </div>
                    </td>

                    <td>
                        <a type="button" class="btn btn-danger invisible">X</a>
                    </td>
                </tr>
            </table>


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
    $('#tambah_barang').click(function () {
        ++i;
        $('#tabel_barang').append(
            `<tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="input[${i}][id_barang]">
                                    <option>--Pilih Barang--</option> 
                                    @foreach($stock as $st)
                                        <option value="{{$st['id']}}">{{$st['nama_barang']}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="input[${i}][jumlah]" placeholder="Jumlah ">
                            </div>
                        </td>
                        
                        <td>
                        <a type="button" class="btn btn-danger remove-table-row">X</a>
                        </td>
                    </tr>`
        );
    });

    $(document).on('click', '.remove-table-row', function () {
        $(this).parents('tr').remove();
    });
</script>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>

</script>
@stop