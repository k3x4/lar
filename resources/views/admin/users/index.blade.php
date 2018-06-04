@extends('admin.layout.master')

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
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->roles))
                            @foreach($user->roles as $v)
                            <label class="label label-success">{{ $v->display_name }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                            {!! Form::close() !!}
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
{!! $data->render() !!}
@endsection