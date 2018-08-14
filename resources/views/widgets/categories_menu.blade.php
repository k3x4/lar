@php extract($config) @endphp

<div class="widget clearfix">

    <h4>{{ $title }}</h4>
    @if( isset($categories) )
    <nav class="nav-tree nobottommargin">
        <ul>
            @foreach ($categories as $parentCategory => $children)
            @php list($pCategoryTitle, $pCategorySlug) = explode('|', $parentCategory) @endphp
            <li>
                <a href="{{ route('category.show', [$pCategorySlug]) }}">
                    <i class="icon-bolt2"></i>{{ $pCategoryTitle }}
                </a>
                <ul>
                    @foreach ($children as $slug => $categoryTitle)
                        <li><a href="{{ url('/category/') . $slug }}">{{ $categoryTitle }}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
    @endif

</div>