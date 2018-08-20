<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.featuregroups.index')); ?>"> Back</a>
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

<?php echo Form::model($featureGroup, ['method' => 'PATCH', 'route' => ['admin.featuregroups.update', $featureGroup->id]]); ?>

<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Feature Group <strong><?php echo e($featureGroup->title); ?></strong></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        <?php echo app('arrilot.widget')->run('Status', [
            'title' => 'Status',
        ]); ?>

    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Use in categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php $__currentLoopData = $categoriesTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory => $childCategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong class="feature-cat-title"><?php echo e($parentCategory); ?>:</strong>
                    <?php $__currentLoopData = $childCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="feature-cat-item">
                        <?php echo e(Form::checkbox(
                                'categories[]',
                                $category->id,
                                in_array($category->id, $attachCategories) ? true : false
                            )); ?>

                        <?php echo e($category->title); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>