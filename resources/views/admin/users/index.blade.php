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
            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> New User</a>
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
                <h3 class="box-title">Users list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table dtable table-bordered table-striped">
                    <tr>
                        <thead>
                            <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                            <th style="width: 1%;">ID</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 20%;">Listings</th>
                            <th style="width: 40%;">Roles</th>
                            <th style="width: 10%;">Created</th>
                        </thead>    
                    </tr>
                </table>
                @permission('user-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy'], 'class' => 'deleteForm']) !!}
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
        'url' => route('admin.users.data'),
        'columns' => json_encode([
            ['data' => 'action', 'name' => 'action'],
            ['data' => 'id', 'name' => 'id'],
            ['data' => 'email', 'name' => 'email'],
            ['data' => 'listings', 'name' => 'listings'],
            ['data' => 'roles', 'name' => 'roles'],
            ['data' => 'created_at', 'name' => 'created_at'],
        ])
    ])
@endsection