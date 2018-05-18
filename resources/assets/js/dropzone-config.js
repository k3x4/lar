var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    paramName: 'file',
    /*maxFilesize: 5, // MB
    maxFiles: 20,*/
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    init: function () {
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
    },
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
    }

    /*
    init: function () {
        this.on("success", function (file, response) {
            var a = document.createElement('span');
            a.className = "thumb-url btn btn-primary";
            a.setAttribute("data-clipboard-text", window.location.origin + "/uploads/" + response);
            a.innerHTML = "copy url";
            file.previewTemplate.appendChild(a);
        });
    }
    */
};
/*
$('.thumb-url').tooltip({
    trigger: 'click',
    placement: 'bottom'
});

function setTooltip(btn, message) {
    $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
}

function hideTooltip(btn) {
    setTimeout(function () {
        $(btn).tooltip('hide');
    }, 500);
}

var clipboard = new ClipboardJS('.thumb-url');

clipboard.on('success', function (e) {
    e.clearSelection();
    setTooltip(e.trigger, 'Copied!');
    hideTooltip(e.trigger);
});

clipboard.on('error', function (e) {
    e.clearSelection();
    setTooltip(e.trigger, 'Failed');
    hideTooltip(e.trigger);
});
*/