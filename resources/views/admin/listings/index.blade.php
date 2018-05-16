@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            @permission('listing-create')
            <a class="btn btn-success" href="{{ route('admin.listings.create') }}"> New Listing</a>
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
                <h3 class="box-title">Listings list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Content</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($listings as $key => $listing)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->slug }}</td>
                        <td>{{ strip_tags($listing->content) }}</td>
                        <td>
                            @permission('listing-edit')
                            <a class="btn btn-primary" href="{{ route('admin.listings.edit', $listing->id) }}">Edit</a>
                            @endpermission
                            @permission('listing-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.listings.destroy', $listing->id],'style'=>'display:inline']) !!}
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
{!! $listings->render() !!}
@endsection