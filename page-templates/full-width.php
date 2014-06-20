<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

get_header(); ?>
				<div class="main-wrapper-style2">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="12u skel-cell-important">
									<div id="content">
<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
		// Include the page content template.
		get_template_part( 'content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
?>
									</div>  <!-- #content -->
								</div>  <!-- .12u.skel-cell-important -->
							</div>  <!-- .row -->
						</div>  <!-- .container -->
					</div>  <!-- .inner -->
				</div>  <!-- .main-wrapper-style2 -->
				
				<div class="main-wrapper-style3">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="8u">

									<!-- Article list -->
										<section class="box-article-list">
											<h2 class="fa fa-file-text-o">From the blog</h2>
											
											<!-- Excerpt -->
												<article class="box-excerpt">
													<a href="#" class="image image-left"><img src="images/pic04.jpg" alt="" /></a>
													<div>
														<header>
															<span class="date">December 20, 2012</span>
															<h3><a href="#">On the eve of the Mayanocalypse</a></h3>
														</header>
														<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus 
														semper mod quisturpis nisi consequat etiam lorem. Phasellus quam turpis, 
														feugiat et sit amet ornare in, hendrerit in lectus semper mod quis eget mi dolore.</p>
													</div>
												</article>

											<!-- Excerpt -->
												<article class="box-excerpt">
													<a href="#" class="image image-left"><img src="images/pic05.jpg" alt="" /></a>
													<div>
														<header>
															<span class="date">December 15, 2012</span>
															<h3><a href="#">Life as a self-aware meme</a></h3>
														</header>
														<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus 
														semper mod quisturpis nisi consequat etiam lorem. Phasellus quam turpis, 
														feugiat et sit amet ornare in, hendrerit in lectus semper mod quis eget mi dolore.</p>
													</div>
												</article>

											<!-- Excerpt -->
												<article class="box-excerpt">
													<a href="#" class="image image-left"><img src="images/pic06.jpg" alt="" /></a>
													<div>
														<header>
															<span class="date">December 12, 2012</span>
															<h3><a href="#">Facepalm moments in history</a></h3>
														</header>
														<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus 
														semper mod quisturpis nisi consequat etiam lorem. Phasellus quam turpis, 
														feugiat et sit amet ornare in, hendrerit in lectus semper mod quis eget mi dolore.</p>
													</div>
												</article>

										</section>
								</div>
								<div class="4u">
								
									<!-- Spotlight -->
										<section class="box-spotlight">
											<h2 class="fa fa-file-text-o">Spotlight</h2>
											<article>
												<a href="#" class="image image-full"><img src="images/pic07.jpg" alt=""></a>
												<header>
													<h3><a href="#">Why staplers matter</a></h3>
													<span class="byline">They hold things together</span>
												</header>
												<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper mod 
												quisturpis nisi consequat ornare in, hendrerit in lectus semper mod quis eget mi quat etiam 
												lorem. Phasellus quam turpis, feugiat sed et lorem ipsum dolor consequat dolor feugiat sed
												et tempus consequat etiam.</p>
												<p>Lorem ipsum dolor quam turpis, feugiat sit amet ornare in, hendrerit in lectus semper 
												mod quisturpis nisi consequat etiam lorem sed amet quam turpis.</p>
												<footer>
													<a href="#" class="button alt fa fa-file-o">Continue Reading</a>
												</footer>
											</article>
										</section>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php get_footer(); ?>