<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.features.index')); ?>"> Back</a>
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

<?php echo Form::open(['route' => 'admin.features.store', 'method' => 'POST']); ?>

<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Feature</h3>
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
            'draft' => true
        ]); ?>
        
        <?php echo app('arrilot.widget')->run('FeatureGroup', [
            'title' => 'Feature group',
            'featureGroups' => $featureGroups
        ]); ?>
              
    </div>

</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>