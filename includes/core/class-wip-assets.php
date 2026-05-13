<?php
/**
 * Asset Loader Class.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Assets {

    /**
     * Register hooks.
     *
     * @return void
     */
    public function init() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
    }

    /**
     * Enqueue admin assets.
     *
     * @return void
     */
    public function enqueue_admin_assets() {

        wp_enqueue_style(
            'wip-admin-style',
            WIP_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            WIP_VERSION
        );

        wp_enqueue_script(
            'wip-admin-script',
            WIP_PLUGIN_URL . 'assets/js/admin.js',
            array( 'jquery' ),
            WIP_VERSION,
            true
        );
    }
}
