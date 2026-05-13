<?php
/**
 * Admin Menu Class.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WIP_PLUGIN_PATH . 'includes/admin/class-wip-dashboard-ui.php';
require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-controller.php';

class WIP_Admin_Menu {

    /**
     * Register admin menus.
     *
     * @return void
     */
    public function register_menus() {

        add_menu_page(
            'WP Investor Panel',
            'WP Investor Panel',
            'manage_options',
            'wip-dashboard',
            array( $this, 'render_dashboard_page' ),
            'dashicons-chart-pie',
            25
        );

        add_submenu_page(
            'wip-dashboard',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'wip-dashboard',
            array( $this, 'render_dashboard_page' )
        );

        add_submenu_page(
            'wip-dashboard',
            'Investors',
            'Investors',
            'manage_options',
            'wip-investors',
            array( 'WIP_Investor_Controller', 'render_page' )
        );

        $menus = array(
            'Production'         => 'wip-production',
            'Sales'              => 'wip-sales',
            'Expenses'           => 'wip-expenses',
            'Payouts'            => 'wip-payouts',
            'Reports'            => 'wip-reports',
            'Transparency Feed'  => 'wip-transparency-feed',
            'Documents'          => 'wip-documents',
            'Notifications'      => 'wip-notifications',
            'Settings'           => 'wip-settings',
        );

        foreach ( $menus as $title => $slug ) {
            add_submenu_page(
                'wip-dashboard',
                $title,
                $title,
                'manage_options',
                $slug,
                array( $this, 'render_placeholder_page' )
            );
        }
    }

    /**
     * Render dashboard page.
     *
     * @return void
     */
    public function render_dashboard_page() {
        WIP_Dashboard_UI::render();
    }

    /**
     * Render placeholder pages.
     *
     * @return void
     */
    public function render_placeholder_page() {
        echo '<div class="wrap"><h1>Module Coming Soon</h1></div>';
    }
}
