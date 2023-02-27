<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="<?php echo e(asset('invoice/style.css')); ?>" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="<?php echo e(asset('invoice/logo.png')); ?>">
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
          <h2 class="name"><?php echo e($transaksi->member->nama); ?></h2>
          <div class="address"><?php echo e($transaksi->member->alamat); ?></div>
          <div class="email"><?php echo e($transaksi->member->tlp); ?></div>
        </div>
        <div id="invoice">
          <h1>INVOICE <?php echo e($transaksi->kode_invoice); ?></h1>
          <div class="date">Tanggal Invoice: <?php echo e($transaksi->tgl); ?></div>
          <div class="date">Tanggal Selesai: <?php echo e($transaksi->tgl); ?></div>
          <div class="date">Tanggal Bayar: <?php echo e($transaksi->tgl); ?></div>
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
        <?php $__currentLoopData = $transaksi_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="no"><?php echo e($loop->iteration); ?></td>
            <td class="desc"><?php echo e($data->paket->nama_paket); ?></td>
            <td class="unit"><?php echo e($data->paket->harga); ?></td>
            <td class="qty"><?php echo e($data->qty); ?></td>
            <td class="total"><?php echo e($total_harga = $data->paket->harga * $data->qty); ?></td>
          </tr>
          <?php $sum += $total_harga ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUB TOTAL</td>
            <td>Rp <?php echo e($sum); ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">PAJAK 10%</td>
            <td>Rp <?php echo e($pajak = $sum*($transaksi->pajak/100)); ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">DISCOUNT </td>
            <td>Rp <?php echo e($diskon = $sum*($transaksi->diskon/100)); ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAMBAHAN</td>
            <td>Rp <?php echo e($tambahan = $transaksi->biaya_tambahan); ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>Rp <?php echo e($sum + $tambahan + $pajak + $diskon); ?></td>
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
<?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/invoice/invoice.blade.php ENDPATH**/ ?>