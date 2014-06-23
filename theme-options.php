<?php

add_action( 'admin_init', 'wp04_theme_options_init' );
add_action( 'admin_menu', 'wp04_theme_options_add_page' );

/**
 * Prep the necessary scripts for image uploads.
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_options_enqueue_scripts() {
	if ( 'appearance_page_wp04_theme_options' == get_current_screen() -> id ) :
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
	endif;
}
add_action( 'admin_enqueue_scripts', 'wp04_options_enqueue_scripts' );


/**
 * Init plugin options to white list our options
 */
function wp04_theme_options_init(){
	register_setting( 'wp04_options', 'wp04_theme_options', 'wp04_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function wp04_theme_options_add_page() {
	add_theme_page( 'WP-ZeroFour Options', 'WP-ZeroFour Options', 'manage_options', 'wp04_theme_options', 'wp04_theme_options_do_page' );
}

/**
 * Create tab navigation for settings
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_admin_tabs( $current = 'general' ) {
	$tabs = array( 'general' => 'General',  'homepage' => 'Home Settings', 'media' => 'Media Section', 'contact' => 'Contact' );
	echo '<div id="icon-themes" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=wp04_theme_options&tab=$tab'>$name</a>";
	}
	echo '</h2>';
}

/**
 * Create the options page
 */
function wp04_theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . __( 'WP-ZeroFour Theme Settings', 'wpzerofour' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'wpzerofour' ); ?></strong></p></div>
		<?php endif; ?>

		<?php if ( isset ( $_GET['tab'] ) ) wp04_admin_tabs($_GET['tab']); else wp04_admin_tabs('general'); ?>

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'wp04_options' ); ?>
			<?php $options = get_option( 'wp04_theme_options' ); ?>
	<?php 
	if ( isset ( $_GET['tab'] ) ) 
		$tab = $_GET['tab']; 
	else 
		$tab = 'general'; 

	switch ( $tab ) :
		case 'general' :
	?>
			<h3 class="title"><?php _e( 'Layout Options', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[header_img]"><?php _e( 'Header Background Image', 'wpzerofour' ); ?></label></td>
						<td>
							<input id="wp04_theme_options[header_img]" class="regular-text" type="text" name="wp04_theme_options[header_img]" value="<?php echo esc_url( $options['header_img'] ); ?>" /> 
							<input id="upload_header_img_button" type="button" class="button" value="<?php _e( 'Upload Image', 'wpzerofour' ); ?>" />
							<span class="description"><?php _e('Ideal size is 1400x651.', 'wpzerofour' ); ?></span>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title"><?php _e( 'Analytics and Tracking', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[gaID]"><?php _e( 'Google Analytics Profile ID', 'wpzerofour' ); ?></label></td>
						<td><input id="wp04_theme_options[gaID]" class="regular-text" type="text" name="wp04_theme_options[gaID]" value="<?php esc_attr_e( $options['gaID'] ); ?>" placeholder="e.g. UA-12345678-1" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[tracking]"><?php _e( 'Other Tracking Code', 'wpzerofour' ); ?></label></th>
						<td><textarea id="wp04_theme_options[tracking]" class="large-text" cols="30" rows="8" name="wp04_theme_options[tracking]"><?php echo esc_textarea( $options['tracking'] ); ?></textarea></td>
					</tr>
				</tbody>
			</table>

			<script>
			jQuery(document).ready(function($) {
				$('#upload_header_img_button').click(function() {
					tb_show('Upload a header image', 'media-upload.php?TB_iframe=true', false);

					window.send_to_editor = function(html) {
						var image_url = $('img',html).attr('src');
						$('#upload_header_img_button').prev('input').val(image_url);
						tb_remove();
					}

					return false;
				});
			});
			</script>
		<?php 
			break; 
		case 'homepage' : 
		?>

		<?php 
			break; 
		case 'media' : 
		?>

		<?php 
			break; 
		case 'contact' : 
		?>
			<h3 class="title">Contact Information</h3>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[email]"><?php _e( 'Email', 'wpzerofour' ); ?></label></td>
						<td><input id="wp04_theme_options[email]" class="regular-text" type="text" name="wp04_theme_options[email]" value="<?php esc_attr_e( $options['email'] ); ?>" placeholder="email address" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[phone]"><?php _e( 'Phone', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[phone]" class="regular-text" type="text" name="wp04_theme_options[phone]" value="<?php echo esc_textarea( $options['phone'] ); ?>" placeholder="phone number" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[address]"><?php _e( 'Address', 'wpzerofour' ); ?></label></td>
						<td><textarea id="wp04_theme_options[address]" class="large-text" cols="30" rows="8" name="wp04_theme_options[address]"><?php esc_attr_e( $options['address'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-1-label]"><?php _e( 'Social Link 1', 'wpzerofour' ); ?></label></td>
						<td>
							<input id="wp04_theme_options[social-link-1-label]" class="regular-text" type="text" name="wp04_theme_options[social-link-1-label]" value="<?php esc_attr_e( $options['social-link-1-label'] ); ?>" placeholder="<?php _e( 'link name', 'wpzerofour' ); ?>" /> 
							<input id="wp04_theme_options[social-link-1-href]" class="regular-text" type="text" name="wp04_theme_options[social-link-1-href]" value="<?php esc_attr_e( $options['social-link-1-href'] ); ?>" placeholder="<?php _e( 'link url', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-2-label]"><?php _e( 'Social Link 2', 'wpzerofour' ); ?></label></td>
						<td>
							<input id="wp04_theme_options[social-link-2-label]" class="regular-text" type="text" name="wp04_theme_options[social-link-2-label]" value="<?php esc_attr_e( $options['social-link-3-label'] ); ?>" placeholder="<?php _e( 'link name', 'wpzerofour' ); ?>" /> 
							<input id="wp04_theme_options[social-link-2-href]" class="regular-text" type="text" name="wp04_theme_options[social-link-2-href]" value="<?php esc_attr_e( $options['social-link-2-href'] ); ?>" placeholder="<?php _e( 'link url', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-1-label]"><?php _e( 'Social Link 3', 'wpzerofour' ); ?></label></td>
						<td>
							<input id="wp04_theme_options[social-link-3-label]" class="regular-text" type="text" name="wp04_theme_options[social-link-3-label]" value="<?php esc_attr_e( $options['social-link-3-label'] ); ?>" placeholder="<?php _e( 'link name', 'wpzerofour' ); ?>" /> 
							<input id="wp04_theme_options[social-link-3-href]" class="regular-text" type="text" name="wp04_theme_options[social-link-3-href]" value="<?php esc_attr_e( $options['social-link-3-href'] ); ?>" placeholder="<?php _e( 'link url', 'wpzerofour' ); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
	<?php 
			break; 
	endswitch; 
	?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wpzerofour' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function wp04_theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/