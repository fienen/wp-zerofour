<?php

add_action( 'admin_init', 'wp04_theme_options_init' );
add_action( 'admin_menu', 'wp04_theme_options_add_page' );

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
 * Create arrays for our select and radio options
 */
$select_options = array(
	'0' => array(
		'value' =>	'0',
		'label' => __( 'Zero', 'sampletheme' )
	),
	'1' => array(
		'value' =>	'1',
		'label' => __( 'One', 'sampletheme' )
	),
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'sampletheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'sampletheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'sampletheme' )
	),
	'5' => array(
		'value' => '3',
		'label' => __( 'Five', 'sampletheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'sampletheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'sampletheme' )
	),
	'maybe' => array(
		'value' => 'maybe',
		'label' => __( 'Maybe', 'sampletheme' )
	)
);

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

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'wp04_options' ); ?>
			<?php $options = get_option( 'wp04_theme_options' ); ?>

			<h3 class="title">Analytics and Tracking</h3>

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

			<h3 class="title">Contact Information</h3>

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