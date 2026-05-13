<?php
/**
 * Roles and Capabilities Class.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Roles {

    /**
     * Register plugin roles.
     *
     * @return void
     */
    public static function register_roles() {

        add_role(
            'wip_admin',
            'WIP Admin',
            array(
                'read'           => true,
                'manage_options' => true,
            )
        );

        add_role(
            'wip_manager',
            'WIP Manager',
            array(
                'read' => true,
            )
        );

        add_role(
            'wip_accountant',
            'WIP Accountant',
            array(
                'read' => true,
            )
        );

        add_role(
            'wip_investor',
            'WIP Investor',
            array(
                'read' => true,
            )
        );
    }
}
