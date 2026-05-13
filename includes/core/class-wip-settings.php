<?php
/**
 * Plugin Settings Manager.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Settings {

    /**
     * Register settings.
     *
     * @return void
     */
    public static function register_settings() {

        register_setting(
            'wip_settings_group',
            'wip_settings'
        );
    }

    /**
     * Get setting value.
     *
     * @param string $key Setting key.
     * @param mixed  $default Default value.
     *
     * @return mixed
     */
    public static function get( $key, $default = '' ) {

        $settings = get_option( 'wip_settings', array() );

        return isset( $settings[ $key ] ) ? $settings[ $key ] : $default;
    }
}
