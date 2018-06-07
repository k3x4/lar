@extends('admin.layout.master')

@section('head')
@parent
    <script src="{{ asset('js/lib/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/bootstrap-select/css/bootstrap-select.min.css') }}">
@endsection

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

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Listing</h3>
            </div>
            {!! Form::open(['route' => 'admin.listings.store','method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Category:</strong>
                    {!! Form::select('category_id', $categories, null, ['class' => 'selectpicker']) !!}
                    <br/>
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('content', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
@parent
    <script>
        $(function () {
            $('.selectpicker').selectpicker('toggle');
        });
    </script>
@endsection