<!doctype html>
<html lang="en">

    <head>
        <?php echo $__env->make('admin.layouts.partials.title-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layouts.partials.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php echo $__env->make('admin.layouts.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>

				<?php echo $__env->make('admin.layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			</div>

		</div>

		<?php echo $__env->make('admin.layouts.partials.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<script src="assets/js/app.js"></script>
        <?php echo $__env->yieldContent('scripts'); ?>

    </body>

</html>
<?php /**PATH D:\Code\bcoffee\resources\views/admin/layouts/index.blade.php ENDPATH**/ ?>