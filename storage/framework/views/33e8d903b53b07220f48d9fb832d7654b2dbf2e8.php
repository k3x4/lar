<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <script src="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/clipboard/clipboard.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.css')); ?>">

    <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Upload files <span id="counter"></span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo Form::open(array('route' => 'admin.media.store', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone', 'class' => 'dropzone')); ?>

                    <?php echo e(csrf_field()); ?>

                <?php echo Form::close(); ?>

            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Media list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table dtable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 1%;">Image</th>
                            <th style="width: 30%;">Filename</th>
                            <th style="width: 58%;">Original filename</th>
                            <th style="width: 10%;">Uploaded</th>
                        </tr>
                    </thead>
                </table>
                <?php if (\Entrust::can('media-delete')) : ?>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.media.destroy'], 'class' => 'deleteForm']); ?>

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
    <script src="<?php echo e(asset('js/dropzone-config.js')); ?>"></script>

    <script>
    $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(url("admin/media/data")); ?>',
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
            },
            {
                "targets": [ 2 ],
                "orderable": false,
                "searchable": false
            }
        ],
        columns: [
            {data: 'action', name: 'action'},
            {data: 'id', name: 'id'},
            {data: 'thumb', name: 'thumb'},
            {data: 'filename', name: 'filename'},
            {data: 'original_name', name: 'original_name'},
            {data: 'created_at', name: 'created_at'}
        ]
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>