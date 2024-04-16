<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <style>
        * {
            font-size: 12px;
        }

        @media print {
            @page { margin: 0; }
            body { margin: 0.4cm; }
        }
    </style>
</head>
<body>
    <center>
        <b>Kasirku</b>
        <br>
        Nama Pembeli : {{ @$data_penjualan->Pembeli .' '.@$data_penjualan->pelanggan->NamaPelanggan }}
        <br>
        Tanggal : {{ @date('d-m-Y H:i') }}
        <hr>
    <table style="font-size: 10px;" cellpadding="2px">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga produk</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
           @if(@$detail != 'NULL')
            @php
              $no = 1;
              $total_semua = 0;
            @endphp
            @foreach($detail as $d)
              @php
                $total_semua +=$d->Subtotal;
              @endphp
              <tr>
                <td valign="top">{{ @$no++ }}</td>
                <td valign="top">{{ @$d->produk->NamaProduk }}</td>
                <td valign="top">{{ rupiah(@$d->produk->Harga) }}</td>
                <td valign="top">{{ @$d->JumlahProduk }}</td>
                <td valign="top">{{ rupiah(@$d->Subtotal) }}</td>
                
              </tr>
            @endforeach
           @endif
        </tbody>
      </table>
      <hr>
      <table cellpadding="6px" style="font-size: 12px;">
        <tr>
            <td>Total</td>
            <td>{{ rupiah(@$data_penjualan->TotalHarga) }}</td>
        </tr>
        <tr>
            <td>Tunai</td>
            <td>{{ rupiah(@$data_penjualan->tunai) }}</td>
        </tr>

        <tr>
            <td>Kembali</td>
            <td>{{ rupiah(@$data_penjualan->kembali) }}</td>
        </tr>
      </table>
      <p style="font-size: 12px">* <i>Barang yang telah dibeli tidak dapat dikembalikan kecuali ada perjanjian.</i></p>
    </center>
</body>
</html>

<script>
    window.print();
</script>