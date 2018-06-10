<li 
    <?php if(isset($active)): ?>
        <?php echo HT::activeClassSubMenu(json_encode($active), 'm-menu__item  m-menu__item--submenu'); ?> 
    <?php endif; ?>
    aria-haspopup="true" 
    m-menu-submenu-toggle="click" 
    m-menu-submenu-mode="accordion">
    <a  href="javascript:;" class="m-menu__link m-menu__toggle">
        <span class="m-menu__link-text">
            <?php echo e($title); ?>

        </span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <?php echo e($slot); ?>

        </ul>
    </div>
</li>