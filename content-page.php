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
<?php
$subheading = get_post_meta( get_the_ID(), '_subheading', true );
if( !empty( $subheading ) ) :
?>
		<span class="byline"><?php echo $subheading; ?></span>
<?php endif; ?>
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