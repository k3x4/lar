@extends('admin.layout.master')

@section('head')
@parent
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

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

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Listing</h3>
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
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Status</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {!! Form::open(['route' => 'admin.listings.store','method'=>'POST']) !!}
                        <button type="submit" class="btn btn-success" name="status" value="publish">Submit</button>
                        <button type="submit" class="btn btn-default" name="status" value="draft">Save draft</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Category</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {!! Form::select('category_id', $categories, null, [
                        'class' => 'selectpicker',
                        'data-width' => 'fit'
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Image</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        @widget('FeaturedImage')
                    </div>
                </div>
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