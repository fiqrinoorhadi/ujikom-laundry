<?php $__env->startSection('title','Outlet'); ?>
<?php $__env->startSection('judul','Outlet'); ?>
<?php $__env->startSection('isi'); ?>
<div class="card mb-4">
    <div class="card-header">
        <a href="<?php echo e(route('admin.outlet.create')); ?>"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>Tlp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $outlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($data->nama); ?></td>
                    <td><?php echo e($data->alamat); ?></td>
                    <td><?php echo e($data->tlp); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.outlet.edit', $data->id)); ?>">
                            <button class="btn btn-warning">edit</button>
                        </a>
                        <a href="<?php echo e(route('admin.outlet.destroy', $data->id)); ?>">
                            <button class="btn btn-danger">delete</button>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/outlet/outlet.blade.php ENDPATH**/ ?>