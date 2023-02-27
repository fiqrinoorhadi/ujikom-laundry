<?php $__env->startSection('title','Transaksi'); ?>
<?php $__env->startSection('judul','Transaksi'); ?>
<?php $__env->startSection('isi'); ?>
<div class="card mb-4">
    <div class="card-header">
        <a href="<?php echo e(route('admin.transaksi.create')); ?>"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Invoice</th>
                    <th>Member</th>
                    <th>Status Laundry</th>
                    <th>Status Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($data->kode_invoice); ?></td>
                    <td><?php echo e($data->member->nama); ?></td>
                    <td>
                        <?php if($data->status_laundry == 'proses'): ?>
                            <button class="btn btn-warning">proses</button>
                        <?php elseif($data->status_laundry == 'selesai'): ?>
                            <button class="btn btn-success">selesai</button>
                        <?php elseif($data->status_laundry == 'diambil'): ?>
                            <button class="btn btn-primary">diambil</button>
                        <?php else: ?>
                            <button class="btn btn-secondary">baru</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($data->status_dibayar == 'dibayar' ): ?>
                            <button class="btn btn-primary">dibayar</button>
                        <?php else: ?>
                            <button class="btn btn-warning">belum dibayar</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('admin.transaksidetail.create',$data->id)); ?>">
                            <button class="btn btn-success">Detail</button>
                        </a>
                        <a href="<?php echo e(route('admin.transaksi.destroy',$data->id)); ?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <a href="<?php echo e(route('admin.invoice',$data->id)); ?>">
                            <button class="btn btn-primary">Cetak</button>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/transaksi/transaksi.blade.php ENDPATH**/ ?>