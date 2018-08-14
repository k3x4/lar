<?php $__env->startSection('page_title', $listing->title); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fullwidth clearfix">

    <!-- Post Content
    ============================================= -->
    <div class="postcontent bothsidebar nobottommargin clearfix">

        <?php echo htmlspecialchars_decode($listing->content); ?>


    </div><!-- .postcontent end -->

    <!-- Sidebar
    ============================================= -->
    <div class="sidebar leftsidebar nobottommargin clearfix">
        <div class="sidebar-widgets-wrap">

            <?php echo app('arrilot.widget')->run('CategoriesMenu', [
                'title' => 'Categories',
                'categories' => $categories,
            ]); ?>

            <div class="widget clearfix">

                <h4>Testimonials</h4>
                <div class="fslider testimonial noborder nopadding noshadow" data-animation="slide" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                    <div class="testi-meta">
                                        Steve Jobs
                                        <span>Apple Inc.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                    <div class="testi-meta">
                                        Collis Ta'eed
                                        <span>Envato Inc.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="testi-image">
                                    <a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                    <div class="testi-meta">
                                        John Doe
                                        <span>XYZ Inc.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="widget clearfix">

                <h4>Instagram Photos</h4>
                <div id="instagram-photos" class="instagram-photos masonry-thumbs" data-user="5834720953" data-count="16" data-type="user"></div>

            </div>

            <div class="widget quick-contact-widget clearfix">

                <h4>Quick Contact</h4>
                <div class="quick-contact-form-result"></div>
                <form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">
                    <div class="form-process"></div>

                    <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
                    <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
                    <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
                    <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                    <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d nomargin" value="submit">Send Email</button>
                </form>

            </div>

        </div>
    </div><!-- .sidebar end -->

    <!-- Sidebar
    ============================================= -->
    <div class="sidebar rightsidebar nobottommargin col_last clearfix">
        <div class="sidebar-widgets-wrap">

            <div class="widget widget-twitter-feed clearfix">

                <h4>Twitter Feed</h4>
                <ul class="iconlist twitter-feed" data-username="envato" data-count="2">
                    <li></li>
                </ul>

                <a href="#" class="btn btn-secondary btn-sm fright">Follow Us on Twitter</a>

            </div>

            <div class="widget clearfix">

                <h4>Flickr Photostream</h4>
                <div id="flickr-widget" class="flickr-feed masonry-thumbs" data-id="613394@N22" data-count="16" data-type="group" data-lightbox="gallery"></div>

            </div>

            <div class="widget clearfix">

                <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-1">Popular</a></li>
                        <li><a href="#tabs-2">Recent</a></li>
                        <li><a href="#tabs-3"><i class="icon-comments-alt norightmargin"></i></a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tabs-1">
                            <div id="popular-post-list-sidebar">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/3.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li><i class="icon-comments-alt"></i> 35 Comments</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/2.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li><i class="icon-comments-alt"></i> 24 Comments</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/1.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li><i class="icon-comments-alt"></i> 19 Comments</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content clearfix" id="tabs-2">
                            <div id="recent-post-list-sidebar">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/1.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/2.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/magazine/small/3.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content clearfix" id="tabs-3">
                            <div id="recent-post-list-sidebar">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <strong>John Doe:</strong> Veritatis recusandae sunt repellat distinctio...
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <strong>Mary Jane:</strong> Possimus libero, earum officia architecto maiores....
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="rounded-circle" src="images/icons/avatar.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <strong>Site Admin:</strong> Deleniti magni labore laboriosam odio...
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="widget clearfix">

                <h4>Portfolio Carousel</h4>
                <div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">

                    <div class="oc-item">
                        <div class="iportfolio">
                            <div class="portfolio-image">
                                <a href="#">
                                    <img src="images/portfolio/4/3.jpg" alt="Mac Sunglasses">
                                </a>
                                <div class="portfolio-overlay">
                                    <a href="http://vimeo.com/89396394" class="center-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-desc center nobottompadding">
                                <h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
                                <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="oc-item">
                        <div class="iportfolio">
                            <div class="portfolio-image">
                                <a href="portfolio-single.html">
                                    <img src="images/portfolio/4/1.jpg" alt="Open Imagination">
                                </a>
                                <div class="portfolio-overlay">
                                    <a href="images/blog/full/1.jpg" class="center-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-desc center nobottompadding">
                                <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                                <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="widget clearfix">

                <h4>Tag Cloud</h4>
                <div class="tagcloud">
                    <a href="#">general</a>
                    <a href="#">videos</a>
                    <a href="#">music</a>
                    <a href="#">media</a>
                    <a href="#">photography</a>
                    <a href="#">parallax</a>
                    <a href="#">ecommerce</a>
                    <a href="#">terms</a>
                    <a href="#">coupons</a>
                    <a href="#">modern</a>
                </div>

            </div>

        </div>

    </div><!-- .sidebar end -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>