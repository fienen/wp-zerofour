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
				<div class="main-wrapper-style2">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="12u skel-cell-important">
									<div id="content">
<?php
	// Start the Loop.
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
	endif;
?>
									</div>  <!-- #content -->
								</div>  <!-- .12u.skel-cell-important -->
							</div>  <!-- .row -->
						</div>  <!-- .container -->
					</div>  <!-- .inner -->
				</div>  <!-- .main-wrapper-style2 -->

			</div>

<?php get_footer(); ?>