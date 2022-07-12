<!doctype html>
<html lang="en">

    <head>
        @include('admin.layouts.partials.title-meta')
        @include('admin.layouts.partials.head-css')
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('admin.layouts.partials.menu')

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                </div>

				@include('admin.layouts.partials.footer')

			</div>

		</div>

		@include('admin.layouts.partials.vendor-scripts')
		<script src="{{ asset('admin/assets/js/app.js')}}"></script>
        @yield('scripts')

    </body>

</html>
