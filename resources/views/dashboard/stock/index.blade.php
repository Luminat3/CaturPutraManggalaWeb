@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Stock</h1>
@stop


@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

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
      
      <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#modalTambahStock">Tambah Stock</button>
      <a class="btn btn-primary my-2" href="/dashboard/stock/create">Tambah Item</a>
      <a class="btn btn-warning my-2" href="/dashboard/stock/produksi">Produksi Barang</a>
      <a class="btn btn-secondary my-2" href="/dashboard/stock/history">History</a>
      <table id="stockTable" class="table table-bordered table-hover">
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
                      <select class="custom-select rounded-0" id="namaBarang" name="input[0][id_barang]">
                          <option>--Pilih Barang--</option> 
                          @foreach($stock as $st)
                              <option value="{{$st['id']}}">{{$st['nama_barang']}}</option> 
                          @endforeach
                      </select>   
                  </div>
              </td>

              <td>
                  <div class="form-group">
                      <input type="number" class="form-control" id="inputJumlah" name="input[0][jumlah]" placeholder="Jumlah ">
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
                  <input type="file" class="form-control-input" id="formFileMultiple" name="image_bukti">
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


  <script>
        var i = 0;
        $('#tambah_barang').click(function(){
            ++i;
                $('#tabel_barang').append(
                `<tr>
                        <td>
                            <div class="form-group">
                                <select class="custom-select rounded-0" id="namaBarang" name="input[0][id_barang]">
                                    <option>--Pilih Barang--</option> 
                                    @foreach($stock as $stock)
                                        <option value="{{$stock['id']}}" >{{$stock['nama_barang']}}</option> 
                                    @endforeach
                                </select>   
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="inputJumlah" name="input[0][jumlah]" placeholder="Jumlah ">
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