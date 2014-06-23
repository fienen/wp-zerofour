<?php
/**
 * WP-ZeroFour Custom Field Support
 *
 * Set up the various supporting custom fields for pages and posts that the theme uses
 * for various display options.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

/**
 * Register meta box for pages
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_add_meta_box() {
    $screens = array( 'page' );

    foreach ( $screens as $screen ) {
        add_meta_box(
            'wp04_settings',
            __( 'WP-ZeroFour Options', 'wpzerofour' ),
            'wp04_meta_box_callback',
            $screen,
            'side'
        );
    }
}
add_action( 'add_meta_boxes', 'wp04_add_meta_box' );

/**
 * Print out the meta panel
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_meta_box_callback( $post ) {
    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'wp04_meta_box', 'wp04_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $buttonLabel = get_post_meta( $post->ID, '_home_button_label', true );
    $buttonIcon  = get_post_meta( $post->ID, '_home_button_icon' , true );
    $buttonType  = get_post_meta( $post->ID, '_home_button_type' , true );
    $buttonShow  = get_post_meta( $post->ID, '_home_button_show' , true );
    $subheading  = get_post_meta( $post->ID, '_subheading' , true );
?>
    <p><strong><?php echo _e( 'Page Subheading', 'wpzerofour' ); ?></strong></p>
    <p><label class="screen-reader-text" for="subheading"><?php echo _e( 'Page Subheading', 'wpzerofour' ); ?></label>
    <input type="text" id="subheading" name="subheading" value="<?php echo esc_attr( $subheading ); ?>" size="25" /></p>
    <p><input type="checkbox" id="home_button_show" name="home_button_show" value="true" size="25"<?php if( $buttonShow == 'true' ) : ?> checked<?php endif; ?> /> <label for="home_button_show"><?php echo _e( 'Show on Homepage', 'wpzerofour' ); ?></label></p>
    <p><strong><?php echo _e( 'Button Label', 'wpzerofour' ); ?></strong></p>
    <p><label class="screen-reader-text" for="home_button_label"><?php echo _e( 'Button Label', 'wpzerofour' ); ?></label>
    <input type="text" id="home_button_label" name="home_button_label" value="<?php echo esc_attr( $buttonLabel ); ?>" size="25" /></p>
    <p><strong><?php echo _e( 'Button Icon', 'wpzerofour' ); ?></strong></p>
    <p><label class="screen-reader-text" for="home_button_icon"><?php echo _e( 'Button Icon', 'wpzerofour' ); ?></label>
        <select id="home_button_icon" name="home_button_icon">
            <option value="">-<?php echo _e( 'None', 'wpzerofour' ); ?>-</option>
            <option value="arrow"<?php if( $buttonIcon == 'arrow' ) : ?> selected<?php endif; ?>>Arrow</option>
            <option value="chart"<?php if( $buttonIcon == 'chart' ) : ?> selected<?php endif; ?>>Chart</option>
            <option value="check"<?php if( $buttonIcon == 'check' ) : ?> selected<?php endif; ?>>Checkmark</option>
            <option value="cog"<?php if( $buttonIcon == 'cog' ) : ?> selected<?php endif; ?>>Cog</option>
            <option value="file"<?php if( $buttonIcon == 'file' ) : ?> selected<?php endif; ?>>File</option>
            <option value="info"<?php if( $buttonIcon == 'info' ) : ?> selected<?php endif; ?>>Info</option>
            <option value="file-text"<?php if( $buttonIcon == 'file-text' ) : ?> selected<?php endif; ?>>Text</option>
            <option value="user"<?php if( $buttonIcon == 'user' ) : ?> selected<?php endif; ?>>User</option>
        </select>
    </p>
    <p><strong><?php echo _e( 'Button Type', 'wpzerofour' ); ?></strong></p>
    <p><label class="screen-reader-text" for="home_button_type"><?php echo _e( 'Button Type', 'wpzerofour' ); ?></label>
        <select id="home_button_type" name="home_button_type">
            <option value="primary"<?php if( $buttonType == 'primary' ) : ?> selected<?php endif; ?>>Primary</option>
            <option value="secondary"<?php if( $buttonType == 'secondary' ) : ?> selected<?php endif; ?>>Secondary</option>
        </select>
    </p>
    <p>Use these settings to display content from up to two pages on your homepage as subsections.</p>
<?php
}

/**
 * Save the data from the meta panel to custom fields
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_save_meta_box_data( $post_id ) {
    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['buttons_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['buttons_meta_box_nonce'], 'buttons_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( !isset( $_POST['home_button_label'] ) && !isset( $_POST['home_button_icon'] ) && !isset( $_POST['home_button_type'] ) ) {
        return;
    }

    // Sanitize user input.
    $home_button_label_data = sanitize_text_field( $_POST['home_button_label'] );
    $home_button_icon_data  = sanitize_text_field( $_POST['home_button_icon'] );
    $home_button_type_data  = sanitize_text_field( $_POST['home_button_type'] );
    $home_button_show_data  = sanitize_text_field( $_POST['home_button_show'] );
    $subheading_data        = sanitize_text_field( $_POST['subheading'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_home_button_label', $home_button_label_data );
    update_post_meta( $post_id, '_home_button_icon', $home_button_icon_data );
    update_post_meta( $post_id, '_home_button_type', $home_button_type_data );
    update_post_meta( $post_id, '_home_button_show', $home_button_show_data );
    update_post_meta( $post_id, '_subheading', $subheading_data );
}
add_action( 'save_post', 'wp04_save_meta_box_data' );