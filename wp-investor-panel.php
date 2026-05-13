<?php
/**
 * Plugin Name: WP Investor Panel
 * Plugin URI: https://github.com/nkgarg21b/WP-Investor-Panel
 * Description: Enterprise-grade investor management and farm transparency platform.
 * Version: 1.0.0
 * Author: Nikhil Garg
 * Text Domain: wp-investor-panel
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Plugin constants.
define( 'WIP_VERSION', '1.0.0' );
define( 'WIP_PLUGIN_FILE', __FILE__ );
define( 'WIP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WIP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once WIP_PLUGIN_PATH . 'includes/core/class-wip-loader.php';
require_once WIP_PLUGIN_PATH . 'includes/core/class-wip-roles.php';
require_once WIP_PLUGIN_PATH . 'includes/database/class-wip-db-installer.php';

/**
 * Plugin activation hook.
 *
 * @return void
 */
function wip_activate_plugin() {
    WIP_Roles::register_roles();
    WIP_DB_Installer::install();
}

register_activation_hook( __FILE__, 'wip_activate_plugin' );

/**
 * Initialize plugin.
 *
 * @return void
 */
function wip_initialize_plugin() {
    $loader = new WIP_Loader();
    $loader->init();
}

add_action( 'plugins_loaded', 'wip_initialize_plugin' );
