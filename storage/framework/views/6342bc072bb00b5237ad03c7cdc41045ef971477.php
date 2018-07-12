<?php $__env->startSection('page_title', 'Register'); ?>

<?php $__env->startSection('content'); ?>

<div class="container clearfix">

    <div class="center bottommargin-sm clearfix">
        <a href="<?php echo e(route('login')); ?>" class="button button-3d button-white button-light"><?php echo e(__('Login')); ?></a>
        <a href="#" class="button button-3d"><?php echo e(__('Register')); ?></a>
    </div>

    <div class="card divcenter" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">
            <h3>Register for an Account</h3>

            <form id="register-form" name="register-form" class="nobottommargin" action="<?php echo e(route('register')); ?>" method="post">

                <?php echo csrf_field(); ?>

                <div class="col_full">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" />
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
                    <label for="password">Choose Password:</label>
                    <input type="password" id="password" name="password" value="" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" />
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
                    <label for="password_confirmation">Re-enter Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control<?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" />
                    <?php if($errors->has('password_confirmation')): ?>
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col_full nobottommargin">
                    <button class="button button-3d nomargin" id="submit" name="submit" value="register">Register Now</button>
                </div>

            </form>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>