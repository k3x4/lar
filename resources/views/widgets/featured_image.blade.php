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
        <iframe src="" width="100%" height="100%" frameborder="0"></iframe>
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

    <script>
    $( document ).ready(function() {

        $('#mediamanager').on('show.bs.modal', function () {
          $('#mediamanager iframe').attr( "src", {!! "'" . route('admin.media.popup') . "'" !!} );
        });
        

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