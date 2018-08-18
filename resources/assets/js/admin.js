/*window.Vue = require('vue');*/

$(document).ready(function () {

    $('.select2').select2();

    /*** TINYMCE INIT ***/

    tinymce.init({
        selector: '.tinymce-textarea',
        skin: 'lightgray',
        height: 300,
        /*toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
         plugins: 'code'*/

        /*theme: 'modern',
        skin: 'light',*/
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
        ],
        toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ]

    });



    /*** DELETE CONFIRM ***/

    // Select the submit buttons of forms with data-confirm attribute
    var submit_buttons = $("form input[type='submit'][data-confirm]");

    // On click of one of these submit buttons
    submit_buttons.on('click', function (e) {

        // Prevent the form to be submitted
        e.preventDefault();

        if ($(this).hasClass("disabled")) {
            return false;
        }

        var button = $(this); // Get the button
        var form = button.closest('form'); // Get the related form
        var msg = button.data('confirm'); // Get the confirm message

        if (confirm(msg)) {
            form.submit(); // If the user confirm, submit the form
        }

    });


    /*** DATATABLES ***/

    $(document).on('click','.dataTable .select', {} ,function () {
        var numberAll = $('.dataTable .select').length;
        var numberOfChecked = $('.dataTable .select:checked').length;

        var i = 0;
        var vals = [];
        $('.dataTable .select:checked').each(function(){
            vals[i++] = $(this).val();
        });
        $(".deleteForm input[name='ids']").val(vals);
        
        if (numberOfChecked) {
            $(".deleteForm input[type='submit']").removeClass("disabled");
        } else {
            $(".deleteForm input[type='submit']").addClass("disabled");
        }

        if(numberOfChecked == numberAll){
            $('.dataTable .selectAll').prop('checked', true).icheck('updated');
            //$('.dataTable .selectAll').icheck('check');
        } else {
            $('.dataTable .selectAll').prop('checked', false).icheck('updated');
            //$('.dataTable .selectAll').icheck('uncheck');
        }
    });

    // $('.dataTable .selectAll').on('ifChecked', function (event) {
    //     $('.dataTable .select').each(function () {
    //         $(this).prop('checked', true).icheck('updated');
    //         $(".deleteForm input[type='submit']").removeClass("disabled");
    //     });
    // });

    // $('.dataTable .selectAll').on('ifUnchecked', function (event) {
    //     $('.dataTable .select').each(function () {
    //         $(this).prop('checked', false).icheck('updated');
    //         $(".deleteForm input[type='submit']").addClass("disabled");
    //     });
    // });

    $(document).on('click','.dataTable .selectAll', {} ,function () {
        if($(this).is(":checked")){
            $('.dataTable .select').each(function(){
                $(this).prop('checked', true).icheck('updated');
                $(".deleteForm input[type='submit']").removeClass("disabled");
            });
        } else {
            $('.dataTable .select').each(function(){
                $(this).prop('checked', false).icheck('updated');
                $(".deleteForm input[type='submit']").addClass("disabled");
            });
        }

        var i = 0;
        var vals = [];
        $('.dataTable .select:checked').each(function(){
            vals[i++] = $(this).val();
        });
        $(".deleteForm input[name='ids']").val(vals);
    });


    // BOOTSTRAP-SELECT
    $(document).on('click','.bootstrap-select .dropdown-menu li', {} ,function () {
        var current = this;
        $('.bootstrap-select .dropdown-menu li').each(function(){
            if($(this).hasClass('active') && this != current){
                $(this).removeClass('active');
            }
        })
    });

    // I-CHECK ALL
    $('input[type="checkbox"]:not(".icheck-input")').icheck({
        checkboxClass: 'icheckbox_flat-blue',
    });


    // CHECKS TABLE
    $('.checkTable th .selectAll').each(function(){
        var className = $(this).attr('id').split('-');
        className = className[1];
        var numberAll = $('.checkTable .select[data-parent=' + className + ']').length;
        var numberOfChecked = $('.checkTable .select[data-parent=' + className + ']:checked').length;
        if(numberOfChecked == numberAll){
            $('.checkTable #parent-' + className).prop('checked', true).icheck('updated');
        } else {
            $('.checkTable #parent-' + className).prop('checked', false).icheck('updated');
        }
    });
    
    $(document).on('click','.checkTable .select', {} ,function () {
        var className = $(this).data('parent');

        var numberAll = $('.checkTable .select[data-parent=' + className + ']').length;
        var numberOfChecked = $('.checkTable .select[data-parent=' + className + ']:checked').length;

        var i = 0;
        var vals = [];
        $('.checkTable .select[data-parent=' + className + ']:checked').each(function(){
            vals[i++] = $(this).val();
        });
        
        if(numberOfChecked == numberAll){
            $('.checkTable #parent-' + className).prop('checked', true).icheck('updated');
        } else {
            $('.checkTable #parent-' + className).prop('checked', false).icheck('updated');
        }
    });

    $(document).on('click','.checkTable .selectAll', {} ,function () {
        var className = $(this).attr('id').split('-');
        className = className[1];
        if($(this).is(":checked")){
            $('.checkTable .select[data-parent=' + className + ']').each(function(){
                $(this).prop('checked', true).icheck('updated');
            });
        } else {
            $('.checkTable .select[data-parent=' + className + ']').each(function(){
                $(this).prop('checked', false).icheck('updated');
            });
        }

        var i = 0;
        var vals = [];
        $('.checkTable .select[data-check=' + className + ']' + ':checked').each(function(){
            vals[i++] = $(this).val();
        });
    });


    // JQUERY UI SORTABLE
    $('.sortable-gallery').sortable({
        placeholder: "sortable-gallery-placeholder",
        forcePlaceholderSize: true,
        update: function(event, ui) {
            updateSortable();
        },
    });
    $('.sortable-gallery').bind('sortupdate', function(event, ui) {
        updateSortable();
    });
    function updateSortable(){
        var i = 0;
        var ids = [];
        $('.sortable-gallery li').each(function(){
            ids[i++] = $(this).data('id');
        });
        $('#gallery').val(ids);
    }


});