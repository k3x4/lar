@extends('admin.layout.master')

@section('head')
@parent
    <script src="{{ asset('js/lib/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/js/dataTables.bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/lib/datatables/css/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            @permission('mediasize-create')
            <a class="btn btn-success" href="{{ route('admin.mediasizes.create') }}"> New Media Size</a>
            @endpermission
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Media sizes list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table dtable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th>ID</th>
                            <th>Tag</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Crop</th>
                            <th>Crop position</th>
                            <th>Enabled</th>
                        </tr>
                    </thead>
                </table>
                @permission('mediasize-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.mediasizes.destroy'], 'class' => 'deleteForm']) !!}
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
        'url' => route('admin.mediasizes.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'tag', 'name' => 'tag'],
            ['data' => 'width', 'name' => 'width'],
            ['data' => 'height', 'name' => 'height'],
            ['data' => 'crop', 'name' => 'crop'],
            ['data' => 'crop_position', 'name' => 'crop_position'],
            ['data' => 'enabled', 'name' => 'enabled']
        ])
    ])
@endsection