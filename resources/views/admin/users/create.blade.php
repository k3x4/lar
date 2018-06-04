@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>
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

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create New User</h3>
            </div>
            {!! Form::open(['route' => 'admin.users.store','method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Email','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,[], ['class' => 'form-control','multiple']) !!}
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection