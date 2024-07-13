@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detail Transaksi</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

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
            @if ($transaksi['status'] == false)
                <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#ModalCenter">Tambah Pengeluaran Akumulasi</button>
                <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#modalConfirm">Selesaikan Transaksi</button>
            @else
                <a class="btn btn-primary my-2" href="/dashboard/transaction/invoice/{{$transaksi['id']}}">Input Harga Penjualan</a>
                <a class="btn btn-primary my-2" href="/dashboard/transaction/invoice/{{$transaksi['id']}}/create">Cetak Invoice</a>
            @endif


            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Modal / pcs</th>
                        @if ($transaksi['status'] == false)

                        @else
                            <th>Harga Jual / pcs</th>
                        @endif
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{$data['nama_barang']}}</td>
                            <td>{{$data['jumlah']}}</td>
                            <td>{{$data ->formatRupiah('harga_modal')}}</td>
                            @if ($transaksi['status'] == false)

                            @else
                                <td>{{$data -> formatRupiah('harga_jual')}}</td>
                            @endif
                            <td>{{$data['created_at']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class ="table table-bordered">
                <tr>
                    <td><h5>Total Modal</h5></td>
                    <td>Rp {{ number_format($modal, 0) }}</td>

                </tr>
            </table>
        </div>
                <!-- /.card-body -->
    </div>



    <div class="modal fade bd-example-modal-lg" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Formulir Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <form action="/dashboard/transaction/detail/{{$transaksi -> id}}/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <a class="btn btn-success my-2" id="tambah_barang">Tambah Item</a>
                        <table id="tabel_barang" class="table border-0">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="custom-select rounded-0" id="namaBarang" name="input[0][id_barang]">
                                            <option value="">--Pilih Barang--</option>
                                            @foreach($stock as $st)
                                                <option value="{{$st['id']}}"> {{$st['nama_barang']}} - Tersedia :
                                                    @if ($st->unlimited_supply)
                                                        Unlimited Supply
                                                    @else
                                                        Tersedia: {{ $st->jumlah }}
                                                    @endif
                                                </option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <h4>Apakah anda ingin menyelesaikan transaksi ?</h4>
                    <h4>Pastikan semua barang yang diinput sudah sesuai.</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form action="/dashboard/transaction/detail/{{$transaksi -> id}}/selesai" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Ya, Selesaikan</button>
                        <form>
                    </div>
            </div>
        </div>
    </div>
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
                                    <option value="{{$st['id']}}">{{$st['nama_barang']}} - Tersedia :
                                        @if ($st->unlimited_supply)
                                            Unlimited Supply
                                        @else
                                            Tersedia: {{ $st->jumlah }}
                                        @endif
                                    </option>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            order: []
        } );

        let table = new DataTable('#myTable');
    </script>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

 {{-- @section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop --}}
