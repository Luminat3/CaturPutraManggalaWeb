<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
      @page {
          size: A4;
          margin: 20mm;
      }
      .header {
          text-align: center;
          border-bottom: 3px solid #0000ff;
          padding-bottom: 10px;
          margin-bottom: 20px;
      }
      .header img {
          height: 50px; /* Original size of the logo */
          vertical-align: middle;
      }
      .header h1 {
          display: inline;
          color: #0000ff;
          margin: 0;
          font-size: 24px; /* Original font size */
      }
      .header .subtitle {
          color: #0000ff;
          font-size: 14px; /* Original font size */
      }
      .header .contact-info {
          font-size: 12px; /* Original font size */
          margin-top: 10px;
          color: #0000ff; /* Changed to blue */
      }
      .invoice-header {
          text-align: center;
          font-size: 16px;
          margin-bottom: 20px;
      }
      .invoice-details {
          font-size: 12px;
          font-family: 'Times New Roman', Times, serif; /* Changed to Times New Roman */
      }
      .recipient-details {
          margin-top: 20px;
          font-size: 12px;
          font-family: 'Times New Roman', Times, serif; /* Changed to Times New Roman */
      }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="header">
      <img src="{{ asset('path/to/logo.png') }}" alt="Company Logo">
      <h1>PT. CATUR PUTRA MANGGALA</h1>
      <div class="subtitle">
          GENERAL CONTRACTOR - DEVELOPER - SUPPLIER - GENERAL TRADING
      </div>
      <div class="contact-info">
          JL Residen H.A. Rozak No 07F Palembang 30114<br>
          Telp. 0812 7152 5100<br>
          Email: caturputramanggala88@gmail.com
      </div>
  </div>

  <div class="invoice-header">
      <h2>INVOICE</h2>
  </div>

  <div class="invoice-details row">
      <div class="col-6">
          PT. Catur Putra Manggala<br>
          Jl. Residen H. A. Rozak No. 07F Palembang<br>
          Telp. 0812 - 71525100 / 0812 - 74744203
      </div>
      <div class="col-6 text-right">
          No. : 169/CPM/IVC/VI/24<br>
          Tanggal : TANGGAL TRANSAKSI SELESAI
      </div>
  </div>

  <div class="recipient-details mt-4">
      DitujuKan Kepada :<br>
      NAMA PELANGGAN<br>
      Lokasi di NAMA LOKASI PROYEK
  </div>
</div>

</body>
