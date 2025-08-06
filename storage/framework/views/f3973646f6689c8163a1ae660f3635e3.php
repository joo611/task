<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Sign in to Your Account</h2>
                <p class="text-muted">Access your dashboard and manage your content.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-4">
                            <label for="email" class="form-label"><?php echo e(__('Email address')); ?></label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?php echo e(old('email')); ?>"
                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required
                                autofocus
                                autocomplete="email"
                            >
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="mb-4">
                            <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required
                                autocomplete="current-password"
                            >
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    <?php echo e(old('remember') ? 'checked' : ''); ?>

                                >
                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember me')); ?>

                                </label>
                            </div>
                            <?php if(Route::has('password.request')): ?>
                                <a href="<?php echo e(route('password.request')); ?>" class="text-decoration-none">
                                    <?php echo e(__('Forgot password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>

                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <?php echo e(__('Login')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="text-center mt-4">
                <p class="mb-0 text-muted">
                    Don't have an account?
                    <a href="<?php echo e(route('register')); ?>" class="text-primary text-decoration-none">Register</a>
                </p>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\quick-task\resources\views/auth/login.blade.php ENDPATH**/ ?>