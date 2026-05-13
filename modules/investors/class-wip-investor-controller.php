<?php
/**
 * Investor Controller.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-service.php';
require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-form.php';
require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-table.php';

class WIP_Investor_Controller {

    /**
     * Render investor management page.
     *
     * @return void
     */
    public static function render_page() {

        self::handle_form_submission();

        ?>

        <div class="wrap wip-dashboard-wrapper">

            <h1 class="wip-page-title">Investor Management</h1>

            <?php
            WIP_Investor_Form::render();
            WIP_Investor_Table::render();
            ?>

        </div>

        <?php
    }

    /**
     * Handle form submission.
     *
     * @return void
     */
    private static function handle_form_submission() {

        if ( empty( $_POST['full_name'] ) ) {
            return;
        }

        WIP_Investor_Service::insert_investor( $_POST );
    }
}
