<!DOCTYPE html>
<html>
	<head>

		<?php echo $__env->make('layouts.partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</head>
	<body>

		<div class="body">

            <?php echo $__env->make('layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div role="main" class="main">

				<?php echo $__env->make('layouts.partials.page_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<?php echo $__env->yieldContent('content'); ?>

            </div>
            
            <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		</div>

        <?php echo $__env->make('layouts.partials.footer_scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</body>
</html>
