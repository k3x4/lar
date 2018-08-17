<?php if($feature_group): ?>
    <?php echo e($feature_group['title']); ?>

<?php else: ?>    
    <span style="color:red;">Without group</span>
<?php endif; ?>