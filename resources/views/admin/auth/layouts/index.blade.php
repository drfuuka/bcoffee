<!doctype html>
<html lang="en">

    <head>
        @include('admin.layouts.partials.title-meta')
        @include('admin.layouts.partials.head-css')
    </head>

    <body>

        <!-- Begin page -->
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">

                @yield('content')

                </div>
            </div>
        </div>

        @include('admin.layouts.partials.vendor-scripts')
        <script src="{{ asset('admin/assets/js/app.js')"></script>

    </body>

</html>
