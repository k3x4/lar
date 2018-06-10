<li
    <?php if(isset($active)): ?>
        <?php echo HT::activeClassMenu(json_encode($active), 'm-menu__item  m-menu__item--submenu'); ?> 
    <?php endif; ?>
    aria-haspopup="true" 
    m-menu-link-redirect="1">
    <a href="<?php echo e($link); ?>" class="m-menu__link ">
        <span class="m-menu__link-text">
            <?php echo e($slot); ?>

        </span>
    </a>
</li>