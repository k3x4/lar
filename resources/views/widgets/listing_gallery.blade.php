@php extract($config) @endphp

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            {!! Form::hidden('gallery', '', ['id' => 'gallery']) !!}
            <ul class="sortable-gallery">
            @if (isset($gallery))
                @foreach ($gallery as $image)
                    <li class="ui-state-default" data-id="{{ $image->id }}">
                        <a href="#" class="close-x"></a>
                        <img src="/uploads/{{ $image->get('mini') }}" />
                    </li>
                @endforeach
            @endif
            </ul>
            <a href="#" id="gallery-select" data-toggle="modal" data-target="#mediamanager">
                Add images
            </a>
        </div>
    </div>
</div>

@section('footer_scripts')
@parent

<script>
$( document ).ready(function() {
    var i = 0;
    var ids = [];
    $('.sortable-gallery li').each(function(){
        ids[i++] = $(this).data('id');
    });
    $('#gallery').val(ids);

    $(document).on('click','.dtable a', {} ,function (e) {
        e.preventDefault();

        if($('#mediamanager').data('related') != 'gallery-select'){
            return;
        }

        $('#mediamanager').trigger('click');

        var imgUrl = '/uploads/' + $(this).data('thumb');
        var imgId = $(this).data('id');

        var ids = $('#gallery').val().split(',');
        if(ids.indexOf(imgId.toString()) != -1){
            return;
        }

        var aElem = $('<a></a>').attr('href', '#').addClass('close-x');
        var imgElem = $('<img />').attr('src', imgUrl);
        var liElem = $('<li></li>')
                     .addClass('ui-state-default')
                     .attr('data-id', imgId)
                     .append(aElem)
                     .append(imgElem);

        $('.sortable-gallery').append(liElem);
        $('.sortable-gallery').trigger('sortupdate');
    });

    $(document).on('click','.close-x', {} ,function (e) {
        e.preventDefault();
        if (confirm('Are you sure?')) {
            var $parent = $(this).parent().remove();
            $('.sortable-gallery').trigger('sortupdate');
        }
    });

});

</script>
@endsection