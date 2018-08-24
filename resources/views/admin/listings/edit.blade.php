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
                    {!! Form::textarea('content', old('content'), ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Ειδικά πεδία') }}</h3>
            </div>
            
            <div class="box-body">
                <span id="fields-loading" style="text-align:center;display:block;">
                    <i class="fa fa-4x fa-cog fa-spin"></i>
                </span>
                <div id="fields-show">
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Χαρακτηριστικά') }}</h3>
            </div>
            
            <div class="box-body">
                <span id="features-loading" style="text-align:center;display:block;">
                    <i class="fa fa-4x fa-cog fa-spin"></i>
                </span>
                <div id="features-show">
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status',
            'author' => $listing->author['email'],
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

        @widget('ListingGallery', [
            'title' => 'Extra images',
            'gallery' => $gallery
        ])
               
    </div>

    @include('admin.media.mediamanager')

</div>
{!! Form::close() !!}
@endsection

@section('footer_scripts')
@parent
    <script>
        $(document).ready(function() {
            
            $('#category-select').change(function() {
                $.ajax({
                    url: '{!! route("admin.listings.fields") !!}',
                    type: 'GET',
                    data: {
                        category: $('#category-select').val(),
                        listing_id: {!! $listing->id !!}
                    },
                    beforeSend: function() {
                        $("#fields-loading").show();
                    },
                    success: function(data) {
                        $("#fields-loading").hide();
                        $('#fields-show').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $('#category-select').change(function() {
                $.ajax({
                    url: '{!! route("admin.listings.features") !!}',
                    type: 'GET',
                    data: {
                        category: $('#category-select').val(),
                        listing_id: {!! $listing->id !!}
                    },
                    beforeSend: function() {
                        $("#features-loading").show();
                    },
                    success: function(data) {
                        $("#features-loading").hide();
                        $('#features-show').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $("#category-select").change();

        });
    </script>
@endsection