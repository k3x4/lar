<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">

    <script src="<?php echo e(asset('js/lib/icheck-2/icheck.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/icheck-2/skins/minimal/blue.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <?php if (\Entrust::can('category-create')) : ?>
            <a class="btn btn-success" href="<?php echo e(route('admin.categories.create')); ?>"> New Category</a>
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
                <h3 class="box-title">Categories list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table dtable table-bordered table-striped">
                    <tr>
                        <thead>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 20%;">Display Name</th>
                            <th style="width: 20%;">Slug</th>
                            <th style="width: 50%;">Description</th>
                            <th style="width: 10%;">Created</th>
                        </thead>
                    </tr>
                </table>
                <?php if (\Entrust::can('category-delete')) : ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.categories.destroy'], 'class' => 'deleteForm']); ?>

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
    <script>
    $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(route("admin.categories.data")); ?>',
        order: [
            [ 1, "desc" ]
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "orderable": false,
                "searchable": false
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        columns: [
            {data: 'action', name: 'action'},
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'slug', name: 'slug'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'}
        ],
        "initComplete": function( settings, json ) {
            $('input[type="checkbox"]').icheck({
                checkboxClass: 'icheckbox_minimal-blue',
            });
        }
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>