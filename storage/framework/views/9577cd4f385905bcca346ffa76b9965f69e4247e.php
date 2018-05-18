<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/clipboard/clipboard.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.css')); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Upload file</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo Form::open(array('route' => 'admin.media.upload', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone', 'class' => 'dropzone')); ?>

                    <?php echo e(csrf_field()); ?>

                <?php echo Form::close(); ?>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script src="<?php echo e(asset('js/dropzone-config.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>