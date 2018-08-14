<div class="dtable-td-wrapper">
    <span class="dtable-helper"></span>
    <?php if($thumb): ?>
        <?php if(file_exists(public_path('/uploads/' . $thumb))): ?>
            <img src="/uploads/<?php echo e($thumb); ?>" />
        <?php else: ?>
            <img src="/img/img-deleted.jpg" />
        <?php endif; ?>
    <?php else: ?>
        <img src="/img/no-img.jpg" />
    <?php endif; ?>
</div>