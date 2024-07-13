@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


    <div class="card card-primary">
        <!-- .card-body -->
        <div class="card-body">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalTransaksiBaru">Buat Transaksi Baru</button>

            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="col-2">ID Pelanggan</th>
                        <th class="col-2">Nama Pelanggan</th>
                        <th class="col-3">Tanggal Transaksi</th>
                        <th class="col-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaction as $transaksi)
                <tr onclick="window.location='/dashboard/transaction/detail/{{$transaksi->id}}'" role="button">
                    <td>{{$transaksi['id_customer']}}</td>
                    <td>{{$transaksi['nama_customer']}}</td>
                    <td>{{$transaksi['created_at']}}</td>
                    <td>
                        @if($transaksi['status'] == false )
                            Belum Selesai
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalTransaksiBaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/dashboard/transaction/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Transaksi Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="namaCustomer">Nama Pelanggan :</label>
                        <select class="custom-select rounded-0" id="namaCustomer" name="id_customer" required>
                            <option selected disabled value="">-- Pilih Pelanggan --</option>
                            @foreach($customer as $cust)
                                <option value="{{$cust['id']}}">{{$cust['customer_name']}}, {{$cust['lokasi']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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

{{--
@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop  --}}
