<?php
/*
Plugin Name: My Plugin
Plugin URI:  https://example.com
Description: A custom plugin with admin settings page.
Version:     1.0
Author:      Dharm Patel
Author URI:  https://example.com
License:     GPL2
Text Domain: myplugin
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


add_action( 'admin_menu', 'myplugin_admin_menu' );

function myplugin_admin_menu() {
    add_menu_page(
        'My Plugin Settings',   // Page title
        'My Plugin',            // Menu title
        'manage_options',       // Capability
        'myplugin',             // Menu slug
        'myplugin_settings_page', // Callback function
        'dashicons-admin-generic', // Icon
        100                     // Position
    );
}

function myplugin_settings_page() {
    // Get current options, provide default array if it doesn't exist
    $options = get_option('myplugin_options', array(
        'text_field' => '',
        'checkbox_field' => 0
    ));
    ?>
    <div class="wrap">
        <h1>My Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('myplugin_options_group'); // Security & option group
            do_settings_sections('myplugin');
            ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="text_field">Text Field</label></th>
                    <td><input type="text" id="text_field" name="myplugin_options[text_field]" value="<?php echo esc_attr($options['text_field']); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Checkbox Field</th>
                    <td><input type="checkbox" name="myplugin_options[checkbox_field]" <?php checked(1, $options['checkbox_field'], true); ?> value="1" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


add_action( 'admin_init', 'myplugin_register_settings' );

function myplugin_register_settings() {
    register_setting(
        'myplugin_options_group', // Option group
        'myplugin_options',       // Option name in DB
        'myplugin_sanitize'       // Optional sanitize callback
    );
}

// Sanitize callback
function myplugin_sanitize($input) {
    $new_input = array();
    $new_input['text_field'] = isset($input['text_field']) ? sanitize_text_field($input['text_field']) : '';
    $new_input['checkbox_field'] = isset($input['checkbox_field']) ? 1 : 0;
    return $new_input;
}


