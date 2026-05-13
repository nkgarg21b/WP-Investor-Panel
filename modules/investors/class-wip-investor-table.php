<?php
/**
 * Investor Table Renderer.
 *
 * @package WPInvestorPanel
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once WIP_PLUGIN_PATH . 'modules/investors/class-wip-investor-service.php';

class WIP_Investor_Table {

    /**
     * Render investor table.
     *
     * @return void
     */
    public static function render() {

        $investors = WIP_Investor_Service::get_all_investors();

        ?>

        <div class="wip-card">

            <h2>All Investors</h2>

            <table class="widefat striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Investment</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if ( ! empty( $investors ) ) : ?>

                        <?php foreach ( $investors as $investor ) : ?>

                            <tr>
                                <td><?php echo esc_html( $investor['id'] ); ?></td>
                                <td><?php echo esc_html( $investor['full_name'] ); ?></td>
                                <td><?php echo esc_html( $investor['email'] ); ?></td>
                                <td><?php echo esc_html( $investor['phone'] ); ?></td>
                                <td>₹<?php echo esc_html( number_format( $investor['investment_amount'], 2 ) ); ?></td>
                                <td><?php echo esc_html( ucfirst( $investor['status'] ) ); ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>
                            <td colspan="6">No investors found.</td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

        <?php
    }
}
