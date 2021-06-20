<?php

/**
 * Plugin Name: Bit Form
 * Plugin URI:  bitpress.pro
 * Description:  Wordpress form builder plugin
 * Version:     1.4.7
 * Author:      BitPress
 * Author URI:  https://www.bitpress.pro
 * Text Domain: bitform
 * Domain Path: /languages
 * License: GPLv2 or later
 */

/***
 * If try to direct access  plugin folder it will Exit
 **/
if (!defined('ABSPATH')) {
    exit;
}


// Define most essential constants.
define('BITFORMS_VERSION', '1.4.7');
define('BITFORMS_PLUGIN_MAIN_FILE', __FILE__);

global $bitforms_db_version;
$bitforms_db_version = '1.2';


if (version_compare(PHP_VERSION, '5.6.0', '>=')) {
    require_once plugin_dir_path(__FILE__) . 'includes/loader.php';
}
/**
 * Handles plugin activation.
 *
 * Throws an error if the plugin is activated on an older version than PHP 5.6.
 */
function bitforms_activate_plugin($network_wide)
{
    if (version_compare(PHP_VERSION, '5.6.0', '<')) {
        wp_die(
            esc_html__('bitforms requires PHP version 5.6.', 'bitform'),
            esc_html__('Error Activating', 'bitform')
        );
    }

    do_action('bitforms_activation', $network_wide);
}

register_activation_hook(__FILE__, 'bitforms_activate_plugin');

/**
 * Handles plugin deactivation.
 */
function bitforms_deactivate_plugin($network_wide)
{
    if (version_compare(PHP_VERSION, '5.6.0', '<')) {
        return;
    }

    do_action('bitforms_deactivation', $network_wide);
}

register_deactivation_hook(__FILE__, 'bitforms_deactivate_plugin');

/**
 * Handles plugin uninstall.
 *
 * @access private
 */
function bitforms_uninstall_plugin()
{
    if (version_compare(PHP_VERSION, '5.6.0', '<')) {
        return;
    }

    do_action('bitforms_uninstall');
}
register_uninstall_hook(__FILE__, 'bitforms_uninstall_plugin');
