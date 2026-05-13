<?php
/**
 * Reusable UI Components.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_UI_Components {

    /**
     * Render KPI card.
     *
     * @param string $title Card title.
     * @param string $value Card value.
     *
     * @return void
     */
    public static function render_kpi_card( $title, $value ) {
        ?>
        <div class="wip-card">
            <div class="wip-card-title"><?php echo esc_html( $title ); ?></div>
            <div class="wip-card-value"><?php echo esc_html( $value ); ?></div>
        </div>
        <?php
    }

    /**
     * Render section card.
     *
     * @param string $title Section title.
     * @param string $content Section content.
     * @param string $class Additional class.
     *
     * @return void
     */
    public static function render_section_card( $title, $content, $class = '' ) {
        ?>
        <div class="wip-card <?php echo esc_attr( $class ); ?>">
            <h2><?php echo esc_html( $title ); ?></h2>
            <div class="wip-placeholder-text"><?php echo wp_kses_post( $content ); ?></div>
        </div>
        <?php
    }
}
