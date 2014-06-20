<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="major">
		<h2><?php the_title(); ?></h2>
		<span class="byline"></span>
	</header>  <!-- .major -->

	<div class="entry-content">
		<div class="featured-image">
			<span class="image image-full"><img src="/zerofour/wp-content/themes/wp-zerofour/images/stock/pic08.jpg" alt="" /></span>
		</div>  <!-- .featured-image -->

		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wpzerofour' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'wpzerofour' ), '<span class="edit-link">', '</span>' );
		?>
	</div>  <!-- .entry-content -->
</article>  <!-- #post-post-<?php the_ID(); ?> -->