<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="click" m-menu-submenu-mode="accordion">
    <a  href="javascript:;" class="m-menu__link m-menu__toggle">
        <span class="m-menu__link-text">
            {{ $title }}
        </span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            {{ $slot }}
        </ul>
    </div>
</li>