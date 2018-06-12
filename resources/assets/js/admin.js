window.Vue = require('vue');

$(document).ready(function () {

    /*** TINYMCE INIT ***/

    // tinymce.init({
    //     selector: '.tinymce-textarea',
    //     skin: 'lightgray',
    //     height: 300,
    //     /*toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
    //      plugins: 'code'*/

    //     /*theme: 'modern',
    //     skin: 'light',*/
    //     plugins: [
    //         'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    //         'searchreplace wordcount visualblocks visualchars code fullscreen',
    //         'insertdatetime media nonbreaking save table contextmenu directionality',
    //         'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
    //     ],
    //     toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
    //     image_advtab: true,
    //     templates: [
    //         { title: 'Test template 1', content: 'Test 1' },
    //         { title: 'Test template 2', content: 'Test 2' }
    //     ]

    // });



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
            // $('.dataTable .selectAll').icheck('check');
        } else {
            $('.dataTable .selectAll').prop('checked', false).icheck('updated');
            // $('.dataTable .selectAll').icheck('uncheck');
        }
    });


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
    })

});