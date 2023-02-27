<?php $__env->startSection('title','Transaksi Detail'); ?>
<?php $__env->startSection('judul','Transaksi Detail'); ?>
<?php $__env->startSection('isi'); ?>
<div class="row">
    <div class="col-5">
        <form action="<?php echo e(route('admin.transaksidetail.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
                <input class="form-control" type="hidden" value="<?php echo e($transaksi->id); ?>" name="transaksis_id">
                    <div class="form-group mb-1">
                        <label>Kode Invoice</label>
                        <input class="form-control" type="text" value="<?php echo e($transaksi->kode_invoice); ?>" disabled>
                    </div>
                    <div class="form-group mb-1">
                        <label for="pakets_id">Paket</label>
                        <select name="pakets_id" class="form-control <?php $__errorArgs = ['pakets_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">--Pilih Paket--</option>
                            <?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_paket); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['pakets_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group mb-1">
                        <label for="qty">Qty</label>
                        <input id="qty" name="qty" type="number" class="form-control <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group mb-1">
                        <label for="biaya_tambahan">Rubah/Tambah Biaya Tambahan</label>
                        <input id="biaya_tambahan" value="0" name="biaya_tambahan" type="number" class="form-control <?php $__errorArgs = ['biaya_tambahan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div class="form-text">Diisi terakhir ketika paket yang dipilih sudah semua, sebelum klik tombol selesai </div>
                        <?php $__errorArgs = ['biaya_tambahan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            simpan
                        </button>
                    </div>
        </form>
    </div>
    <div class="col-7">
        <h6>Biaya tambahan : <?php echo e($tambah = $transaksi->biaya_tambahan); ?></h6>
        <table class="table table-striped">
            <tr>
                <th>No.</th>
                <th>Paket</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
            <?php $sum = 0; ?>
            <?php $__currentLoopData = $transaksi_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($data->paket->nama_paket); ?></td>
                <td><?php echo e($data->qty); ?></td>
                <td>Rp <?php echo e($data->paket->harga); ?></td>
                <td>Rp <?php echo e($total_harga = $data->paket->harga * $data->qty); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.transaksidetail.destroy',$data->id)); ?>">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
            <?php $sum += $total_harga ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3"></td>
                <td><b>Sub Total</b></td>
                <td colspan="2"><b>: Rp <?php echo e($sum + $tambah); ?></b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Pajak</b></td>
                <td colspan="2"><b>: Rp <?php echo e($pajak = $sum*($transaksi->pajak/100)); ?></b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Diskon</b></td>
                <td colspan="2"><b>: Rp <?php echo e($diskon = $sum*($transaksi->diskon/100)); ?></b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Tambahan</b></td>
                <td colspan="2"><b>: Rp <?php echo e($tambahan = $transaksi->biaya_tambahan); ?></b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Drand Total</b></td>
                <td colspan="2"><b>: Rp <?php echo e($sum + $tambahan + $pajak + $diskon); ?></b></td>
            </tr>
            <tr>
                <td><a href="<?php echo e(route('admin.transaksi')); ?>"><button class="btn btn-primary">Selesai</button></a></td>
            </tr>

        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/transaksi_detail/transaksi_detail_create.blade.php ENDPATH**/ ?>