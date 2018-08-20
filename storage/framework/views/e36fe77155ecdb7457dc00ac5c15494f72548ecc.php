<?php extract($config) ?>

<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/bootstrap-select/css/bootstrap-select.min.css')); ?>">
<?php $__env->stopSection(); ?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <?php echo Form::select('field_group_id', $fieldGroups, null, [
                'class' => 'selectpicker',
                'data-width' => 'fit'
            ]); ?>

        </div>
    </div>
</div>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
        $( document ).ready(function() {
            $('.selectpicker').selectpicker('toggle');
        });
    </script>
<?php $__env->stopSection(); ?>