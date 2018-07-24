@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.listings.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{!! Form::model($listing, ['method' => 'PATCH','route' => ['admin.listings.update', $listing->id]]) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Listing <strong>{{ $listing->title }}</strong></h3>
            </div>
            
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Slug:</strong>
                    {!! Form::text('slug', null, ['placeholder' => 'Slug','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('content', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                
                {!! Form::hidden('gallery', '', ['id' => 'gallery']) !!}
                @if ($gallery)
                    <ul class="sortable-gallery">
                        @foreach ($gallery as $image)
                            <li class="ui-state-default" data-id="{{ $image->id }}">
                                <img src="/uploads/{{ $image->get('mini') }}" />
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>
            
        </div>
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status',
            'draft' => true
        ])

        @widget('Category', [
            'title' => 'Category',
            'categories' => $categories
        ])

        @widget('FeaturedImage', [
            'title' => 'Featured image',
            'featuredImage' => $featuredImage
        ])
               
    </div>

</div>
{!! Form::close() !!}

@endsection

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
});

</script>
@endsection