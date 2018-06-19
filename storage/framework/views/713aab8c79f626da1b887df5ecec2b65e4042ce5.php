<?php if (\Entrust::can('media-create')) : ?>
    <?php echo Form::open([
        'route' => 'admin.media.store',
        'enctype' => 'multipart/form-data',
        'id' => 'my-dropzone',
        'class' => 'dropzone'
    ]); ?>

    <?php echo Form::close(); ?>

<?php endif; // Entrust::can ?>