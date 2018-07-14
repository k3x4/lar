<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <?php $__env->startSection('head'); ?>

	<title><?php echo $__env->yieldContent('page_title'); ?> | <?php echo e(config('app.name')); ?></title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/css/bootstrap.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/style.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/css/dark.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/css/font-icons.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/css/animate.css')); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo e(asset('theme/css/magnific-popup.css')); ?>" type="text/css" />

	<link rel="stylesheet" href="<?php echo e(asset('theme/css/responsive.css')); ?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php echo $__env->yieldSection(); ?>

</head>

<body class="stretched no-transition">

	<div id="wrapper" class="clearfix">

        <?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<section id="content">

			<div class="content-wrap">

				<?php echo $__env->yieldContent('content'); ?>

			</div>

		</section>

        <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    
    <?php echo $__env->make('layouts.partials.footer_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>