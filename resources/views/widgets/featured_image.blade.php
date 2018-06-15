<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
  Launch Default Modal
</button>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Media manager</h4>
      </div>
      <div class="modal-body">

        <div class="box-group" id="accordion">
          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
          <div class="panel box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  Upload files <span id="counter"></span>
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="box-body">
                {!! Form::open([
                    'route' => 'admin.media.store',
                    'enctype' => 'multipart/form-data',
                    'id' => 'my-dropzone',
                    'class' => 'dropzone'
                ]) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>

        <table class="table dtable table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width:5px;"><input type="checkbox" class="selectAll"/></th>
                    <th style="width: 1%;">ID</th>
                    <th style="width: 1%;">Image</th>
                    <th style="width: 30%;">Filename</th>
                    <th style="width: 58%;">Original filename</th>
                    <th style="width: 10%;">Uploaded</th>
                </tr>
            </thead>
        </table>
        @permission('media-delete')
            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.media.destroy'], 'class' => 'deleteForm']) !!}
            {!! Form::hidden('ids') !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger disabled', 'data-confirm' => 'Are you sure you want to delete?']) !!}
            {!! Form::close() !!}
        @endpermission
      </div>
      <div class="modal-footer">
        <!--
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->