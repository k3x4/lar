<li
    @if (isset($active))
        {!! HT::activeClassMenu(json_encode($active), 'm-menu__item  m-menu__item--submenu') !!} 
    @endif
    aria-haspopup="true" 
    m-menu-link-redirect="1">
    <a href="{{ $link }}" class="m-menu__link ">
        <span class="m-menu__link-text">
            {{ $slot }}
        </span>
    </a>
</li>