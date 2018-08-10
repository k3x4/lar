<?php extract($config) ?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <?php if($author): ?>
                <p>Author: <?php echo e($author); ?></p>
            <?php endif; ?>
            <button type="submit" class="btn btn-success" name="status" value="publish">Submit</button>
            <?php if($draft): ?>
                <button type="submit" class="btn btn-default" name="status" value="draft">Save draft</button>
            <?php endif; ?>
        </div>
    </div>
</div>