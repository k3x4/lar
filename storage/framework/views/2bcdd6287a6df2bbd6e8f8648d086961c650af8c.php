<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.products.index')); ?>"> Back</a>
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
                <h3 class="box-title">Create New Product</h3>
            </div>
            <?php echo Form::open(['route' => 'admin.products.store','method'=>'POST']); ?>

            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <elfinder-controls
                        name="feature_image"
                        base="<?php echo e(url('images')); ?>"
                        ></elfinder-controls>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']); ?>

                </div>
                <div class="form-group">
                    <strong>Categories:</strong>
                    <br/>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label><?php echo e(Form::checkbox('category[]', $category->id, in_array($category->id, $productCategories) ? true : false)); ?>

                        <?php echo e($category->display_name); ?></label>
                    <br/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="<?php echo e(asset('js/elfinder.js')); ?>"></script>
<script src="<?php echo e(asset('js/standalonepopup.k3x4.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>