@extends('admin.layout.master')

@section('head')
@parent
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <script src="{{ asset('js/lib/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/dropzone-config.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/dropzone/min/dropzone.min.css') }}">

    <script src="{{ asset('js/lib/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/js/dataTables.bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/datatables/css/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box-group" id="accordion">
          <div class="panel box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  Upload file
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="box-body">
                {!! Form::open([
                    'route' => 'admin.media.store',
                    'enctype' => 'multipart/form-data',
                    'id' => 'my-dropzone',
                    'class' => 'dropzone'
                ]) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
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
                <table class="table dtable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 1%;">Image</th>
                            <th style="width: 30%;">Filename</th>
                            <th style="width: 58%;">Original filename</th>
                            <th style="width: 10%;">Uploaded</th>
                        </tr>
                    </thead>
                </table>
                @permission('media-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.media.destroy'], 'class' => 'deleteForm']) !!}
                    {!! Form::hidden('ids') !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger disabled', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                    {!! Form::close() !!}
                @endpermission
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('footer_scripts')
@parent
    @include('admin.datatables_script', [
        'url' => route('admin.media.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'thumb', 'name' => 'thumb'],
            ['data' => 'filename', 'name' => 'filename'],
            ['data' => 'original_name', 'name' => 'original_name'],
            ['data' => 'created_at', 'name' => 'created_at']
        ])
    ])
@endsection