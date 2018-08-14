<?php $__env->startSection('page_title', '404 - Η καταχώρηση δε βρέθηκε'); ?>

<?php $__env->startSection('content'); ?>

<div class="container clearfix">

    <div class="col_half nobottommargin">
        <div class="error404 center">404</div>
    </div>

    <div class="col_half nobottommargin col_last">

        <div class="heading-block nobottomborder">
            <h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
            <span>Try searching for the best match or browse the links below:</span>
        </div>

        <form action="#" method="get" role="form" class="nobottommargin">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" placeholder="Search for Pages...">
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button">Search</button>
                </div>
            </div>
        </form>

        <div class="col_one_third widget_links topmargin nobottommargin">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </div>

        <div class="col_one_third widget_links topmargin nobottommargin">
            <ul>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>

        <div class="col_one_third widget_links topmargin nobottommargin col_last">
            <ul>
                <li><a href="#">Support</a></li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>