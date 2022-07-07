

<?php $__env->startSection('title', 'Product'); ?>

<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.product.index')); ?>">Produk</a></li>
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
                        <h4 class="card-title">Produk</h4>
                        <p class="card-title-desc">
                            Tambah data produk pada BCoffee.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-light" href="<?php echo e(route('admin.product.index')); ?>"><i class="bx bx-arrow-back"></i> Kembali</a>
                    </div>
                </div>

                <?php if(session('status')): ?>
                    <div class="alert alert-success mb-1 mt-1">
                    <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="nama-produk">Nama Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama produk" name="nama_produk" id="nama-produk">
                                    <?php $__errorArgs = ['nama_product'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-4 mt-3 mt-lg-0">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" placeholder="Masukkan harga" name="harga" id="harga">
                                    <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-8 mt-3">
                                    <label for="jenis">Pilih Jenis</label>
                                    <input type="text" class="form-control" placeholder="Masukkan jenis" name="jenis" id="jenis">
                                    
                                    <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
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

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        var dataTable = $("#datatable").DataTable({
            proccessing: true,
            serverSide: true,
            ordering: true,
            columnDefs: [ {
                searchable: false,
                orderable: false,
                targets: 0
            } ],
            order: [[ 1, 'asc' ]],
            ajax: {
                url: '<?php echo url()->current(); ?>'
            },
            columns: [
				{ data: 'id', width: '5%' },
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'harga', name: 'harga' },
                { data: 'jenis', name: 'jenis' },
                { data: 'foto', name: 'foto' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '5%',
                    className: 'text-center'
                },
            ]
        });

        dataTable.on( 'order.dt search.dt', function() {
            dataTable.column(0, ({ orderable: 'remove'})).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            });
        }).draw();

        $(".dataTables_length select").addClass('form-select form-select-sm');
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Code\bcoffee\resources\views/admin/product/create.blade.php ENDPATH**/ ?>