<?php extract($config) ?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
    </div>
    <div class="box-body">
        <div class="form-group">

            <?php echo Form::hidden('featuredImage', isset($featuredImage) ? $featuredImage->id : null); ?>


            <?php if( isset($featuredImage) ): ?>
                <div id="featured-preview" style="display:block;background-image: url(/uploads/<?php echo $featuredImage->filename; ?>);"></div>
                <a href="#" id="featured-select" style="display:none;" data-toggle="modal" data-target="#mediamanager">
                    Select image
                </a>
                <a href="#" id="featured-remove" style="display:block;">
                    Remove image
                </a>
            <?php else: ?>
                <div id="featured-preview"></div>
                <a href="#" id="featured-select" style="display:block;" data-toggle="modal" data-target="#mediamanager">
                    Select image
                </a>
                <a href="#" id="featured-remove" style="display:none;">
                    Remove image
                </a>
            <?php endif; ?>    

            <?php echo $__env->make('admin.media.mediamanager', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>
</div>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##

<script>
$( document ).ready(function() {

    $(document).on('click','.dtable a', {} ,function (e) {
        e.preventDefault();

        if($('#mediamanager').data('related') != 'featured-select'){
            return;
        }

        $('#mediamanager').trigger('click');

        var imgUrl = $(this).attr('href');
        var imgId = $(this).data('id');
        $('#featured-preview').css('background-image', 'url(' + imgUrl + ')').slideDown();
        $('input[name=featuredImage]').val(imgId);
        $('#featured-select').fadeOut(500);
        $('#featured-remove').fadeIn(1000);
    });

    $(document).on('click','#featured-remove', {} ,function (e) {
        e.preventDefault();
        $('#featured-preview').css('background-image', '').slideUp();
        $('input[name=featuredImage]').val('');
        $('#featured-remove').fadeOut(500);
        $('#featured-select').fadeIn(1000);
    });

});

</script>
<?php $__env->stopSection(); ?>