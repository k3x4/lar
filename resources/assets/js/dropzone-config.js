var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    paramName: 'file',
    /*maxFilesize: 5, // MB
    maxFiles: 20,*/
    /*
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    */
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    /*init: function () {
        this.on("removedfile", function (file) {
            $.post({
                url: '/admin/media/destroy',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },*/
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("#" + total_photos_counter + " uploaded!");
    }

};
