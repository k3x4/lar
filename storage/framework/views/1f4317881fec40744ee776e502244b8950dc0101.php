<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.roles.index')); ?>"> Back</a>
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
    <div class="col-lg-12 margin-tb">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Role <strong><?php echo e($role->display_name); ?></strong></h3>
            </div>
            <?php echo Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]); ?>

            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    <?php echo Form::text('display_name', null, ['placeholder' => 'Name','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control','style'=>'height:100px']); ?>

                </div>
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name'])); ?>

                        <?php echo e($value->display_name); ?></label>
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
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>