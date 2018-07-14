<?php $__env->startSection('page_title', 'Reset Password'); ?>
<?php $__env->startSection('hide_title_wrapper', 'yes'); ?>

<?php $__env->startSection('content'); ?>

<div class="container clearfix">

    <div class="card divcenter noradius noborder" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">

            <?php if(session('status')): ?>
                <div class="style-msg successmsg">
                    <div class="sb-msg">
                        <i class="icon-thumbs-up"></i>
                        <?php echo e(session('status')); ?>

                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php endif; ?>

            <form id="login-form" name="login-form" class="nobottommargin" action="<?php echo e(route('password.email')); ?>" method="post">
                
                <?php echo csrf_field(); ?>

                <h3><?php echo e(__('Reset Password')); ?></h3>

                <label for="email"><?php echo e(__('E-Mail Address')); ?>:</label>
                <div class="col_full">
                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                    <?php if($errors->has('email')): ?>
                        <div class="style-msg errormsg">
							<div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </div>
						</div>
                    <?php endif; ?>
                </div>

                <div class="col_full nobottommargin">
                    <button type="submit" class="button button-3d nomargin">
                        <?php echo e(__('Send Password Reset Link')); ?>

                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>