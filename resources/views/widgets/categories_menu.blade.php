@php extract($config) @endphp

<div class="widget clearfix">

    <h4>Κατηγορίες</h4>
    @if( isset($categories) )
    <nav class="nav-tree nobottommargin">
        <ul>
            @foreach ($categories as $parentCategory => $children)
            @php list($pCategoryTitle, $pCategorySlug) = explode('|', $parentCategory) @endphp
            <li {!! BS::activeClass(['category/' . $pCategorySlug], true, 'sub-menu') !!}>
                <a href="{{ route('category.showParent', [$pCategorySlug]) }}">
                    {!! $pCategoryTitle !!}
                </a>
                <ul {!! BS::showBlock(['category/' . $pCategorySlug], true) !!}>
                    @foreach ($children as $slug => $categoryTitle)
                        <li {!! BS::activeClass(['category/' . $slug]) !!}>
                            <a href="{{ url('/category/' . $slug) }}">{{ $categoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
    @endif

</div>