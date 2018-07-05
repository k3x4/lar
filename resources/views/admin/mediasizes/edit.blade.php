@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.mediasizes.index') }}"> Back</a>
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

{!! Form::model($mediaSize, ['method' => 'PATCH','route' => ['admin.mediasizes.update', $mediaSize->id]]) !!}
<div class="row">

    <div class="col-lg-8 margin-tb">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Media Size <strong>{{ $mediaSize->tag }}</strong></h3>
            </div>
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
                    {!! Form::checkbox('crop', 1, null, ['id' => 'crop']) !!}
                </div>
                <div class="form-group" id="cropPos" style="display:none;">
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
                        ], null, ['class' => 'form-control select2'])
                    !!}
                </div>
                <div class="form-group">
                    <strong>Enable:</strong>
                    {!! Form::hidden('enabled', 0); !!}
                    {!! Form::checkbox('enabled', 1) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status'
        ])
                
    </div>

</div>
{!! Form::close() !!}

@endsection

@section('footer_scripts')
@parent
<script>
    $(document).ready(function () {

        if ($("#crop").is(":checked")) {
            $("#cropPos").show();
        }

        $("#crop").click(function () {
            if ($(this).is(":checked")) {
                $("#cropPos")
                    .css('opacity', 0)
                    .slideDown()
                    .animate(
                        { opacity: 1 },
                        { queue: false }
                    );
            } else {
                $("#cropPos")
                    .css('opacity', 1)
                    .slideUp()
                    .animate(
                        { opacity: 0 },
                        { queue: false }
                    );
            }
        });

    });
    </script>
@endsection