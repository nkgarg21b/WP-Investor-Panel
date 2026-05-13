<?php
/**
 * Core Loader Class.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Loader {

    /**
     * Initialize plugin systems.
     *
     * @return void
     */
    public function init() {
        $this->load_dependencies();
        $this->register_hooks();
    }

    /**
     * Load required core files.
     *
     * @return void
     */
    private function load_dependencies() {
        require_once WIP_PLUGIN_PATH . 'includes/admin/class-wip-admin-menu.php';
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function register_hooks() {
        $admin_menu = new WIP_Admin_Menu();
        add_action( 'admin_menu', array( $admin_menu, 'register_menus' ) );
    }
}
