<script src="{{ asset('js/lib/icheck-2/icheck.js') }}"></script>
<link rel="stylesheet" href="{{ asset('js/lib/icheck-2/skins/flat/blue.css') }}">
<script>
    $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: { 
            "url": {!! "'" . $url . "'" !!},
            @if (isset($data))
                {!! '"data": ' . $data !!}
            @endif    
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
        "drawCallback": function( settings, json ) {
            $('input[type="checkbox"]:not(".icheck-input")').icheck({
                checkboxClass: 'icheckbox_flat-blue',
            });
        }
    });
</script>