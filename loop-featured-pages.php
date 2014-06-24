<?php
/**
 * The template used for showing 2 featured subsections based on page content on the homepage.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

$args1 = array(
	'meta_key'    => '_home_button_show',
	'meta_value'  => 'true',
	'numberposts' => 2,
	'post_type'   => 'page'
);
$featured_pages = get_posts( $args ) );
?>

<div class="main-wrapper-style2">
	<div class="inner">
		<section class="container box-feature2">
			<div class="row">
<?php 
foreach( $featured_pages as $section ) :
	setup_postdata( $section );
	$button_label = get_post_meta( get_the_ID(), '_home_button_label', true ) ?: __( 'Learn More', 'wpzerofour' );
    $button_icon  = get_post_meta( get_the_ID(), '_home_button_icon' , true );
    $button_type  = get_post_meta( get_the_ID(), '_home_button_type' , true );
    $subheading   = get_post_meta( get_the_ID(), '_subheading' , true );
	
	if( !empty( $button_icon ) ) :
		$button_class = ' fa fa-' . $button_icon . '-circle';
	endif;
	if( !empty( $button_type ) && $button_type == 'secondary' ) :
		$button_class = ' alt'. $button_class;
	endif;
?>
				<div class="6u">
					<section>
						<header class="major">
							<h2><?php the_title(); ?></h2>
<?php if( !empty( $subheading ) ) : ?>
							<span class="byline"><?php echo $subheading; ?></span>
<?php endif; ?>
						</header>  <!-- .major -->
						<p><?php the_excerpt(); ?></p>
						<footer>
							<a href="<?php the_permalink(); ?>" class="button medium<?php echo $button_class; ?>"><?php echo $button_label; ?></a>
						</footer>
					</section>
				</div>  <!-- .6u -->
<?php
endforeach;
wp_reset_postdata();
?>				
			</div>  <!-- .row -->
		</section>  <!-- .container.box-featured2 -->
	</div>  <!-- .inner -->
</div>  <!-- .main-wrapper-style2 -->