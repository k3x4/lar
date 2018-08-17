<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <?php if (\Entrust::can('feature-create')) : ?>
            <a class="btn btn-success" href="<?php echo e(route('admin.features.create')); ?>"> New Feature</a>
            <?php endif; // Entrust::can ?>
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
                <h3 class="box-title">Features list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group filter-options">
                    <b>Feature group:</b>
                    <?php echo Form::select('feature_group', [NULL => ''] + $featureGroups, null, [
                        'class' => 'form-control select2 dt-filter',
                        'style' => 'width: 200px;',
                        'data-key' => 'feature_group'
                    ]); ?>

                </div>
                <div class="form-group filter-options">
                    <b>Status:</b>
                    <?php echo Form::select('status', [NULL => '', 'publish' => 'Publish', 'draft' => 'Draft'], null, [
                        'class' => 'form-control select2 dt-filter',
                        'style' => 'width: 200px;',
                        'data-key' => 'status'
                    ]); ?>

                </div>
                <table class="table dtable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 45%;">Title</th>
                            <th style="width: 40%;">Group</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 10%;">Created</th>
                        </tr>
                    </thead>
                </table>
                <?php if (\Entrust::can('feature-delete')) : ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.features.destroy'], 'class' => 'deleteForm']); ?>

                    <?php echo Form::hidden('ids'); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger disabled', 'data-confirm' => 'Are you sure you want to delete?']); ?>

                    <?php echo Form::close(); ?>

                <?php endif; // Entrust::can ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <?php echo $__env->make('admin.datatables_script', [
        'url' => route('admin.features.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'title', 'name' => 'title'],
            ['data' => 'feature_group', 'name' => 'feature_group'],
            ['data' => 'status', 'name' => 'status'],
            ['data' => 'created_at', 'name' => 'created_at']
        ])
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>