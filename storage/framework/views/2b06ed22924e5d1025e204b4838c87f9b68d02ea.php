<?php $__env->startSection('title', 'Login'); ?>



<?php $__env->startSection('content'); ?>
<div class="col-md-8 col-lg-6 col-xl-5">
    <div class="card overflow-hidden">
        <div class="bg-secondary bg-soft">
            <div class="row">
                <div class="col-7">
                    <div class="text-secondary p-4">
                        <h5 class="text-secondary">Welcome Back !</h5>
                        <p>Sign in to continue to Skote.</p>
                    </div>
                </div>
                <div class="col-5 align-self-end">
                    <img src="<?php echo e(asset('admin/assets/images/profile-img.png')); ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="auth-logo">
                <a href="/" class="auth-logo-dark">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle" style="background-color: #efedde;">
                            <img src="<?php echo e(asset('images/logo/main.png')); ?>" alt="" class="rounded-circle" height="34">
                        </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <form method="POST" action="<?php echo e(route('admin.login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" placeholder="Masukkan nama pengguna" name="username" value="<?php echo e(old('username')); ?>">
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-group auth-pass-inputgroup">
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">
                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-secondary waves-effect waves-light" type="submit">Log In</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="mt-5 text-center">

        <div>
            <p>© <script>
                    document.write(new Date().getFullYear())
                </script> BCoffee. Crafted with <i class="mdi mdi-heart text-danger"></i> by Fuuka</p>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Code\bcoffee\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>