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

        @if(count($fieldGroups))
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Ειδικά πεδία') }}</h3>
            </div>
            
            <div class="box-body">
                @foreach($fieldGroups as $fieldGroup)
                    @foreach($fieldGroup->fields as $field)
                        <span class="feature-cat-item">
                        {{ Form::checkbox(
                                'fields[]',
                                $field->id,
                                in_array($field->id, $fields) ? true : false
                            )
                        }}
                        {{ $field->title }}
                        </span>
                    @endforeach
                    <hr>
                @endforeach
            </div>
        </div>
        @endif

        @if(count($featureGroups))
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Χαρακτηριστικά') }}</h3>
            </div>
            
            <div class="box-body">
                @foreach($featureGroups as $featureGroup)
                    @foreach($featureGroup->features as $feature)
                        <span class="feature-cat-item">
                        {{ Form::checkbox(
                                'features[]',
                                $feature->id,
                                in_array($feature->id, $features) ? true : false
                            )
                        }}
                        {{ $feature->title }}
                        </span>
                    @endforeach
                    <hr>
                @endforeach
            </div>
        </div>
        @endif

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