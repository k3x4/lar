<!DOCTYPE html>

<html lang="en" >

    <!-- begin::Head -->
	<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<title>Admin panel</title>
        
        <?php $__env->startSection('head'); ?>

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->

		<script src="<?php echo e(asset('assets/js/lib/jquery/jquery.min.js')); ?>"></script>

        <!--begin::Base Styles -->
		<link href="<?php echo e(asset('assets/admin/theme/vendors/base/vendors.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('assets/admin/theme/demo/demo7/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
        <!--<link rel="shortcut icon" href="assets/demo/demo7/media/img/logo/favicon.ico" />-->
        
        <?php echo $__env->yieldSection(); ?>

	</head>
	<!-- end::Head -->

    <!-- begin::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- BEGIN: Header -->
            <?php echo $__env->make('admin.layout.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- END: Header -->
            
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                
                <!-- BEGIN: Left Aside -->
				<?php echo $__env->make('admin.layout.partials.left_aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<!-- END: Left Aside -->
                
                <div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<?php echo $__env->make('admin.layout.partials.subheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- END: Subheader -->
                    
					<div class="m-content">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                    
                </div>
                
			</div>
            <!-- end:: Body -->
            
			<!-- begin::Footer -->
			<?php echo $__env->make('admin.layout.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- end::Footer -->
            
		</div>
        <!-- end:: Page -->
        
    	<!-- begin::Quick Sidebar -->
		<!---->
        <!-- end::Quick Sidebar -->
        
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
        <!-- end::Scroll Top -->
        
        <!-- begin::Quick Nav -->
		<!---->
		<!-- end::Quick Nav -->	
        
        <?php echo $__env->make('admin.layout.partials.footer_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</body>
	<!-- end::Body -->







</html>