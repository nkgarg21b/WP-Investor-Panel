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

        $table_name = $wpdb->prefix . 'wip_investors';

        $sql = "CREATE TABLE {$table_name} (
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

        dbDelta( $sql );

        update_option( 'wip_db_version', WIP_VERSION );
    }
}
