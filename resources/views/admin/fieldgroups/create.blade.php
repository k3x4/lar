@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.fieldgroups.index') }}"> Back</a>
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

{!! Form::open(['route' => 'admin.fieldgroups.store', 'method'=>'POST']) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Field Group</h3>
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
                                false
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