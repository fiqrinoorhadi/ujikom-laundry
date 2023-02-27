<?php $__env->startSection('title','User'); ?>
<?php $__env->startSection('judul','User'); ?>
<?php $__env->startSection('isi'); ?>
<div class="card mb-4">
    <div class="card-header">
        <a href="<?php echo e(route('admin.user.create')); ?>"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Outlet</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($data->nama); ?></td>
                    <td><?php echo e($data->username); ?></td>
                    <td>********</td>
                    <td><?php echo e($data->outlet->nama); ?></td>
                    <td><?php echo e($data->role); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.user.edit', $data->id)); ?>">
                            <button class="btn btn-warning">edit</button>
                        </a>
                        <a href="<?php echo e(route('admin.user.destroy', $data->id)); ?>">
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

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/user/user.blade.php ENDPATH**/ ?>