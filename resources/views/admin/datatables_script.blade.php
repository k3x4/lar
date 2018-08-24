<script>
    var $dt = $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        language: {
            processing: '<i class="fa fa-4x fa-cog fa-spin"></i>'
        },
        dom: "<'filter-search'<'top-block'f><'top-block'l>>" + 
             "<'table-block'tr>" +
             "<'details-block'<'bottom-block'i><'bottom-block'p>>",
        ajax: { 
            "url": {!! "'" . $url . "'" !!},
            "data": function (d) {
                $('.dt-filter').each(function(){
                    var key = $(this).data('key');
                    d[key] = $(this).val();
                });
                @if (isset($author))
                    d['author'] = {!! $author !!}
                @endif    
            }
        },
        order: [
            @if (!isset($order) || $order)
                {!! '[ 1, "desc" ]' !!}
            @endif    
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "orderable": false,
                "searchable": false
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        columns: {!! $columns !!},
        drawCallback: function( settings, json ) {
            $('input[type="checkbox"]:not(".icheck-input")').icheck({
                checkboxClass: 'icheckbox_flat-blue',
            });

            $('.dtable tbody').prepend('<span class="disableOverlay"><span>');

            /*
            var clonedRow = $('.dtable tbody tr:first').clone();
            clonedRow.find('td').html('');
            $('.dtable tbody').prepend(clonedRow);

            var exceptRows = [0, 1];
            
            this.api().columns().every(function () {
                var column = this;
                var idx = column.index();
                if (exceptRows.indexOf(idx) == -1)
                {
                    var input = document.createElement("input");
                    $(input).appendTo( clonedRow.find('td:eq(' + idx + ')') )
                    .on('change', function () {
                        column.search($(this).val()).draw();
                    });
                }
            });
            */
        }
    });

    $dt.on('processing.dt', function(e, settings, processing){
        $('.disableOverlay').css('display', processing ? 'block' : 'none' );
    })

    $(document).on('change', '.dt-filter', function () {
        $dt.draw();
    });

</script>