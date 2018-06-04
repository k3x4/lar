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
                <h3 class="box-title">Create New Category</h3>
            </div>
            {!! Form::open(['route' => 'admin.categories.store','method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('display_name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection