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
            <?php if (\Entrust::can('listing-create')) : ?>
            <a class="btn btn-success" href="<?php echo e(route('admin.listings.create')); ?>"> New Listing</a>
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
                <h3 class="box-title">Listings list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group filter-options">
                    <b>Category:</b>
                    <?php echo Form::select('categories', [NULL => ''] + $categories, null, [
                        'class' => 'form-control select2 dt-filter',
                        'style' => 'width: 200px;',
                        'data-key' => 'category'
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
                            <th style="width: 10%;">Image</th>
                            <th style="width: 30%;">Title</th>
                            <th style="width: 15%;">Slug</th>
                            <th style="width: 15%;">Category</th>
                            <th style="width: 15%;">Author</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 10%;">Created</th>
                        </tr>
                    </thead>
                </table>
                <?php if (\Entrust::can('listing-delete')) : ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.listings.destroy'], 'class' => 'deleteForm']); ?>

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
        'url' => route('admin.listings.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'thumb', 'name' => 'thumb'],
            ['data' => 'title', 'name' => 'title'],
            ['data' => 'slug', 'name' => 'slug'],
            ['data' => 'category', 'name' => 'category'],
            ['data' => 'author', 'name' => 'author'],
            ['data' => 'status', 'name' => 'status'],
            ['data' => 'created_at', 'name' => 'created_at']
        ]),
        'author' => $author
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>