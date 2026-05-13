<?php
/**
 * Dashboard UI Renderer.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WIP_PLUGIN_PATH . 'includes/admin/class-wip-ui-components.php';

class WIP_Dashboard_UI {

    /**
     * Render admin dashboard.
     *
     * @return void
     */
    public static function render() {
        ?>
        <div class="wrap wip-dashboard-wrapper">

            <h1 class="wip-page-title">WP Investor Panel Dashboard</h1>

            <div class="wip-kpi-grid">

                <?php
                WIP_UI_Components::render_kpi_card( 'Total Investment', '₹0' );
                WIP_UI_Components::render_kpi_card( 'Production Today', '0 KG' );
                WIP_UI_Components::render_kpi_card( 'Monthly Revenue', '₹0' );
                WIP_UI_Components::render_kpi_card( 'Active Investors', '0' );
                ?>

            </div>

            <div class="wip-section-grid">

                <?php
                WIP_UI_Components::render_section_card(
                    'Revenue & Production Analytics',
                    'Chart system will be initialized in upcoming milestones.',
                    'wip-chart-placeholder'
                );

                WIP_UI_Components::render_section_card(
                    'Activity Feed',
                    'Operational activity feed will appear here.',
                    'wip-feed-placeholder'
                );
                ?>

            </div>

        </div>
        <?php
    }
}
