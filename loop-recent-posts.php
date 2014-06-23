<?php
/**
 * The template used for showing 4 recent blog posts in the template section after the main content and on the homepage.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

// Set up and pull the main post to feature. Looped later, as it's shown second, but we need to know the ID to exclude it in the next loop
$args1 = array(
	'posts_per_page'      => 1,
	'post__in'            => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);
$spotlight_query = new WP_Query( $args1 );
$spotlight_query->the_post();
$spotlight_id    = get_the_ID();

// Get the rest of our posts for display
$args2 = array(
	'posts_per_page' => 3,
	'post__not_in'   => array($spotlight_id)
);
$recent_query = new WP_Query( $args2 ); 
?>

<div class="main-wrapper-style3">
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="8u">
					<section class="box-article-list">
						<h2 class="fa fa-file-text-o"><?php _e( 'From the blog '.$spotlight_id, 'wpzerofour' ); ?></h2>
<?php 
if ( $recent_query->have_posts() ) :
	while ( $recent_query->have_posts() ) :
		$recent_query->the_post();
?>
						<article id="post-<?php the_ID(); ?>" class="box-excerpt">
							<a href="<?php the_permalink(); ?>" class="image image-left">
<?php
if ( has_post_thumbnail() ) :
	the_post_thumbnail( 'blog-thumb' );
endif;
?>
							</a>
							<div>
								<header>
									<span class="date"><?php the_date(); ?></span>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</header>
								<?php the_excerpt(); ?>
							</div>
						</article>  <!-- #post-<?php the_ID(); ?>.box-excerpt -->


<?php 
	endwhile;
	wp_reset_postdata();
else : 
?>
						<article class="box-excerpt">
							<div><?php _e( 'No posts yet...', 'wpzerofour' ); ?></div>
						</article>  <!-- #post-<?php the_ID(); ?>.box-excerpt -->
<?php
endif; 
?>
					</section>  <!-- .box-article-list -->
				</div>  <!-- .8u -->
				
				<div class="4u">
					<section class="box-spotlight">
<?php 
$featured_post = get_post( $spotlight_id );
if ( isset( $featured_post ) ) :
	setup_postdata( $featured_post );
	// Change the string key used based on if the featured post is sticky or not
	$featuredString = ( is_sticky($spotlight_id) ? 'Spotlight' : 'Latest Post' );
?>
						<h2 class="fa fa-file-text-o"><?php _e( $featuredString, 'wpzerofour' ); ?></h2>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>" class="image image-full">
<?php
	if ( has_post_thumbnail() ) :
		the_post_thumbnail( 'featured-thumb' );
	endif;
?>
							</a>
							<header>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<span class="byline">by <?php echo get_the_author_link(); ?></span>
							</header>
							<?php the_excerpt(); ?>
							<footer>
								<a href="<?php the_permalink(); ?>" class="button alt fa fa-file-o"><?php _e( 'Continue Reading', 'wpzerofour' ); ?></a>
							</footer>
						</article>  <!-- #post-<?php the_ID(); ?> -->
<?php 
	wp_reset_postdata();
endif; 
?>
					</section>  <!-- .box-spotlight -->
				</div>  <!-- .4u -->
			</div>  <!-- .row -->
		</div>  <!-- .container -->
	</div>  <!-- .inner -->
</div>  <!-- #main-wrapper-style3 -->