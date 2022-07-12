<nav class="navbar navbar-expand-md navbar-dark bg-primary py-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">bCoffee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 w-100 gap-3 text-uppercase">
            <li class="nav-item ms-md-auto ms-0">
                <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
            </li>
            <li>
                <a class="nav-link <?php echo e(request()->is('promo') ? 'active' : ''); ?>" href="<?php echo e(route('promo')); ?>">Promo</a>
            </li>
            <li>
                <a class="nav-link <?php echo e(request()->is('menu') ? 'active' : ''); ?>" href="<?php echo e(route('menu')); ?>">Our Menu</a>
            </li>
            <li>
                <a class="nav-link <?php echo e(request()->is('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About Us</a>
            </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH D:\Code\bcoffee\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>