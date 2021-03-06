<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dropzone-config.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.css')); ?>">

    <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<div class="modal fade" id="mediamanager">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Media manager</h4>
            </div>
        <div class="modal-body">
            
        <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                        Upload file
                    </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body dropzone-container">
                    <form></form><!-- FIX CLEAR FIRST NESTED FORM -->
                    <?php if (\Entrust::can('media-create')) : ?>
                        <?php echo Form::open([
                            'route' => 'admin.media.store',
                            'enctype' => 'multipart/form-data',
                            'id' => 'my-dropzone',
                            'class' => 'dropzone'
                        ]); ?>

                        <?php echo Form::close(); ?>

                    <?php endif; // Entrust::can ?>
                    </div>
                </div>
            </div>
        </div>

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
            <div class="modal-footer">
                <!--
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##

<?php echo $__env->make('admin.datatables_script', [
    'url' => route('admin.media.datapopup'),
    'columns' => json_encode([
        ['data' => 'action', 'name' => 'action'],
        ['data' => 'id', 'name' => 'id'],
        ['data' => 'thumb', 'name' => 'thumb'],
        ['data' => 'filename', 'name' => 'filename'],
        ['data' => 'original_name', 'name' => 'original_name'],
        ['data' => 'created_at', 'name' => 'created_at']
    ])
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $('#mediamanager').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        $(this).data('related', $invoker.attr('id'))
    });
</script>

<?php $__env->stopSection(); ?>