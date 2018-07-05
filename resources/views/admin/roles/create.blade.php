@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
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

{!! Form::open(['route' => 'admin.roles.store','method'=>'POST']) !!}
<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New Role</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Display Name:</strong>
                    {!! Form::text('display_name', null, ['placeholder' => 'Display Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control','style'=>'height:100px']) !!}
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permissions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                @php $perms = PERM::getPerms() @endphp
                @php $permsLines = PERM::convertLines($perms) @endphp
                <table class="table table-striped permTable">
                    <tr>
                        <th></th>
                        @foreach($perms as $key => $value)
                            <th><input id="{{ 'perm-' . strtolower($key) }}" type="checkbox" class="selectAll"/> {{ $key }}</th>
                        @endforeach
                    </tr>
                    @foreach($permsLines as $permKey => $permLine)
                        <tr>
                            <td><strong>{{ ucfirst($permKey) }}</strong></td>
                            @foreach($permLine as $perm)
                                <td>
                                    {{ Form::checkbox(
                                            'permission[]',
                                            $perm->id,
                                            false,
                                            [
                                                'class' => 'name select',
                                                'data-perm' => current(explode('-', $perm->name))
                                            ]
                                        )
                                    }}
                                    {{ $perm->display_name }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-lg-4">

        @widget('Status', [
            'title' => 'Status'
        ])
                
    </div>

</div>
{!! Form::close() !!}

@endsection