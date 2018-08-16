@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
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

{!! Form::model($category, ['method' => 'PATCH','route' => ['admin.categories.update', $category->id]]) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Category <strong>{{ $category->display_title }}</strong></h3>
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
                    <strong>Icon: (fa-*)</strong>
                    {!! Form::text('icon', null, ['placeholder' => 'Icon (only fa-*)','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status'
        ])

        @widget('Category', [
            'title' => 'Parent category',
            'categories' => [NULL => 'Without parent'] + $categories
        ])

    </div>

</div>
{!! Form::close() !!}

@endsection