$(document).ready(function () {

    /*** TINYMCE INIT ***/

    tinymce.init({
        selector: '.tinymce-textarea',
        /*skin: 'lightgray',*/
        height: 300,
        /*toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
         plugins: 'code'*/

        theme: 'modern',
        skin: 'light',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'
        ],
        toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]

    });



    /*** DELETE CONFIRM ***/

    // Select the submit buttons of forms with data-confirm attribute
    var submit_buttons = $("form input[type='submit'][data-confirm]");

    // On click of one of these submit buttons
    submit_buttons.on('click', function (e) {

        // Prevent the form to be submitted
        e.preventDefault();

        var button = $(this); // Get the button
        var form = button.closest('form'); // Get the related form
        var msg = button.data('confirm'); // Get the confirm message

        if (confirm(msg)) {
            form.submit(); // If the user confirm, submit the form
        }

    });
    
    
    
});