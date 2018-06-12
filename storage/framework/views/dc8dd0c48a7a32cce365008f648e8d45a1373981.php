$(document).ready(function () {

$.noConflict();

$('.dtable').DataTable({
    processing: true,
    serverSide: true,
    ajax: <?php echo "'" . $url . "'"; ?>,
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
    columns: [
        {data: 'action', name: 'action'},
        {data: 'id', name: 'id'},
        {data: 'title', name: 'title'},
        {data: 'slug', name: 'slug'},
        {data: 'content', name: 'content'},
        {data: 'created_at', name: 'created_at'}
    ],
    "pagingType": "numbers",
    "initComplete": function( settings, json ) {
        $('input[type="checkbox"]').icheck({
            checkboxClass: 'icheckbox_flat-blue',
        });
    }
});

});