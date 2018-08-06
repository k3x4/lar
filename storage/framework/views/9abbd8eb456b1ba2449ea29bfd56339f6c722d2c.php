<div class="dtable-td-wrapper">
    <?php if(!in_array($id, [1])): ?>
        <input type="checkbox" name="action" class="select" value="<?php echo e($id); ?>" />
    <?php endif; ?>
</div>