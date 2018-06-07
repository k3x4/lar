@extends('admin.layout.master')

@section('head')
@parent
    @if ($category->level > 0)
        <script src="{{ asset('js/lib/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('js/lib/bootstrap-select/css/bootstrap-select.min.css') }}">
    @endif
@endsection

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
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Slug:</strong>
                    {!! Form::text('slug', null, ['placeholder' => 'Slug','class' => 'form-control']) !!}
                </div>
                @if ($category->level > 0)
                <div class="form-group">
                    <strong>Parent category:</strong>
                    {!! Form::select('category_id', $categories, null, ['class' => 'selectpicker']) !!}
                </div>
                @endif
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

@section('footer_scripts')
@parent
    @if ($category->level > 0)
    <script>
        $(function () {
            $('.selectpicker').selectpicker('toggle');
        });
    </script>
    @endif
@endsection