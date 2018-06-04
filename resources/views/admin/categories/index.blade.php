@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            @permission('category-create')
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> New Category</a>
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
                <h3 class="box-title">Categories list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->display_name }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent_display_name }}</td>
                        <td>{{ strip_tags($category->description) }}</td>
                        <td>
                            @permission('category-edit')
                            <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                            @endpermission
                            @permission('category-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.categories.destroy', $category->id],'style'=>'display:inline']) !!}
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
{!! $categories->render() !!}
@endsection