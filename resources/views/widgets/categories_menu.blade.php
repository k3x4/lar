@php extract($config) @endphp

@if($listing)
    {{ BS::setListing($listing) }}
@endif

<div class="widget">

    <h4 class="heading-primary">Κατηγορίες</h4>
    @if( isset($categories) )
        <ul class="nav nav-list flex-column mb-5">
            @foreach ($categories as $parentCategory => $children)
            @php list($pCategoryTitle, $pCategorySlug) = explode('|', $parentCategory) @endphp
            <li class="nav-item">
                <a {!! BS::activeClass(['category/' . $pCategorySlug], true, 'nav-link') !!} href="{{ route('category.showParent', [$pCategorySlug]) }}">
                    {!! $pCategoryTitle !!}
                </a>
                <ul {!! BS::showBlock(['category/' . $pCategorySlug]) !!}>
                    @foreach ($children as $slug => $categoryTitle)
                        <li class="nav-item">
                            <a {!! BS::activeClass(['category/' . $slug], false, 'nav-link') !!} href="{{ url('/category/' . $slug) }}">{{ $categoryTitle }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    @endif

</div>