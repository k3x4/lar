@extends('admin.layout.master')

@section('head')
@parent
    <script src="{{ asset('js/lib/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/lib/clipboard/clipboard.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/dropzone/min/dropzone.min.css') }}">
    
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Media files</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(array('route' => 'admin.media.upload', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone', 'class' => 'dropzone')) !!}
                    {{ csrf_field() }}
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('footer_scripts')
@parent
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
