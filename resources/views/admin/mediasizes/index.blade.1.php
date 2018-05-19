@extends('admin.layout.master')

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
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Tag</th>
                        <th>Width</th>
                        <th>Height</th>
                        <th>Crop</th>
                        <th>Crop position</th>
                        <th>Enable</th>
                        <th width="280px">Action</th>
                    </tr>
                    @php ($i = 0)
                    @foreach ($mediaSizes as $key => $size)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $size->tag }}</td>
                        <td>{{ $size->width }}</td>
                        <td>{{ $size->height }}</td>
                        <td>{{ ($size->crop) ? 'yes' : 'no' }}</td>
                        <td>{{ $size->crop_position }}</td>
                        <td>{{ ($size->enabled) ? 'yes' : 'no' }}</td>
                        <td>
                            @permission('mediasize-edit')
                            <a class="btn btn-primary" href="{{ route('admin.mediasizes.edit', $size->id) }}">Edit</a>
                            @endpermission
                            @permission('mediasize-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.mediasizes.destroy', $size->id],'style'=>'display:inline']) !!}
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
                
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>            
@endsection