@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.features.index') }}"> Back</a>
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

{!! Form::model($feature, ['method' => 'PATCH','route' => ['admin.features.update', $feature->id]]) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Feature <strong>{{ $feature->title }}</strong></h3>
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

        @widget('FeatureGroup', [
            'title' => 'Feature group',
            'featureGroups' => $featureGroups
        ])
               
    </div>

</div>
{!! Form::close() !!}

@endsection