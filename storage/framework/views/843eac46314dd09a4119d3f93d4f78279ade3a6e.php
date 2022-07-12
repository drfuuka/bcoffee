

<?php $__env->startSection('title', 'Tambah Data Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Jenis Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.master.jenis-produk.index')); ?>">Jenis Produk</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="">
                        <h4 class="card-title">Jenis Produk</h4>
                        <p class="card-title-desc">
                            Tambah data jenis produk pada BCoffee.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light" href="<?php echo e(route('admin.master.jenis-produk.index')); ?>"><i class="bx bx-arrow-back"></i> Kembali</a>
                    </div>
                </div>

                <?php if(session('status')): ?>
                    <div class="alert alert-success mb-1 mt-1">
                    <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.master.jenis-produk.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="jenis">Nama Jenis Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama jenis produk <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="jenis" id="jenis">
                                    <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-2 mb-2"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <label for="tampilkan">Tampilkan</label>
                                    <select name="tampilkan" id="" class="form-select <?php $__errorArgs = ['tampilkan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                    <?php $__errorArgs = ['tampilkan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger mt-2 mb-2"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
    
                            <div class="d-flex mt-3">
                                <button class="btn btn-primary ms-auto" type="submit">Simpan</button>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Code\bcoffee\resources\views/admin/master/jenis_produk/create.blade.php ENDPATH**/ ?>