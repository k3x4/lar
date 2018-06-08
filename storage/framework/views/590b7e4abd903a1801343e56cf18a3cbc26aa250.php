<?php $__env->startSection('page_title', 'Dashboard11'); ?>
<?php $__env->startSection('page_description', 'Main'); ?>

<?php $__env->startSection('content'); ?>

Inner page content goes here

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>