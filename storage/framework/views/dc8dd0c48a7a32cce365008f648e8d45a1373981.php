<script src="<?php echo e(asset('js/lib/icheck-2/icheck.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('js/lib/icheck-2/skins/flat/blue.css')); ?>">
<script>
    $('.dtable').DataTable({
        processing: true,
        serverSide: true,
        ajax: { 
            "url": <?php echo "'" . $url . "'"; ?>,
            <?php if(isset($data)): ?>
                <?php echo '"data": ' . $data; ?>

            <?php endif; ?>    
        },
        order: [
            <?php if(!isset($order) || $order): ?>
                <?php echo '[ 1, "desc" ]'; ?>

            <?php endif; ?>    
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
        "drawCallback": function( settings, json ) {
            $('input[type="checkbox"]:not(".icheck-input")').icheck({
                checkboxClass: 'icheckbox_flat-blue',
            });
        }
    });
</script>