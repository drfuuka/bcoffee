<!doctype html>
<html lang="en">

    <head>
        <?php echo $__env->make('admin.layouts.partials.title-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layouts.partials.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body>

        <!-- Begin page -->
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">

                <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.layouts.partials.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script src="{{ asset('admin/assets/js/app.js')"></script>

    </body>

</html>
<?php /**PATH D:\Code\bcoffee\resources\views/admin/auth/layouts/index.blade.php ENDPATH**/ ?>