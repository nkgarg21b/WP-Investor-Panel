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
require_once WIP_PLUGIN_PATH . 'includes/admin/class-wip-dashboard-data.php';

class WIP_Dashboard_UI {

    /**
     * Render admin dashboard.
     *
     * @return void
     */
    public static function render() {

        $stats = WIP_Dashboard_Data::get_dashboard_stats();

        ?>
        <div class="wrap wip-dashboard-wrapper">

            <div class="wip-topbar">
                <h1 class="wip-page-title">WP Investor Panel Dashboard</h1>

                <div class="wip-topbar-actions">
                    <button class="button button-primary">Add Investor</button>
                    <button class="button">Add Production</button>
                </div>
            </div>

            <div class="wip-kpi-grid">

                <?php
                WIP_UI_Components::render_kpi_card(
                    'Total Investment',
                    '₹' . number_format( $stats['total_investment'], 2 )
                );

                WIP_UI_Components::render_kpi_card(
                    'Production Today',
                    $stats['production_today'] . ' KG'
                );

                WIP_UI_Components::render_kpi_card(
                    'Monthly Revenue',
                    '₹' . number_format( $stats['monthly_revenue'], 2 )
                );

                WIP_UI_Components::render_kpi_card(
                    'Active Investors',
                    $stats['active_investors']
                );
                ?>

            </div>

            <div class="wip-section-grid">

                <?php
                WIP_UI_Components::render_section_card(
                    'Revenue & Production Analytics',
                    'Dynamic analytics engine will be connected in upcoming milestones.',
                    'wip-chart-placeholder'
                );

                WIP_UI_Components::render_section_card(
                    'Activity Feed',
                    'Operational activity feed and notifications will appear here.',
                    'wip-feed-placeholder'
                );
                ?>

            </div>

        </div>
        <?php
    }
}
