<?php $__env->startSection('page_title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

<div class="container clearfix">

    <div class="center bottommargin-sm clearfix">
        <a href="#" class="button button-3d"><?php echo e(__('Login')); ?></a>
        <a href="<?php echo e(route('register')); ?>" class="button button-3d button-white button-light"><?php echo e(__('Register')); ?></a>
    </div>

    <div class="card divcenter" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">
            <form id="login-form" name="login-form" class="nobottommargin" action="<?php echo e(route('login')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <h3>Login to your Account</h3>

                <div class="col_full">
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <?php if($errors->has('email')): ?>
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col_full">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    <?php if($errors->has('password')): ?>
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col_full">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>

                <div class="col_full nobottommargin">
                    <button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">
                        <?php echo e(__('Login')); ?>

                    </button>
                    <a href="<?php echo e(route('password.request')); ?>" class="fright">Forgot Password?</a>
                </div>

                <div class="line line-sm"></div>

                <div class="center">
                    <h4 style="margin-bottom: 15px;">or Login with:</h4>
                    <a href="<?php echo e(url('social/redirect/facebook')); ?>" class="button button-rounded si-facebook si-colored">Facebook</a>
                    <span>or</span>
                    <a href="#" class="button button-rounded si-google si-colored">Google</a>
                </div>

            </form>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>