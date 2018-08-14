<?php extract($config) ?>

<div class="widget clearfix">

    <h4><?php echo e($title); ?></h4>
    <?php if( isset($categories) ): ?>
    <nav class="nav-tree nobottommargin">
        <ul>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory => $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php list($pCategoryTitle, $pCategorySlug) = explode('|', $parentCategory) ?>
            <li>
                <a href="<?php echo e(route('category.show', [$pCategorySlug])); ?>">
                    <i class="icon-bolt2"></i><?php echo e($pCategoryTitle); ?>

                </a>
                <ul>
                    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $categoryTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('/category/') . $slug); ?>"><?php echo e($categoryTitle); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>
    <?php endif; ?>

</div>