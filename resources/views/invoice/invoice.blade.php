<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('invoice/logo.png') }}">
      </div>
      <div id="company">
        <h2 class="name">Clean & Clean</h2>
        <div>Bulak Perwira</div>
        <div>(021) 519-0450</div>
        <div><a href="mailto:company@example.com">cleanandclean@google.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $transaksi->member->nama }}</h2>
          <div class="address">{{ $transaksi->member->alamat }}</div>
          <div class="email">{{ $transaksi->member->tlp }}</div>
        </div>
        <div id="invoice">
          <h1>INVOICE {{ $transaksi->kode_invoice }}</h1>
          <div class="date">Tanggal Invoice: {{ $transaksi->tgl }}</div>
          <div class="date">Tanggal Selesai: {{ $transaksi->tgl }}</div>
          <div class="date">Tanggal Bayar: {{ $transaksi->tgl }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php $sum = 0; ?>
        @foreach ( $transaksi_detail as $data)
          <tr>
            <td class="no">{{ $loop->iteration }}</td>
            <td class="desc">{{ $data->paket->nama_paket }}</td>
            <td class="unit">{{ $data->paket->harga }}</td>
            <td class="qty">{{ $data->qty }}</td>
            <td class="total">{{ $total_harga = $data->paket->harga * $data->qty }}</td>
          </tr>
          <?php $sum += $total_harga ?>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUB TOTAL</td>
            <td>Rp {{ $sum }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">PAJAK 10%</td>
            <td>Rp {{ $pajak = $sum*($transaksi->pajak/100) }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">DISCOUNT </td>
            <td>Rp {{ $diskon = $sum*($transaksi->diskon/100) }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAMBAHAN</td>
            <td>Rp {{ $tambahan = $transaksi->biaya_tambahan }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>Rp {{ $sum + $tambahan + $pajak + $diskon}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice"></div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
