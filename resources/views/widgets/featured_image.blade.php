@section('head')
@parent
      <script src="{{ asset('js/lib/dropzone/min/dropzone.min.js') }}"></script>
      <script src="{{ asset('js/dropzone-config.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('js/lib/dropzone/min/dropzone.min.css') }}">

      <script src="{{ asset('js/lib/datatables/js/jquery.dataTables.js') }}"></script>
      <script src="{{ asset('js/lib/datatables/js/dataTables.bootstrap.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('js/lib/datatables/css/dataTables.bootstrap.css') }}">
@endsection

<div id="featured-preview"></div>
{!! Form::hidden('featuredImage') !!}

<a href="#" id="modalLink" style="display:block;" data-toggle="modal" data-target="#mediamanager">
  Select image
</a>

<a href="#" id="removeLink" style="display:none;">
  Remove image
</a>

<div class="modal fade" id="mediamanager">
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
                        Upload file
                    </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body dropzone-container">
                    <form></form><!-- FIX CLEAR FIRST NESTED FORM -->
                    @permission('media-create')
                        {!! Form::open([
                            'route' => 'admin.media.store',
                            'enctype' => 'multipart/form-data',
                            'id' => 'my-dropzone',
                            'class' => 'dropzone'
                        ]) !!}
                        {!! Form::close() !!}
                    @endpermission
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

@section('footer_scripts')
@parent

@include('admin.datatables_script', [
    'url' => route('admin.media.datapopup'),
    'columns' => json_encode([
        ['data' => 'action', 'name' => 'action'],
        ['data' => 'id', 'name' => 'id'],
        ['data' => 'thumb', 'name' => 'thumb'],
        ['data' => 'filename', 'name' => 'filename'],
        ['data' => 'original_name', 'name' => 'original_name'],
        ['data' => 'created_at', 'name' => 'created_at']
    ])
])

    <script>
    $( document ).ready(function() {

      $(document).on('click','.dtable a', {} ,function (e) {
        e.preventDefault();
        $('#mediamanager').trigger('click');
        var imgUrl = $(this).attr('href');
        var imgId = $(this).data('id');
        $('#featured-preview').css('background-image', 'url(' + imgUrl + ')').slideDown();
        $('input[name=featuredImage]').val(imgId);
        $('#modalLink').fadeOut(500);
        $('#removeLink').fadeIn(1000);
      });

      $(document).on('click','#removeLink', {} ,function (e) {
        e.preventDefault();
        $('#featured-preview').css('background-image', '').slideUp();
        $('input[name=featuredImage]').val('');
        $('#removeLink').fadeOut(500);
        $('#modalLink').fadeIn(1000);
      });

    });

    </script>
@endsection