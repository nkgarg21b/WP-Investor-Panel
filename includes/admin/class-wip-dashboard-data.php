<?php
/**
 * Dashboard Data Service.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Dashboard_Data {

    /**
     * Get dashboard KPI statistics.
     *
     * @return array
     */
    public static function get_dashboard_stats() {
        global $wpdb;

        $investor_table = $wpdb->prefix . 'wip_investors';

        $total_investment = $wpdb->get_var(
            "SELECT SUM(investment_amount) FROM {$investor_table}"
        );

        $active_investors = $wpdb->get_var(
            "SELECT COUNT(*) FROM {$investor_table} WHERE status = 'active'"
        );

        return array(
            'total_investment' => $total_investment ? $total_investment : 0,
            'production_today' => 0,
            'monthly_revenue'  => 0,
            'active_investors' => $active_investors ? $active_investors : 0,
        );
    }
}
