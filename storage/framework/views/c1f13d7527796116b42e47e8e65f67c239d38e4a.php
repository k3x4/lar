<?php $__env->startSection('page_title', $listing->title); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-2">
            <aside class="sidebar">
                <?php echo app('arrilot.widget')->run('CategoriesMenu', [
                    'listing' => $listing
                ]); ?>
            </aside>
        </div>

        <div class="col-lg-7">

            <h2><?php echo e($listing->title); ?></h2>

            <?php if(isset($gallery) && $gallery): ?>
                <div class="thumb-gallery">
                    <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <span class="img-thumbnail d-block">
                                    <span class="v-helper"></span><img src="/uploads/<?php echo e($image->filename); ?>" class="img-fluid">
                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <span class="img-thumbnail d-block cur-pointer">
                                    <img src="/uploads/<?php echo e($image->get('mini')); ?>" class="img-fluid">
                                </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>


            <?php echo htmlspecialchars_decode($listing->content); ?>




            <div class="row">
                <div class="col">
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh metus.
                    </p>
                </div>
            </div>

            <hr class="tall">

            <div class="row">
                <div class="col">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                    <img class="float-left img-fluid" width="300" height="211" src="img/device.png" alt="Device">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                </div>
            </div>

        </div>

        <div class="col-lg-3">
            <aside class="sidebar">

                <div class="tabs mb-4 pb-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item active"><a class="nav-link" href="#popularPosts" data-toggle="tab"><i class="fas fa-star"></i> Popular</a></li>
                        <li class="nav-item"><a class="nav-link" href="#recentPosts" data-toggle="tab">Recent</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="popularPosts">
                            <ul class="simple-post-list">
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="recentPosts">
                            <ul class="simple-post-list">
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail d-block">
                                            <a href="blog-post.html">
                                                <img src="img/blog/blog-thumb-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                        <div class="post-meta">
                                            Jan 10, 2017
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr>

                <h4 class="heading-primary">About Us</h4>
                <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>

            </aside>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>