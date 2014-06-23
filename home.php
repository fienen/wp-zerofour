<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

get_header(); ?>
				<div class="main-wrapper-style1">
					<div class="inner">
				
						<!-- Feature 1 -->
							<section class="container box-feature1">
								<div class="row">
									<div class="12u">
										<header class="first major">
											<h2>This is an important heading</h2>
											<span class="byline">And this is where we talk about why we’re <strong>pretty awesome</strong> ...</span>
										</header>
									</div>
								</div>
								<div class="row">
									<div class="4u">
										<section>
											<span class="image image-full"><img src="/zerofour/wp-content/themes/wp-zerofour/images/stock/pic01.jpg" alt="" /></span>
											<header class="second fa fa-user">
												<h3>OMFG Whats That</h3>
												<span class="byline">Nevermind its just a wall lol</span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="/zerofour/wp-content/themes/wp-zerofour/images/stock/pic02.jpg" alt="" /></span>
											<header class="second fa fa-cog">
												<h3>Really Close Up</h3>
												<span class="byline">This looks pretty harmless</span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="/zerofour/wp-content/themes/wp-zerofour/images/stock/pic03.jpg" alt="" /></span>
											<header class="second fa fa-bar-chart-o">
												<h3>Pretty Blue LEDs</h3>
												<span class="byline">Just so many of them man</span>
											</header>
										</section>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper 
										bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod 
										quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit 
										amet pulvinar. Nam nec turpis.</p>
									</div>
								</div>
							</section>

					</div>
				</div>
				<div class="main-wrapper-style2">
					<div class="inner">
				
						<!-- Feature 2 -->
							<section class="container box-feature2">
								<div class="row">
									<div class="6u">
										<section>
											<header class="major">
												<h2>And this is a subheading</h2>
												<span class="byline">It’s important but clearly not *that* important</span>
											</header>
											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. 
											Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. 
											Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi 
											consequat etiam.</p>
											<footer>
												<a href="#" class="button medium fa fa-arrow-circle-o-right">Let's do this</a>
											</footer>
										</section>
									</div>
									<div class="6u">
										<section>
											<header class="major">
												<h2>This is also a subheading</h2>
												<span class="byline">And is as less important as the other one</span>
											</header>
											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. 
											Praesent semper mod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. 
											Aliquam luctus et mattis lectus sit amet pulvinar. Nam turpis nisi 
											consequat etiam.</p>
											<footer>
												<a href="#" class="button medium alt fa fa-info-circle">Wait, what?</a>
											</footer>
										</section>
									</div>
								</div>
							</section>

						</div>
				</div>
<?php get_template_part( 'loop', 'recent-posts' ); ?>
			</div>

<?php get_footer(); ?>