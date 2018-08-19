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
            @permission('field-create')
            <a class="btn btn-success" href="{{ route('admin.fields.create') }}"> New Field</a>
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
                <h3 class="box-title">Fields list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group filter-options">
                    <b>Field group:</b>
                    {!! Form::select('field_group', [NULL => ''] + $fieldGroups, null, [
                        'class' => 'form-control select2 dt-filter',
                        'style' => 'width: 200px;',
                        'data-key' => 'field_group'
                    ]) !!}
                </div>
                <table class="table dtable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 45%;">Title</th>
                            <th style="width: 45%;">Group</th>
                            <th style="width: 10%;">Created</th>
                        </tr>
                    </thead>
                </table>
                @permission('field-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.fields.destroy'], 'class' => 'deleteForm']) !!}
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
        'url' => route('admin.fields.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'title', 'name' => 'title'],
            ['data' => 'field_group', 'name' => 'field_group'],
            ['data' => 'created_at', 'name' => 'created_at']
        ])
    ])
@endsection