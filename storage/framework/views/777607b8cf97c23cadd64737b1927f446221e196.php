<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Brand -->
    <div class="m-brand  m-brand--skin-light ">
        <a href="index.html" class="m-brand__logo">
            <img alt="" src="<?php echo e(asset('assets/admin/img/logo.png')); ?>"/>
        </a>
    </div>
    <!-- END: Brand -->
    <!-- BEGIN: Aside Menu -->
    <div 
    id="m_ver_menu" 
    class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " 
    data-menu-vertical="true"
    m-menu-scrollable="true" m-menu-dropdown-timeout="500"  
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--submenu-fullheight" aria-haspopup="true"  m-menu-submenu-toggle="click" m-menu-dropdown-toggle-class="m-aside-menu-overlay--on">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-menu"></i>
                    <span class="m-menu__link-text">
                        Applications
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <div class="m-menu__wrapper">
                        <ul class="m-menu__subnav">

                            <li class="m-menu__item  m-menu__item--parent m-menu__item--submenu-fullheight" aria-haspopup="true" >
                                <span class="m-menu__link">
                                    <span class="m-menu__link-text">
                                        Main menu
                                    </span>
                                </span>
                            </li>



                            <!-- BEGIN: Media -->
                            <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                            <?php $__env->slot('active', ['admin.media.index', 'admin.mediasizes.index']); ?>
                            <?php $__env->slot('title', 'Media'); ?>

                                <!-- BEGIN: All media -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                <?php $__env->slot('active', ['admin.media.index']); ?>
                                <?php $__env->slot('link', route('admin.media.index')); ?>
                                    All media
                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: All media -->

                                <!-- BEGIN: Media sizes -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                                <?php $__env->slot('active', ['admin.mediasizes.index']); ?>
                                <?php $__env->slot('title', 'Media sizes'); ?>

                                    <!-- BEGIN: All media sizes -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.mediasizes.index']); ?>
                                    <?php $__env->slot('link', route('admin.mediasizes.index')); ?>
                                        All media sizes
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: All media sizes -->

                                    <!-- BEGIN: Create media size -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.mediasizes.create']); ?>
                                    <?php $__env->slot('link', route('admin.mediasizes.create')); ?>
                                        Create media size
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: Create media size -->

                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: Media sizes -->

                            <?php echo $__env->renderComponent(); ?>
                            <!-- END: Media -->




                            <!-- BEGIN: Listings -->
                            <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                            <?php $__env->slot('active', ['admin.listings.index', 'admin.categories.index']); ?>
                            <?php $__env->slot('title', 'Listings'); ?>

                                <!-- BEGIN: All listings -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                <?php $__env->slot('active', ['admin.listings.index']); ?>
                                <?php $__env->slot('link', route('admin.listings.index')); ?>
                                    All listings
                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: All listings -->

                                <!-- BEGIN: Listing categories -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                                <?php $__env->slot('active', ['admin.categories.index']); ?>
                                <?php $__env->slot('title', 'Listing categories'); ?>

                                    <!-- BEGIN: All listing categories -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.categories.index']); ?>
                                    <?php $__env->slot('link', route('admin.categories.index')); ?>
                                        All listing categories
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: All listing categories -->

                                    <!-- BEGIN: Create listing category -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.categories.create']); ?>
                                    <?php $__env->slot('link', route('admin.categories.create')); ?>
                                        Create listing category
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: Create listing category -->

                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: Listing categories -->

                            <?php echo $__env->renderComponent(); ?>
                            <!-- END: Listings -->




                            <!-- BEGIN: Users -->
                            <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                            <?php $__env->slot('active', ['admin.users.index', 'admin.roles.index']); ?>
                            <?php $__env->slot('title', 'Media'); ?>

                                <!-- BEGIN: All users -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                <?php $__env->slot('active', ['admin.users.index']); ?>
                                <?php $__env->slot('link', route('admin.users.index')); ?>
                                    All users
                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: All users -->

                                <!-- BEGIN: Roles -->
                                <?php $__env->startComponent('admin.layout.partials.menu.menu_item_submenu'); ?>
                                <?php $__env->slot('active', ['admin.roles.index']); ?>
                                <?php $__env->slot('title', 'Roles'); ?>

                                    <!-- BEGIN: All roles -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.roles.index']); ?>
                                    <?php $__env->slot('link', route('admin.roles.index')); ?>
                                        All roles
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: All roles -->

                                    <!-- BEGIN: Create role -->
                                    <?php $__env->startComponent('admin.layout.partials.menu.menu_item'); ?>
                                    <?php $__env->slot('active', ['admin.roles.create']); ?>
                                    <?php $__env->slot('link', route('admin.roles.create')); ?>
                                        Create role
                                    <?php echo $__env->renderComponent(); ?>
                                    <!-- END: Create role -->

                                <?php echo $__env->renderComponent(); ?>
                                <!-- END: Roles -->

                            <?php echo $__env->renderComponent(); ?>
                            <!-- END: Users -->




                        </ul>
                    </div>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="click" m-menu-link-redirect="1">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-add"></i>
                    <span class="m-menu__link-text">
                        Add
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Add
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-commenting"></i>
                                <span class="m-menu__link-text">
                                    Post
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-user"></i>
                                <span class="m-menu__link-text">
                                    Member
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-cart-arrow-down"></i>
                                <span class="m-menu__link-text">
                                    Order
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-icon la la-coffee"></i>
                                <span class="m-menu__link-text">
                                    Entry
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom" aria-haspopup="true"  m-menu-submenu-toggle="click" m-menu-link-redirect="1">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-stopwatch"></i>
                    <span class="m-menu__link-text">
                        Customers
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom" aria-haspopup="true"  m-menu-link-redirect="1">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Customers
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Reports
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Cases
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-computer"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Pending
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--warning">
                                                            10
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-signs-2"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Urgent
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--danger">
                                                            6
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Done
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            2
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-multimedia-2"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Archive
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--info m-badge--wide">
                                                            245
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Clients
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Audit
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-2" aria-haspopup="true"  m-menu-submenu-toggle="click">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-settings"></i>
                    <span class="m-menu__link-text">
                        Settings
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu m-menu__submenu--up">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-2" aria-haspopup="true" >
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Settings
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Profile
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-computer"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Pending
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--warning">
                                                            10
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-signs-2"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Urgent
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--danger">
                                                            6
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Done
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            2
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-multimedia-2"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Archive
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--info m-badge--wide">
                                                            245
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Accounts
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Help
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--line">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Notifications
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-1" aria-haspopup="true"  m-menu-submenu-toggle="click">
                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-info"></i>
                    <span class="m-menu__link-text">
                        Help
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu m-menu__submenu--up">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-1" aria-haspopup="true" >
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Help
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Support
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Blog
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Documentation
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Pricing
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Terms
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<div class="m-aside-menu-overlay"></div>