<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        
        <title></title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
        
        <script src="<?php echo e(asset('js/lib/jquery/jquery.min.js')); ?>"></script>

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <script src="<?php echo e(asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/AdminLTE.min.css')); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="<?php echo e(asset('adminlte/dist/css/skins/skin-blue.min.css')); ?>">
        
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <script src="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/dropzone-config.js')); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset('js/lib/dropzone/min/dropzone.min.css')); ?>">

        <script src="<?php echo e(asset('js/lib/datatables/js/jquery.dataTables.js')); ?>"></script>
        <script src="<?php echo e(asset('js/lib/datatables/js/dataTables.bootstrap.js')); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset('js/lib/datatables/css/dataTables.bootstrap.css')); ?>">

        <script src="<?php echo e(asset('adminlte/dist/js/adminlte.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/lib/tinymce/tinymce.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/admin.js')); ?>"></script>

    </head>

<body>
    <div class="row">
        <div class="col-lg-12">

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
                    <div class="box-body">
                    <?php echo Form::open([
                        'route' => 'admin.media.store',
                        'enctype' => 'multipart/form-data',
                        'id' => 'my-dropzone',
                        'class' => 'dropzone'
                    ]); ?>

                    <?php echo Form::close(); ?>

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
    </div>

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

</body>
</html>