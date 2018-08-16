<?php extract($config) ?>

<?php if($listing): ?>
    <?php echo e(BS::setListing($listing)); ?>

<?php endif; ?>

<div class="widget">

    <h4 class="heading-primary">Κατηγορίες</h4>
    <?php if( isset($categories) ): ?>
        <ul class="nav nav-list flex-column mb-5">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory => $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php list($pCategoryTitle, $pCategorySlug) = explode('|', $parentCategory) ?>
            <li class="nav-item">
                <a <?php echo BS::activeClass(['category/' . $pCategorySlug], 'nav-link'); ?> href="<?php echo e(route('category.showParent', [$pCategorySlug])); ?>">
                    <?php echo $pCategoryTitle; ?>

                </a>
                <ul <?php echo BS::showBlock(['category/' . $pCategorySlug]); ?>>
                    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug => $categoryTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a <?php echo BS::activeClass(['category/' . $slug], 'nav-link'); ?> href="<?php echo e(url('/category/' . $slug)); ?>"><?php echo e($categoryTitle); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

</div>