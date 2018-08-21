<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('admin.listings.index')); ?>"> Back</a>
        </div>
    </div>
</div>
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php echo Form::model($listing, ['method' => 'PATCH','route' => ['admin.listings.update', $listing->id]]); ?>

<div class="row">

    <div class="col-lg-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Listing <strong><?php echo e($listing->title); ?></strong></h3>
            </div>
            
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    <?php echo Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Slug:</strong>
                    <?php echo Form::text('slug', null, ['placeholder' => 'Slug','class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <?php echo Form::textarea('content', old('content'), ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']); ?>

                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Ειδικά πεδία')); ?></h3>
            </div>
            
            <div class="box-body">
                <span id="loading" style="text-align:center;display:block;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></span>
                <div id="fields-show">
                </div>
            </div>
        </div>

        <?php if(count($featureGroups)): ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Χαρακτηριστικά')); ?></h3>
            </div>
            
            <div class="box-body">
                <?php $__currentLoopData = $featureGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featureGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $featureGroup->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="feature-cat-item">
                        <?php echo e(Form::checkbox(
                                'features[]',
                                $feature->id,
                                in_array($feature->id, $features) ? true : false
                            )); ?>

                        <?php echo e($feature->title); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="col-lg-4">

        <?php echo app('arrilot.widget')->run('Status', [
            'title' => 'Status',
            'author' => $listing->author['email'],
            'draft' => true
        ]); ?>

        <?php echo app('arrilot.widget')->run('Category', [
            'title' => 'Category',
            'categories' => $categories
        ]); ?>

        <?php echo app('arrilot.widget')->run('FeaturedImage', [
            'title' => 'Featured image',
            'featuredImage' => $featuredImage
        ]); ?>

        <?php echo app('arrilot.widget')->run('ListingGallery', [
            'title' => 'Extra images',
            'gallery' => $gallery
        ]); ?>
               
    </div>

    <?php echo $__env->make('admin.media.mediamanager', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
##parent-placeholder-c55a01b0a8ef1d7b211584e96d51bdf8930d1005##
    <script>
        $(document).ready(function() {
            $('#category-select').change(function() {
                $.ajax({
                    url: '<?php echo route("admin.listings.fields"); ?>',
                    type: 'GET',
                    data: {
                        category: $('#category-select').val(),
                        listing_id: <?php echo $listing->id; ?>

                    },
                    success: function(data) {
                        $('#fields-show').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
            $("#category-select").change();

            $(document).ajaxStart(function() {
                $("#loading").show();
            });

            $(document).ajaxStop(function() {
                $("#loading").hide();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>