@php extract($config) @endphp

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">

            {!! Form::hidden('featuredImage', $featuredImage->id) !!}

            @if( isset($featuredImage) )
                <div id="featured-preview" style="display:block;background-image: url(/uploads/{!! $featuredImage->filename !!});"></div>
                <a href="#" id="featured-select" style="display:none;" data-toggle="modal" data-target="#mediamanager">
                    Select image
                </a>
                <a href="#" id="featured-remove" style="display:block;">
                    Remove image
                </a>
            @else
                <div id="featured-preview"></div>
                <a href="#" id="featured-select" style="display:block;" data-toggle="modal" data-target="#mediamanager">
                    Select image
                </a>
                <a href="#" id="featured-remove" style="display:none;">
                    Remove image
                </a>
            @endif    

            @include('admin.media.mediamanager')

        </div>
    </div>
</div>

@section('footer_scripts')
@parent

<script>
$( document ).ready(function() {

    $(document).on('click','.dtable a', {} ,function (e) {
        e.preventDefault();

        if($('#mediamanager').data('related') != 'featured-select'){
            return;
        }

        $('#mediamanager').trigger('click');

        var imgUrl = $(this).attr('href');
        var imgId = $(this).data('id');
        $('#featured-preview').css('background-image', 'url(' + imgUrl + ')').slideDown();
        $('input[name=featuredImage]').val(imgId);
        $('#featured-select').fadeOut(500);
        $('#featured-remove').fadeIn(1000);
    });

    $(document).on('click','#featured-remove', {} ,function (e) {
        e.preventDefault();
        $('#featured-preview').css('background-image', '').slideUp();
        $('input[name=featuredImage]').val('');
        $('#featured-remove').fadeOut(500);
        $('#featured-select').fadeIn(1000);
    });

});

</script>
@endsection