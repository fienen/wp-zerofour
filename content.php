<?php
/**
 * The template used for displaying post content
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="major">
		<h2><?php the_title(); ?></h2>
		<span class="byline"><?php _e( 'Posted by', 'wpzerofour' ); ?> <?php echo get_the_author_link(); ?> on <?php the_date(); if( has_category() ) : _e( 'in ', 'wpzerofour' ); get_the_category_list( ', ' ); endif; ?></span>
	</header>  <!-- .major -->

	<div class="entry-content">
		<div class="featured-image">
			<span class="image image-full">
<?php
	if ( has_post_thumbnail() ) :
		the_post_thumbnail( 'page-banner' );
	endif;
?>
			</span>
		</div>  <!-- .featured-image -->
<?php
the_content();

if( has_tag() ):
?>
		<div class="post-meta">
<?php the_tags( 'Tagged with: ' ); ?>
		</div>  <!-- .post-meta -->
<?php
endif;

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