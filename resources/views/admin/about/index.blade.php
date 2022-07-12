@extends('admin.layouts.index')

@section('title', 'About')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Tentang Saya</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tentang Saya</li>
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
                        <h4 class="card-title">Tentang Saya</h4>
                        <p class="card-title-desc">
                            Informasi tentang about me pada website.
                        </p>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form method="post" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        @foreach ($about as $item)
                            <textarea class="form-control" id="editor" name="description">{!! $item['description'] !!}</textarea>
                        @endforeach
                    </div>

                    <div class="d-flex mt-3">
                        <button class="btn btn-primary ms-auto" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
            <!-- end card body -->
        </div>

    </div>
    <!-- end col -->

</div>
<script src="{{ asset('admin/assets/js/ckeditor/build/ckeditor.js') }}"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

@section('scripts')
<script>
    $(document).ready(function(){
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: {      
                    viewportTopOffset : 100,
                },
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: "{{route('admin.about.upload', ['_token' => csrf_token() ])}}",

                    // Define the CKFinder configuration (if necessary).
                    options: {
                        resourceType: 'Images'
                    }
                }
            } )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
            } )
            .catch( error => {
                console.error( error.stack );
            } );
    });
</script>
@endsection

@endsection
