<div class="form-group">
    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="feature-cat-item">
            <?php echo e(Form::checkbox(
                    'features[]',
                    $feature->id,
                    in_array($feature->id, $attachFeatures) ? true : false
                )); ?>

            <?php echo e($feature->title); ?>

        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>