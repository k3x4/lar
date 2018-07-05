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

<?php echo Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]); ?>

<div class="row">

    <div class="col-lg-8 margin-tb">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Role <strong><?php echo e($role->display_name); ?></strong></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    <?php echo Form::text('display_name', null, ['placeholder' => 'Name','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control','style'=>'height:100px']); ?>

                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permissions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <?php $perms = PERM::getPerms() ?>
                <?php $permsLines = PERM::convertLines($perms) ?>
                <table class="table table-striped permTable">
                    <tr>
                        <th></th>
                        <?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><input id="<?php echo e('perm-' . strtolower($key)); ?>" type="checkbox" class="selectAll"/> <?php echo e($key); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php $__currentLoopData = $permsLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permKey => $permLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><strong><?php echo e(ucfirst($permKey)); ?></strong></td>
                            <?php $__currentLoopData = $permLine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <?php echo e(Form::checkbox(
                                            'permission[]',
                                            $perm->id,
                                            in_array($perm->id, $rolePermissions) ? true : false,
                                            [
                                                'class' => 'name select',
                                                'data-perm' => current(explode('-', $perm->name))
                                            ]
                                        )); ?>

                                    <?php echo e($perm->display_name); ?>

                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-lg-4">

        <?php echo app('arrilot.widget')->run('Status', [
            'title' => 'Status'
        ]); ?>
                
    </div>

</div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>