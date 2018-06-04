<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('admin.roles.create')); ?>"> New Role</a>
        </div>
    </div>
</div>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Role Management</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>
                        <td><?php echo e($role->display_name); ?></td>
                        <td><?php echo e($role->description); ?></td>
                        <td>
                            <?php if (\Entrust::can('role-edit')) : ?>
                            <a class="btn btn-primary" href="<?php echo e(route('admin.roles.edit',$role->id)); ?>">Edit</a>
                            <?php endif; // Entrust::can ?>
                            <?php if (\Entrust::can('role-delete')) : ?>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']); ?>

                            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger', 'data-confirm' => 'Are you sure you want to delete?']); ?>

                            <?php echo Form::close(); ?>

                            <?php endif; // Entrust::can ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>        
<?php echo $roles->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>