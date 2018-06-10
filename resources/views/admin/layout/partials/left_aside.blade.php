<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Brand -->
    <div class="m-brand  m-brand--skin-light ">
        <a href="index.html" class="m-brand__logo">
            <img alt="" src="{{ asset('assets/admin/img/logo.png') }}"/>
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
                            @component('admin.layout.partials.menu.menu_item_submenu')
                            @slot('title', 'Media')

                                <!-- BEGIN: All media -->
                                @component('admin.layout.partials.menu.menu_item')
                                @slot('link', route('admin.media.index'))
                                    All media
                                @endcomponent
                                <!-- END: All media -->

                                <!-- BEGIN: Media sizes -->
                                @component('admin.layout.partials.menu.menu_item_submenu')
                                @slot('title', 'Media sizes')

                                    <!-- BEGIN: All media sizes -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.mediasizes.index'))
                                        All media sizes
                                    @endcomponent
                                    <!-- END: All media sizes -->

                                    <!-- BEGIN: Create media size -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.mediasizes.create'))
                                        Create media size
                                    @endcomponent
                                    <!-- END: Create media size -->

                                @endcomponent
                                <!-- END: Media sizes -->

                            @endcomponent
                            <!-- END: Media -->




                            <!-- BEGIN: Listings -->
                            @component('admin.layout.partials.menu.menu_item_submenu')
                            @slot('title', 'Listings')

                                <!-- BEGIN: All listings -->
                                @component('admin.layout.partials.menu.menu_item')
                                @slot('link', route('admin.listings.index'))
                                    All listings
                                @endcomponent
                                <!-- END: All listings -->

                                <!-- BEGIN: Listing categories -->
                                @component('admin.layout.partials.menu.menu_item_submenu')
                                @slot('title', 'Listing categories')

                                    <!-- BEGIN: All listing categories -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.categories.index'))
                                        All listing categories
                                    @endcomponent
                                    <!-- END: All listing categories -->

                                    <!-- BEGIN: Create listing category -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.categories.create'))
                                        Create listing category
                                    @endcomponent
                                    <!-- END: Create listing category -->

                                @endcomponent
                                <!-- END: Listing categories -->

                            @endcomponent
                            <!-- END: Listings -->




                            <!-- BEGIN: Users -->
                            @component('admin.layout.partials.menu.menu_item_submenu')
                            @slot('title', 'Media')

                                <!-- BEGIN: All users -->
                                @component('admin.layout.partials.menu.menu_item')
                                @slot('link', route('admin.users.index'))
                                    All users
                                @endcomponent
                                <!-- END: All users -->

                                <!-- BEGIN: Roles -->
                                @component('admin.layout.partials.menu.menu_item_submenu')
                                @slot('title', 'Roles')

                                    <!-- BEGIN: All roles -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.roles.index'))
                                        All roles
                                    @endcomponent
                                    <!-- END: All roles -->

                                    <!-- BEGIN: Create role -->
                                    @component('admin.layout.partials.menu.menu_item')
                                    @slot('link', route('admin.roles.create'))
                                        Create role
                                    @endcomponent
                                    <!-- END: Create role -->

                                @endcomponent
                                <!-- END: Roles -->

                            @endcomponent
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