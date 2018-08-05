<div class="dtable-td-wrapper" style="text-align:left;">
    <?php if(!empty($user_roles)): ?>
        <?php $__currentLoopData = $user_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="label label-success <?php echo e('label-' . $role->name); ?>">
                <?php echo e($role->display_name); ?>

            </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>