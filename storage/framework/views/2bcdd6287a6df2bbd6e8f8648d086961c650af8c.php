<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/bootstrap-select/css/bootstrap-select.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.listings.index')); ?>"> Back</a>
        </div>
    </div>
</div>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Listing</h3>
            </div>
            <?php echo Form::open(['route' => 'admin.listings.store','method'=>'POST']); ?>

            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Slug:</strong>
                    <?php echo Form::text('slug', null, ['placeholder' => 'Slug','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    <?php echo Form::select('category_id', $categories, null, ['class' => 'selectpicker']); ?>

                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('content', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']); ?>

                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
        $(function () {
            $('.selectpicker').selectpicker('toggle');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>