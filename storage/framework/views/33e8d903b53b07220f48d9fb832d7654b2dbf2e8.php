<?php $__env->startSection('head'); ?>
##parent-placeholder-1a954628a960aaef81d7b2d4521929579f3541e6##
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <script src="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dropzone-config.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.css')); ?>">

    <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box-group" id="accordion">
          <div class="panel box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  Upload file
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="box-body">
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
    <?php echo $__env->make('admin.datatables_script', [
        'url' => route('admin.media.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'thumb', 'name' => 'thumb'],
            ['data' => 'filename', 'name' => 'filename'],
            ['data' => 'original_name', 'name' => 'original_name'],
            ['data' => 'created_at', 'name' => 'created_at']
        ])
    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>