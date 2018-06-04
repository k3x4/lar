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

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Category <strong>{{ $category->display_title }}</strong></h3>
            </div>
            {!! Form::model($category, ['method' => 'PATCH','route' => ['admin.categories.update', $category->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('display_name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                <div class="form-group">
                    <strong>Parent:</strong>
                    <br/>
                    {{ Form::select('parent_id', $categories, null, ['placeholder' => 'Select...']) }}
                    <br/>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection