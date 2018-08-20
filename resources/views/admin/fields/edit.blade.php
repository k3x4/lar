@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.fields.index') }}"> Back</a>
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

{!! Form::model($field, ['method' => 'PATCH','route' => ['admin.fields.update', $field->id]]) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Field <strong>{{ $field->title }}</strong></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Type:</strong>
                    {!! Form::select('type', $types, 'textbox', ['id' => 'type-select', 'class' => 'form-control select2']) !!}
                </div>
                <span id="loading" style="text-align:center;display:block;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></span>
                <div id="type-options">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status',
        ])

        @widget('FieldGroup', [
            'title' => 'Field group',
            'fieldGroups' => $fieldGroups
        ])
               
    </div>

</div>
{!! Form::close() !!}
@endsection

@section('footer_scripts')
@parent
    <script>
        $(document).ready(function() {
            $('#type-select').change(function() {
                $.ajax({
                    url: '{!! route("admin.fields.options") !!}',
                    type: 'GET',
                    data: {
                        type : $('#type-select').val()
                    },
                    success: function(data) {
                        $('#type-options').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
            $("#type-select").change();

            $(document).ajaxStart(function() {
                $("#loading").show();
            });

            $(document).ajaxStop(function() {
                $("#loading").hide();
            });
        });
    </script>
@endsection