<?php $__env->startSection('title','Outlet'); ?>
<?php $__env->startSection('judul','Outlet'); ?>
<?php $__env->startSection('isi'); ?>

<form action="<?php echo e(route('admin.outlet.update', $outlet->id)); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group mb-3">
        <label for="nama">Nama Outlet</label>
        <input value="<?php echo e($outlet->nama); ?>" id="nama" name="nama" type="text" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <input value="<?php echo e($outlet->alamat); ?>" id="alamat" name="alamat" type="text" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="tlp">Telepon</label>
        <input value="<?php echo e($outlet->tlp); ?>" id="tlp" name="tlp" type="text" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            simpan
        </button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom-laundry10\resources\views/outlet/outlet_edit.blade.php ENDPATH**/ ?>