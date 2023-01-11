<?php
/**
 * Block Patterns
 *
 * @package FWPWooCheckoutVideo
 */

namespace FWPWOOCHECKOUT_THEME\Inc;

use FWPWOOCHECKOUT_THEME\Inc\Traits\Singleton;

class Core {
	use Singleton;
	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}
	protected function setup_hooks() {
		// add_action( 'get_template_part_templates/blog/header', [ $this, 'get_template_part' ], 10, 3 );
		// add_action( 'get_template_part', [ $this, 'get_template_part' ], 10, 4 );
		
		// woocommerce_checkout_before_order_review_heading | woocommerce_checkout_after_order_review
		add_action( 'woocommerce_checkout_before_order_review', [ $this, 'woocommerce_checkout_before_order_review' ], 10, 0 );
	}
	public function get_template_part( $slug, $name = null, $templates = '', $args = [] ) {
		// print_r( [ $slug, $name, $templates, $args ] );wp_die( 'hi' );
	}
	/**
	 * Woocommerce Checkpout screen visual hooks
	 * https://www.businessbloomer.com/woocommerce-visual-hook-guide-checkout-page/
	 * 
	 * @return void
	 */
	public function woocommerce_checkout_before_order_review() {
		?>
		<div class="col-inner has-border">
			<div class="checkout-sidebar sm-touch-scroll">
				<h3><?php esc_html_e( 'Record a short clip.', 'domain' ); ?></h3>
			</div>
		</div>
		<?php
	}
}
