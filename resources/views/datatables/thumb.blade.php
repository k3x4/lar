<div class="dtable-td-wrapper">
    <span class="dtable-helper"></span>
    @if($thumb)
        @if (file_exists(public_path('/uploads/' . $thumb)))
            <img src="/uploads/{{ $thumb }}" />
        @else
            <img src="/img/img-deleted.jpg" />
        @endif
    @else
        <img src="/img/no-img.jpg" />
    @endif
</div>