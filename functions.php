<?php
/**
 * WP-ZeroFour functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

/**
 * Register three WP-ZeroFour widget areas.
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'wpzerofour' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the left footer section of the site.', 'wpzerofour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'wpzerofour' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the middle footer section of the site.', 'wpzerofour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'wpzerofour' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the right footer section of the site.', 'wpzerofour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp04_widgets_init' );
?>