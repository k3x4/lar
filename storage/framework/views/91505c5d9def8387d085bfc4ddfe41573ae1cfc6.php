<?php $action_exclude = isset($action_exclude) ? $action_exclude : [] ?>
<div class="dtable-td-wrapper">
    <?php if(!in_array($id, $action_exclude)): ?>
        <input type="checkbox" name="action" class="select" value="<?php echo e($id); ?>" />
    <?php endif; ?>
</div>