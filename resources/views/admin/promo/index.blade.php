@extends('admin.layouts.index')

@section('title', 'Promo')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Promo</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Promo</li>
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
                        <h4 class="card-title">Promo</h4>
                        <p class="card-title-desc">
                            Lihat seluruh promo item yang terdaftar disini.
                        </p>
                    </div>
                    <div class="ms-auto">
                        <a class="btn btn-outline-primary" href="{{ route('admin.promo.create') }}">Tambah</a>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Promo</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Tampilkan Promo</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

            </div>
            <!-- end card body -->
        </div>

    </div>
    <!-- end col -->

</div>

@section('scripts')
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
                url: '{!! url()->current() !!}'
            },
            columns: [
				{ data: 'id', width: '5%' },
                { data: 'judul_promo', name: 'judul_promo' },
                { data: 'keterangan', name: 'keterangan' },
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
@endsection
@endsection
