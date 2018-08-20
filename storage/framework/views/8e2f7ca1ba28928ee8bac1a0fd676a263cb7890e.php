<?php if($field_group): ?>
    <?php echo e($field_group['title']); ?>

<?php else: ?>    
    <span style="color:red;">Without group</span>
<?php endif; ?>