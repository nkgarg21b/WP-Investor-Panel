<?php
/**
 * Investor Form Renderer.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WIP_Investor_Form {

    /**
     * Render investor form.
     *
     * @return void
     */
    public static function render() {
        ?>

        <div class="wip-card">

            <h2>Add Investor</h2>

            <form id="wip-investor-form">

                <?php wp_nonce_field( 'wip_investor_nonce', 'wip_nonce' ); ?>

                <table class="form-table">

                    <tr>
                        <th><label for="full_name">Full Name</label></th>
                        <td><input type="text" name="full_name" id="full_name" class="regular-text" required></td>
                    </tr>

                    <tr>
                        <th><label for="email">Email</label></th>
                        <td><input type="email" name="email" id="email" class="regular-text"></td>
                    </tr>

                    <tr>
                        <th><label for="phone">Phone</label></th>
                        <td><input type="text" name="phone" id="phone" class="regular-text"></td>
                    </tr>

                    <tr>
                        <th><label for="investment_amount">Investment Amount</label></th>
                        <td><input type="number" step="0.01" name="investment_amount" id="investment_amount" class="regular-text"></td>
                    </tr>

                    <tr>
                        <th><label for="investment_date">Investment Date</label></th>
                        <td><input type="date" name="investment_date" id="investment_date"></td>
                    </tr>

                    <tr>
                        <th><label for="status">Status</label></th>
                        <td>
                            <select name="status" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </td>
                    </tr>

                </table>

                <p>
                    <button type="submit" class="button button-primary">
                        Save Investor
                    </button>
                </p>

                <div id="wip-investor-message"></div>

            </form>

        </div>

        <?php
    }
}
