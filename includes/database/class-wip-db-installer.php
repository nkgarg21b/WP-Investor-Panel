<?php
/**
 * Database Installer Class.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_DB_Installer {

    /**
     * Install plugin database tables.
     *
     * @return void
     */
    public static function install() {
        global $wpdb;

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $charset_collate = $wpdb->get_charset_collate();

        $investors_table = $wpdb->prefix . 'wip_investors';
        $production_table = $wpdb->prefix . 'wip_production_logs';
        $sales_table = $wpdb->prefix . 'wip_sales';
        $expenses_table = $wpdb->prefix . 'wip_expenses';
        $payouts_table = $wpdb->prefix . 'wip_payouts';

        $sql_investors = "CREATE TABLE {$investors_table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id BIGINT UNSIGNED DEFAULT NULL,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            investment_amount DECIMAL(15,2) DEFAULT 0,
            investment_date DATE DEFAULT NULL,
            status VARCHAR(50) DEFAULT 'active',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        $sql_production = "CREATE TABLE {$production_table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            production_date DATE NOT NULL,
            room_name VARCHAR(255) DEFAULT NULL,
            harvest_kg DECIMAL(10,2) DEFAULT 0,
            waste_kg DECIMAL(10,2) DEFAULT 0,
            notes TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        $sql_sales = "CREATE TABLE {$sales_table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            sale_date DATE NOT NULL,
            customer_name VARCHAR(255) DEFAULT NULL,
            quantity_kg DECIMAL(10,2) DEFAULT 0,
            rate_per_kg DECIMAL(10,2) DEFAULT 0,
            total_amount DECIMAL(15,2) DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        $sql_expenses = "CREATE TABLE {$expenses_table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            expense_date DATE NOT NULL,
            category VARCHAR(255) DEFAULT NULL,
            amount DECIMAL(15,2) DEFAULT 0,
            notes TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        $sql_payouts = "CREATE TABLE {$payouts_table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            investor_id BIGINT UNSIGNED NOT NULL,
            payout_amount DECIMAL(15,2) DEFAULT 0,
            payout_date DATE DEFAULT NULL,
            status VARCHAR(50) DEFAULT 'pending',
            transaction_reference VARCHAR(255) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$charset_collate};";

        dbDelta( $sql_investors );
        dbDelta( $sql_production );
        dbDelta( $sql_sales );
        dbDelta( $sql_expenses );
        dbDelta( $sql_payouts );

        update_option( 'wip_db_version', WIP_VERSION );
    }
}
