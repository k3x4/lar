<?php $__env->startSection('page_title', 'Reset Password'); ?>

<?php $__env->startSection('content'); ?>

<div class="container clearfix">

    <div class="card divcenter noradius noborder" style="max-width: 400px;">

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('password.request')); ?>">

                <?php echo csrf_field(); ?>

                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <h3><?php echo e(__('Reset Password')); ?></h3>

                <h4 style="color:#999;"><?php echo e(__('Email:')); ?> <?php echo e($email ?? old('email')); ?></h4>
                <input id="email" type="hidden" name="email" value="<?php echo e($email ?? old('email')); ?>" required readonly>

                <label for="password"><?php echo e(__('Password')); ?></label>
                <div class="col_full">
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

                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                <div class="col_full">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                    <button type="submit" class="button button-3d nomargin">
                        <?php echo e(__('Reset Password')); ?>

                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>