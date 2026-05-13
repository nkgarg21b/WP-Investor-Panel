<?php
/**
 * Dashboard UI Renderer.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

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

                <div class="wip-card">
                    <div class="wip-card-title">Total Investment</div>
                    <div class="wip-card-value">₹0</div>
                </div>

                <div class="wip-card">
                    <div class="wip-card-title">Production Today</div>
                    <div class="wip-card-value">0 KG</div>
                </div>

                <div class="wip-card">
                    <div class="wip-card-title">Monthly Revenue</div>
                    <div class="wip-card-value">₹0</div>
                </div>

                <div class="wip-card">
                    <div class="wip-card-title">Active Investors</div>
                    <div class="wip-card-value">0</div>
                </div>

            </div>

            <div class="wip-section-grid">

                <div class="wip-card wip-chart-placeholder">
                    <h2>Revenue & Production Analytics</h2>
                    <p class="wip-placeholder-text">Chart system will be initialized in upcoming milestones.</p>
                </div>

                <div class="wip-card wip-feed-placeholder">
                    <h2>Activity Feed</h2>
                    <p class="wip-placeholder-text">Operational activity feed will appear here.</p>
                </div>

            </div>

        </div>
        <?php
    }
}
