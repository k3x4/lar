@extends('layouts.main')

@section('page_title', $category->title)

@section('content')

<div class="container-fullwidth clearfix">

    <!-- Post Content
					============================================= -->
					<div class="postcontent bothsidebar nobottommargin clearfix">

                        @foreach($listings as $listing)
                            {{ $listing->title }} <br />
                        @endforeach

						<!-- Posts
						============================================= -->
						<div id="posts" class="post-grid grid-container grid-2 clearfix" data-layout="fitRows">

							<div class="entry clearfix">
								<div class="entry-image">
									<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/grid/17.jpg" alt="Standard Post with Image"></a>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 10th Feb 2014</li>
									<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image">
									<iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single-full.html">This is a Standard post with a Vimeo Video</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 16th Feb 2014</li>
									<li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19</a></li>
									<li><a href="#"><i class="icon-film"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single-full.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image">
									<div class="fslider" data-arrows="false" data-lightbox="gallery">
										<div class="flexslider">
											<div class="slider-wrap">
												<div class="slide"><a href="images/blog/full/10.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/10.jpg" alt="Standard Post with Gallery"></a></div>
												<div class="slide"><a href="images/blog/full/20.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/20.jpg" alt="Standard Post with Gallery"></a></div>
												<div class="slide"><a href="images/blog/full/21.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/21.jpg" alt="Standard Post with Gallery"></a></div>
											</div>
										</div>
									</div>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single-small.html">This is a Standard post with a Slider Gallery</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 24th Feb 2014</li>
									<li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
									<li><a href="#"><i class="icon-picture"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single-small.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image clearfix">
									<div class="fslider" data-animation="fade" data-pagi="false" data-lightbox="gallery">
										<div class="flexslider">
											<div class="slider-wrap">
												<div class="slide"><a href="images/blog/full/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/2.jpg" alt="Standard Post with Gallery"></a></div>
												<div class="slide"><a href="images/blog/full/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/3.jpg" alt="Standard Post with Gallery"></a></div>
												<div class="slide"><a href="images/blog/full/12.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/12.jpg" alt="Standard Post with Gallery"></a></div>
												<div class="slide"><a href="images/blog/full/13.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/grid/13.jpg" alt="Standard Post with Gallery"></a></div>
											</div>
										</div>
									</div>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single-thumbs.html">This is a Standard post with Fade Gallery</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
									<li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
									<li><a href="#"><i class="icon-picture"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single-thumbs.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image clearfix">
									<iframe width="100%" height="152" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/115823769&amp;auto_play=false&amp;hide_related=true&amp;visual=true"></iframe>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single.html">This is an Embedded Audio Post</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 28th Apr 2014</li>
									<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 16</a></li>
									<li><a href="#"><i class="icon-music2"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image">
									<iframe width="560" height="315" src="http://www.youtube.com/embed/SZEflIVnhH8" frameborder="0" allowfullscreen></iframe>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single-full.html">This is a Standard post with a Youtube Video</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 30th Apr 2014</li>
									<li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 34</a></li>
									<li><a href="#"><i class="icon-film"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single-full.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image">
									<a href="images/blog/full/1.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/grid/1.jpg" alt="Standard Post with Image"></a>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single.html">This is a Standard post with another Preview Image</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 5th May 2014</li>
									<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 6</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single.html"class="more-link">Read More</a>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image">
									<iframe frameborder="0" width="480" height="270" src="http://www.dailymotion.com/embed/video/x18murk" allowfullscreen></iframe>
								</div>
								<div class="entry-title">
									<h2><a href="blog-single-full.html">This is a Standard post with a Dailymotion Video</a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 11th May 2014</li>
									<li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 9</a></li>
									<li><a href="#"><i class="icon-film"></i></a></li>
								</ul>
								<div class="entry-content">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
									<a href="blog-single-full.html"class="more-link">Read More</a>
								</div>
							</div>

						</div><!-- #posts end -->

						<!-- Pagination
						============================================= -->
						<div class="row mb-3">
							<div class="col-12">
								<a href="#" class="btn btn-outline-secondary float-left">&larr; Older</a>
								<a href="#" class="btn btn-outline-dark float-right">Newer &rarr;</a>
							</div>
						</div>
						<!-- .pager end -->

					</div><!-- .postcontent end -->

    <!-- Sidebar
    ============================================= -->
    <div class="sidebar leftsidebar nobottommargin clearfix">
        <div class="sidebar-widgets-wrap">

            @widget('CategoriesMenu')

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

@endsection