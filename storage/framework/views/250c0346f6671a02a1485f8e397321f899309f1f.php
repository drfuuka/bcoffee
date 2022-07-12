

<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Produk</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk</li>
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
                            Lihat seluruh produk item yang terdaftar disini.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-outline-primary" href="<?php echo e(route('admin.produk.create')); ?>">Tambah</a>
                    </div>
                </div>

                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0"><?php echo e($message); ?></p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jenis</th>
                            <th>Foto</th>
                            <th>Tampilkan Produk</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

            </div>
            <!-- end card body -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="populer-modal" tabindex="-1" aria-labelledby="populer-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="populer-modalLabel">Jadikan produk <b class="text-primary" id="populer-product-name"></b> populer?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.produk.create-populer')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" id="id-parameter" name="id_parameter" value="">
                            <label for="populer-order">Pilih Urutan</label>
                            <select name="populer_order" id="populer-order" class="form-select">
                                <?php $__currentLoopData = $availableOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item); ?>"><?php echo e($item); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end card -->

    </div>
    <!-- end col -->

</div>

<script>
    function getDataPopuler(product_name, id) {
        $("#populer-product-name").text(product_name);
        $("#id-parameter").val(id);
    }
    function toggleShow(param) {
        if($("form#update-"+param+" #toggle-show-"+param).is(":checked")) {
            $("form#update-"+param+" #tampilkan-"+param).val('1');
        } else {
            $("form#update-"+param+" #tampilkan-"+param).val('2');
        }
        setTimeout(() => {
            $("form#update-"+param+" button").trigger('click');
        }, 300);
        console.log($("form#update-"+param+" #tampilkan-"+param).val());
    }
</script>

<?php $__env->startSection('scripts'); ?>
<script>
    $("#populer-modal").on('hide.bs.modal', function(){
        $("#id-parameter").val("");
    });
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
                { data: 'tampilkan', name: 'tampilkan' },
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Code\bcoffee\resources\views/admin/produk/index.blade.php ENDPATH**/ ?>