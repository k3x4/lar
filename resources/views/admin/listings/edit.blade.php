@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
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
                <h3 class="box-title">Edit Product <strong>{{ $product->title }}</strong></h3>
            </div>
            {!! Form::model($product, ['method' => 'PATCH','route' => ['admin.products.update', $product->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <elfinder-controls
                        name="feature_image"
                        exists="{{ $productImageRelative }}"
                        base="{{ url('images') }}"
                        ></elfinder-controls>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                <div class="form-group">
                    <strong>Categories:</strong>
                    <br/>
                    @foreach($categories as $category)
                    <label>{{ Form::checkbox('category[]', $category->id, in_array($category->id, $productCategories) ? true : false) }}
                        {{ $category->display_name }}</label>
                    <br/>
                    @endforeach
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
<script src="{{ asset('js/elfinder.js') }}"></script>
<script src="{{ asset('js/standalonepopup.k3x4.js') }}"></script>
@endsection