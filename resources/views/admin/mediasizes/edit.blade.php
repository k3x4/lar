@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.mediasizes') }}"> Back</a>
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
    <div class="col-lg-12 margin-tb">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Media Size <strong>{{ $mediaSize->tag }}</strong></h3>
            </div>
            {!! Form::model($mediaSize, ['method' => 'PATCH','route' => ['admin.mediasizes.update', $mediaSize->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Tag:</strong>
                    {!! Form::text('tag', null, ['placeholder' => 'Tag','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Width:</strong>
                    {!! Form::number('width', null, ['placeholder' => 'Width','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Height:</strong>
                    {!! Form::number('height', null, ['placeholder' => 'Height','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Crop:</strong>
                    {!! Form::hidden('crop', 0); !!}
                    {!! Form::checkbox('crop', 1, null, ['@click' => 'cropCheck = !cropCheck', 'ref' => 'cropField']) !!}
                </div>
                <div class="form-group" v-show="cropCheck">
                    <strong>Crop Position:</strong>
                    {!! Form::select('crop_position', [
                        'top-left' => 'Top left',
                        'top' => 'Top',
                        'top-right' => 'Top right',
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right',
                        'bottom-left' => 'Bottom left',
                        'bottom' => 'Bottom',
                        'bottom-right' => 'Bottom right'
                        ], null, ['class' => 'form-control'])
                    !!}
                </div>
                <div class="form-group">
                    <strong>Enable:</strong>
                    {!! Form::hidden('enabled', 0); !!}
                    {!! Form::checkbox('enabled', 1) !!}
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
    new Vue({
        el: '.content',
        data: {
            cropCheck: null
        },
        mounted: function () {
            this.cropCheck = this.$refs.cropField.checked
        }
    });
</script>
@endsection