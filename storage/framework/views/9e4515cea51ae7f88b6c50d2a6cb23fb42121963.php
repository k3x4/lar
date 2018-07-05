<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.users.index')); ?>"> Back</a>
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

<?php echo Form::open(['route' => 'admin.users.store','method'=>'POST']); ?>

<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New User</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    <?php echo Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <?php echo Form::text('email', null, ['placeholder' => 'Email','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Password:</strong>
                    <?php echo Form::password('password', ['placeholder' => 'Password','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    <?php echo Form::password('confirm-password', ['placeholder' => 'Confirm Password','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    
                    <?php echo Form::select('role', $roles, 4, ['class' => 'form-control select2']); ?>

                </div>
            </div>
        </div>
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