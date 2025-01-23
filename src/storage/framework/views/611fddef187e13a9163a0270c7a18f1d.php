<?php $__env->startSection('title', 'Вход в административную панель'); ?>
<?php $__env->startSection('header_hidden', true); ?>
<?php $__env->startSection('footer_hidden', true); ?>

<?php $__env->startSection('content'); ?>

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Авторизация</h3></div>
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.login.execute')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-floating mb-3">
                                        <input name="email" value="<?php echo e(old('email')); ?>" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail" type="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email</label>
                                        <?php if($errors->has('email')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" value="<?php echo e(old('password')); ?>" class="form-control <?php if($errors->has('password')): ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputPassword" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                        <?php if($errors->has('password')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                      <button class="btn btn-primary px-4" type="submit">Войти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Webdement.ru <?php echo e(date('Y')); ?></div>
                    <div>
                        <a href="https://webdement.ru/" target="_blank">Developer's website</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/login.blade.php ENDPATH**/ ?>