<?php
/**
 * Investor Service Layer.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Investor_Service {

    /**
     * Get all investors.
     *
     * @return array
     */
    public static function get_all_investors() {
        global $wpdb;

        $table = $wpdb->prefix . 'wip_investors';

        return $wpdb->get_results(
            "SELECT * FROM {$table} ORDER BY created_at DESC",
            ARRAY_A
        );
    }

    /**
     * Insert investor.
     *
     * @param array $data Investor data.
     *
     * @return bool|int
     */
    public static function insert_investor( $data ) {
        global $wpdb;

        $table = $wpdb->prefix . 'wip_investors';

        $inserted = $wpdb->insert(
            $table,
            array(
                'full_name'        => sanitize_text_field( $data['full_name'] ?? '' ),
                'email'            => sanitize_email( $data['email'] ?? '' ),
                'phone'            => sanitize_text_field( $data['phone'] ?? '' ),
                'investment_amount'=> floatval( $data['investment_amount'] ?? 0 ),
                'investment_date'  => sanitize_text_field( $data['investment_date'] ?? '' ),
                'status'           => sanitize_text_field( $data['status'] ?? 'active' ),
            )
        );

        return $inserted ? $wpdb->insert_id : false;
    }

    /**
     * Delete investor.
     *
     * @param int $id Investor ID.
     *
     * @return bool
     */
    public static function delete_investor( $id ) {
        global $wpdb;

        $table = $wpdb->prefix . 'wip_investors';

        return (bool) $wpdb->delete(
            $table,
            array( 'id' => absint( $id ) )
        );
    }
}
