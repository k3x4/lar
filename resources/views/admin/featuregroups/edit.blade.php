@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.featuregroups.index') }}"> Back</a>
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

{!! Form::model($featureGroup, ['method' => 'PATCH', 'route' => ['admin.featuregroups.update', $featureGroup->id]]) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Feature Group <strong>{{ $featureGroup->title }}</strong></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status',
            'draft' => true
        ])

    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Use in categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @foreach($categoriesTable as $parentCategory => $childCategories)
                    <strong class="feature-cat-title">{{ $parentCategory }}:</strong>
                    @foreach($childCategories as $category)
                        <span class="feature-cat-item">
                        {{ Form::checkbox(
                                'categories[]',
                                $category->id,
                                in_array($category->id, $attachCategories) ? true : false
                            )
                        }}
                        {{ $category->title }}
                        </span>
                    @endforeach
                    <hr>
                @endforeach
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection