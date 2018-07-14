<?php if (! empty(trim($__env->yieldContent('hide_title_wrapper')))): ?>
<?php else: ?>
<section id="page-title">

    <div class="container clearfix">
        <h1>
            <?php echo $__env->yieldContent('page_title'); ?>
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </div>

</section>
<?php endif; ?>