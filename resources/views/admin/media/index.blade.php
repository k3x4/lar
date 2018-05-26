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
                <h3 class="box-title">Upload files <span id="counter"></span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open(array('route' => 'admin.media.store', 'enctype' => 'multipart/form-data', 'id' => 'my-dropzone', 'class' => 'dropzone')) !!}
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

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Media list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Filename</th>
                        <th>Original Filename</th>
                    </tr>
                    @foreach($photos as $photo)
                    <tr>
                        <td><img src="/uploads/{{ $photo->get('thumb') }}"></td>
                        <td>{{ $photo->filename }}</td>
                        <td>{{ $photo->original_name }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('footer_scripts')
@parent
    <script src="{{ asset('js/dropzone-config.js') }}"></script>
@endsection
