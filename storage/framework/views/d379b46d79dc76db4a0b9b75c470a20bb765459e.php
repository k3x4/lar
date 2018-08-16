<?php if (! empty(trim($__env->yieldContent('hide_title_wrapper')))): ?>
<?php else: ?>

    <section class="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1><?php echo $__env->yieldContent('page_title'); ?></h1>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>