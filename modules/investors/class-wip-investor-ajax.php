<?php
/**
 * Investor AJAX Handlers.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-service.php';

class WIP_Investor_AJAX {

    /**
     * Register AJAX hooks.
     *
     * @return void
     */
    public static function init() {

        add_action( 'wp_ajax_wip_save_investor', array( __CLASS__, 'save_investor' ) );
        add_action( 'wp_ajax_wip_delete_investor', array( __CLASS__, 'delete_investor' ) );
    }

    /**
     * Save investor.
     *
     * @return void
     */
    public static function save_investor() {

        check_ajax_referer( 'wip_investor_nonce', 'nonce' );

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array(
                'message' => 'Unauthorized access.',
            ) );
        }

        $investor_id = WIP_Investor_Service::insert_investor( $_POST );

        if ( $investor_id ) {
            wp_send_json_success( array(
                'message'     => 'Investor added successfully.',
                'investor_id' => $investor_id,
            ) );
        }

        wp_send_json_error( array(
            'message' => 'Failed to save investor.',
        ) );
    }

    /**
     * Delete investor.
     *
     * @return void
     */
    public static function delete_investor() {

        check_ajax_referer( 'wip_investor_nonce', 'nonce' );

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array(
                'message' => 'Unauthorized access.',
            ) );
        }

        $deleted = WIP_Investor_Service::delete_investor(
            absint( $_POST['investor_id'] ?? 0 )
        );

        if ( $deleted ) {
            wp_send_json_success( array(
                'message' => 'Investor deleted successfully.',
            ) );
        }

        wp_send_json_error( array(
            'message' => 'Failed to delete investor.',
        ) );
    }
}

WIP_Investor_AJAX::init();
