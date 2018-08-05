<?php if($category): ?>
    <?php echo e($category->title); ?>

<?php else: ?>    
    <span style="color:red;">Without category</span>
<?php endif; ?>