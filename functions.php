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
		'name'          => __( 'Sidebar', 'wpzerofour' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the left or right sidebar section of the site.', 'wpzerofour' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header class="major"><h2 class="widget-title">',
		'after_title'   => '</h2></header>',
	) );
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

/**
 * Register navigation menus.
 *
 * @since WP-ZeroFour 1.0
 */
register_nav_menu( 'Top Nav', 'Primary navigation along the top of the template' );

/**
 * Add a theme settings page.
 *
 * @since WP-ZeroFour 1.0
 */
require_once ( get_stylesheet_directory() . '/theme-options.php' );
/*
function wp04_settings_page() {
	// Check that the user is allowed to update options
	if (!current_user_can('manage_options')) :
		wp_die('You do not have sufficient permissions to access this page.');
	else : ?>
<div id="theme-options-wrap">
	<div class="icon32" id="icon-tools"> <br /> </div>
	<h2>WP-ZeroFour Theme Settings</h2>
	<form action="options.php" method="post" enctype="multipart/form-data">
<?php settings_fields('wp04_theme_options'); ?>
<?php do_settings_sections(__FILE__); ?>
		<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
</div>
<?php endif;
}

function wp04_register_build_fields() {
	register_setting( 'wp04_theme_options', 'wp04_theme_options', 'validate_setting'); 
	add_settings_section('global_settings', 'Global Settings', 'section_global', __FILE__);
	function section_global() {}
	add_settings_field('gaID', 'Google Analytics Profile ID', 'gaID_setting', __FILE__, 'section_global');
} 
add_action( 'admin_init', 'wp04_register_build_fields' );

function validate_setting($theme_options) {
	return $theme_options;
}

function gaID_setting() {
	$options = get_option('wp04_theme_options');  
	echo "<input name='theme_options[gaID_setting]' type='text' value='{$options['gaID_setting']}' />";
}

function wp04_settings_add_page() {
	add_theme_page( 'WP-ZeroFour Settings', 'WP-ZeroFour Settings', 'manage_options', 'wp-zerofour-settings', 'wp04_settings_page' );
}
add_action('admin_menu', 'wp04_settings_add_page');
*/