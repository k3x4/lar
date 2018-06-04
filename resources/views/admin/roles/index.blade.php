@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> New Role</a>
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
                <h3 class="box-title">Role Management</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @permission('role-edit')
                            <a class="btn btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                            @endpermission
                            @permission('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                            {!! Form::close() !!}
                            @endpermission
                        </td>
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
{!! $roles->render() !!}
@endsection