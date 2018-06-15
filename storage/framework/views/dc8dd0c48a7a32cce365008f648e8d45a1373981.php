<script src="<?php echo e(asset('js/lib/icheck-2/icheck.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('js/lib/icheck-2/skins/flat/blue.css')); ?>">
<script>
    $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: { 
            "url": <?php echo "'" . $url . "'"; ?>,
            <?php echo isset($data) ? '"data": ' . $data : ''; ?>

        },
        order: [
            [ 1, "desc" ]
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
        columns: <?php echo $columns; ?>,
        "initComplete": function( settings, json ) {
            $('input[type="checkbox"]').icheck({
                checkboxClass: 'icheckbox_flat-blue',
            });
        }
    });
</script>