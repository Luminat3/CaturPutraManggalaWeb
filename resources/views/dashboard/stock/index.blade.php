@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inventory</h1>
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">

      <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#modalTambahStock">Tambah Stock</button>
      <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalTambahItem">Tambah Jenis Barang</button>
      <button type="button" class="btn btn-warning my-2" data-toggle="modal" data-target="#modalProduksi">Pengurangan Barang</button>
      <a class="btn btn-secondary my-2" href="/dashboard/stock/history">History</a>
      <table id="myTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Modal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($stock as $st)
            <tr>
                <td>{{$st['id']}}</td>
                <td>{{$st['nama_barang']}}</td>
                <td>{{$st['jumlah']}}</td>
                <td>{{$st->formatRupiah('harga_modal')}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

{{-- Modal Menambah Jumlah Stock --}}
<div class="modal fade" id="modalTambahStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="/dashboard/stock/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body">
          <a class="btn btn-success my-2" id="tambah_barang">Tambah Item</a>
          <table id="tabel_barang" class="table border-0">
            <tr>
              <td>
                  <div class="form-group">
                      <select class="custom-select rounded-0" id="namaBarang" name="input[0][id_barang]" required>
                          <option selected disabled value="">--Pilih Barang--</option>
                          @foreach($stock as $st)
                              <option value="{{$st['id']}}">{{$st['nama_barang']}}</option>
                          @endforeach
                      </select>
                  </div>
              </td>

              <td>
                  <div class="form-group">
                      <input type="number" class="form-control" id="inputJumlah" name="input[0][jumlah]" placeholder="Jumlah " required>
                  </div>
              </td>

              <td>
              <a type="button" class="btn btn-danger invisible">X</a>
              </td>
            </tr>
          </table>

          <div class="form-group">
              <label for="exampleInputFile">Bukti Terima Barang :  <a class="text-danger">*</a> (File Gambar, Max 10 MB)</label>
              <div class="mb-3">
                  <input type="file" class="form-control-input" id="image_bukti" name="image_bukti" accept="image/*">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Keterangan</label>
                <div class="custom-file">
                    <input type="text" class="form-control" id="inputKeterangan" name="keterangan" placeholder="Keterangan">
                </div>
          </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


{{-- Modal Tambah Jenis Barang --}}
<div class="modal fade" id="modalTambahItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="/dashboard/stock/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Jenis Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body">
          <div class="form-group">
              <label for="inputPelanggan">Nama Barang</label>
              <input type="text" class="form-control" id="inputBarang" name="nama_barang" placeholder="Masukkan nama Barang" required>
          </div>

          <div class="form-group">
              <label for="inputAlamat">Jumlah Awal Barang</label>
              <input type="number" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukkan Jumlah Barang" required>
          </div>

          <div class="form-group">
              <label for="inputAlamat">Harga Modal</label>
              <input type="number" class="form-control" id="inputHargaModal" name="harga_modal" placeholder="Masukkan Harga Modal Barang" required>
          </div>
          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="is_unlimited" name = "is_unlimited" value = true>
              <label class="form-check-label" for="exampleCheck1">Ya, Barang ini berbentuk jasa</label>
          </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>



{{-- Modal Pengeluaran Barang Guna Produksi --}}
<div class="modal fade" id="modalProduksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="/dashboard/stock/decrease" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Form Pengurangan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <div class="modal-body">
          <a class="btn btn-success my-2" id="tambah_pengurangan_barang">Tambah Jenis Item</a>
          <table id="tabel_pengurangan_barang" class="table border-0">
            <tr>
              <td>
                  <div class="form-group">
                      <select class="custom-select rounded-0" id="namaBarang" name="inputPengurangan[0][id_barang]" required>
                          <option selected disabled value="">--Pilih Barang--</option>
                          @foreach($stock as $sto)
                              <option value="{{$sto['id']}}">{{$sto['nama_barang']}}</option>
                          @endforeach
                      </select>
                  </div>
              </td>

              <td>
                  <div class="form-group">
                      <input type="number" class="form-control" id="inputJumlah" name="inputPengurangan[0][jumlah]" placeholder="Jumlah ">
                  </div>
              </td>

              <td>
              <a type="button" class="btn btn-danger invisible">X</a>
              </td>
            </tr>
          </table>

          <div class="form-group">
            <label for="exampleInputFile">Keterangan</label>
                <div class="custom-file">
                    <input type="text" class="form-control" id="inputKeterangan" name="keterangan" placeholder="Keterangan">
                </div>
          </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


{{-- Script Untuk Repeater --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
        $('#myTable').DataTable( {
            order: []
        } );

        let table = new DataTable('#myTable');
    </script>

  <script>
        var i = 0;
        $('#tambah_barang').click(function(){
            ++i;
                $('#tabel_barang').append(
                `<tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="input[${i}][id_barang]" required>
                                    <option>--Pilih Barang--</option>
                                    @foreach($stock as $stoc)
                                        <option value="{{$stoc['id']}}" >{{$stoc['nama_barang']}}</option>
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

        $(document).on('click', '.remove-table-row', function(){
            $(this).parents('tr').remove();
        });


        var j = 0;
        $('#tambah_pengurangan_barang').click(function(){
            ++j;
                $('#tabel_pengurangan_barang').append(
                `<tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="inputPengurangan[${j}][id_barang]" required>
                                    <option>--Pilih Barang--</option>
                                    @foreach($stock as $s)
                                        <option value="{{$s['id']}}" >{{$s['nama_barang']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="inputPengurangan[${j}][jumlah]" placeholder="Jumlah ">
                            </div>
                        </td>

                        <td>
                        <a type="button" class="btn btn-danger remove-table-row">X</a>
                        </td>
                    </tr>`
            );
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
