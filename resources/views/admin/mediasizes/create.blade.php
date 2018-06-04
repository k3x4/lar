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
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Media Size</h3>
            </div>
            {!! Form::open(['route' => 'admin.mediasizes.store','method'=>'POST']) !!}
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
                    {!! Form::number('height', null, ['placeholder' => 'Width','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Crop:</strong>
                    {!! Form::hidden('crop', 0); !!}
                    {!! Form::checkbox('crop', 1, true, ['@click' => 'cropCheck = !cropCheck', 'ref' => 'cropField']) !!}
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
                        ], 'center', ['class' => 'form-control'])
                    !!}
                </div>
                <div class="form-group">
                    <strong>Enable:</strong>
                    {!! Form::hidden('enabled', 0); !!}
                    {!! Form::checkbox('enabled', 1, true) !!}
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