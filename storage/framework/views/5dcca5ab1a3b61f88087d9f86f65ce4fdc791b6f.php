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
        
        <title>Admin panel</title>

        <?php $__env->startSection('head'); ?>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
        
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
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

        <?php echo $__env->yieldSection(); ?>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        <div class="wrapper">

            <?php echo $__env->make('admin.layout.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('admin.layout.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
        
                    <?php echo $__env->yieldContent('content'); ?>
                    
                </section>
                <!-- /.content -->    
            
            </div>
            <!-- /.content-wrapper -->
    
            <?php echo $__env->make('admin.layout.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- ./wrapper -->

        <?php echo $__env->make('admin.layout.partials.footer_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </body>
</html>