<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/PROJECT/user/bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <style>
    .header-text {
      color: #0000ff;
    }
    .border-bottom-blue {
      border-bottom: 3px solid #0000ff;
    }
    .font-times {
      font-family: 'Times New Roman', Times, serif;
    }
    .thick-border {
      border-width: 0.4mm !important;
      border-color: black !important;
    }
    .table th, .table td {
      padding: 0.3rem; /* Adjust padding as needed */
    }
  </style>
</head>
<body>
  <div class="container">
    {{-- <div class="row">
        <div class="col-auto">
            <img src="storage/logo_untuk_invoice_asadfasdasdfasdf.png" alt="Company Logo" style="height: 90px;">
            <h1 class="d-inline header-text" style="font-size: 20px;">
                <strong>PT. CATUR PUTRA MANGGALA</strong>
            </h1>
        </div>
    </div> --}}

    <table>
        <tr>
            <td rowspan="2">
                <img src="storage/logo_untuk_invoice_asadfasdasdfasdf.png" alt="Company Logo" style="height: 90px;">
            </td>
            <td>
                <h1 class="d-inline header-text" style="font-size: 25px;">
                    <strong>PT. CATUR PUTRA MANGGALA</strong>
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <div class="header-text mt-2" style="font-size: 13px;">
                    <strong>CONTRACTOR - DEVELOPER - SUPPLIER - GENERAL TRADING</strong>
                </div>
            </td>
        </tr>
    </table>

    <div class="text-center mb-4 border-bottom-blue pb-3">
        {{-- <div class="header-text mt-2" style="font-size: 14px;">
            <strong>CONTRACTOR - DEVELOPER - SUPPLIER - GENERAL TRADING</strong>
        </div> --}}
        <div class="header-text mt-2" style="font-size: 10px;">
            JL Residen H.A. Rozak No 07F Palembang 30114 Telp. 0812 7152 5100 Email: caturputramanggala88@gmail.com
        </div>
    </div>



    <div class="text-center mb-4 font-times">
        <h4>INVOICE</h4>
    </div>

    <table style="width: 100%; margin:0;">
        <thead>
            <tr>
                <td>
                    <div class="font-times" style="font-size: 12px;">
                        PT. Catur Putra Manggala<br>
                        Jl. Residen H. A. Rozak No. 07F Palembang<br>
                        Telp. 0812 - 71525100 / 0812 - 74744203<br>
                        <br>
                    </div>
                </td>
                <td class="text-right">
                    <div class="text-right font-times" style="font-size: 12px;">
                        No. : {{$transaksi['id']}}/CPM/IVC/VI/24<br>
                        Tanggal : {{ $transaksi['updated_at'] }}
                    </div>
                </td>
            </tr>
        </thead>
    </table>

    <div class="mb-4 font-times" style="font-size: 12px;">
        DitujuKan Kepada :<br>
        {{ $transaksi['nama_customer'] }}<br>
        Lokasi di {{ $customer['lokasi'] }}
    </div>

    <table class="table table-bordered border-black font-times thick-border" style="font-size: 12px;">
        <thead class="thick-border">
            <tr class="thick-border">
                <th class="thick-border">No.</th>
                <th class="thick-border">Uraian Pekerjaan</th>
                <th class="thick-border">Quantity</th>
                <th class="thick-border">Harga</th>
                <th class="thick-border">Jumlah</th>
            </tr>
        </thead>
        <tbody>
        @php $no = 1; @endphp
        @foreach($detailTransaksi as $data)
            <tr>
                <td class="thick-border">{{ $no++ }}</td>
                <td class="thick-border">{{ $data->nama_barang }}</td>
                <td class="thick-border">{{ $data->total_jumlah }}</td>
                <td class="thick-border">Rp{{ number_format($data->harga_jual, 2) }}</td>
                <td class="thick-border">Rp{{ number_format($data->total_harga, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="thick-border" colspan="4"><strong>Total Pekerjaan</strong></td>
                <td class="thick-border"><strong>Rp{{ number_format($grandTotal, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
    <strong class="font-times" style="font-size: 13px;">TERBILANG : {{$terbilang}} rupiah</strong>

    <p class="mt-5 font-times text-right" style="font-size: 12px;">PT. CATUR PUTRA MANGGALA</p>
    <p style="height: 10px;">&nbsp;</p>
    <p class="mt-5 font-times text-right" style="font-size: 12px;"><strong>(Roger Einstein)</strong></p>

    <div class="font-times" style="font-size: 12px;">
        <p class="m-0">Pembayaran dapat di Transfer ke :</p>
        <p class="m-0">REK BCA : 1510938999 an PT. CATUR PUTRA MANGGALA</p>
    </div>
  </div>
</body>
</html>
