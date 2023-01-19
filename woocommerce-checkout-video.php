<?php
/**
 * This plugin ordered by a client and done by Remal Mahmud (fiverr.com/mahmud_remal). Authority dedicated to that cient.
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Checkout Video
 * Plugin URI:        https://github.com/mahmudremal/woocommerce-checkout-video-snippet/
 * Description:       Woocommerce endline order video integration plugin made with love by Remal Mahmud.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Remal Mahmud
 * Author URI:        https://github.com/mahmudremal/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woocommerce-checkout-video-snippet
 * Domain Path:       /languages
 * 
 * @package FWPWooCheckoutVideo
 * @author  Remal Mahmud (https://github.com/mahmudremal)
 * @version 1.0.1
 * @link https://github.com/mahmudremal/woocommerce-checkout-video-snippet/
 * @category	WooComerce Plugin
 * @copyright	Copyright (c) 2023-25
 * 
 * payment custom link https://mysite.com/checkout/payment/39230/?pay_for_order=true&key=wc_order_UWdhxxxYYYzzz or get link $order->get_checkout_payment_url();
 */

/**
 * Bootstrap the plugin.
 */



defined( 'FWPWOOCHECKOUT_PROJECT__FILE__' ) || define( 'FWPWOOCHECKOUT_PROJECT__FILE__', untrailingslashit( __FILE__ ) );
defined( 'FWPWOOCHECKOUT_DIR_PATH' ) || define( 'FWPWOOCHECKOUT_DIR_PATH', untrailingslashit( plugin_dir_path( FWPWOOCHECKOUT_PROJECT__FILE__ ) ) );
defined( 'FWPWOOCHECKOUT_DIR_URI' ) || define( 'FWPWOOCHECKOUT_DIR_URI', untrailingslashit( plugin_dir_url( FWPWOOCHECKOUT_PROJECT__FILE__ ) ) );
defined( 'FWPWOOCHECKOUT_BUILD_URI' ) || define( 'FWPWOOCHECKOUT_BUILD_URI', untrailingslashit( FWPWOOCHECKOUT_DIR_URI ) . '/assets/build' );
defined( 'FWPWOOCHECKOUT_BUILD_PATH' ) || define( 'FWPWOOCHECKOUT_BUILD_PATH', untrailingslashit( FWPWOOCHECKOUT_DIR_PATH ) . '/assets/build' );
defined( 'FWPWOOCHECKOUT_BUILD_JS_URI' ) || define( 'FWPWOOCHECKOUT_BUILD_JS_URI', untrailingslashit( FWPWOOCHECKOUT_DIR_URI ) . '/assets/build/js' );
defined( 'FWPWOOCHECKOUT_BUILD_JS_DIR_PATH' ) || define( 'FWPWOOCHECKOUT_BUILD_JS_DIR_PATH', untrailingslashit( FWPWOOCHECKOUT_DIR_PATH ) . '/assets/build/js' );
defined( 'FWPWOOCHECKOUT_BUILD_IMG_URI' ) || define( 'FWPWOOCHECKOUT_BUILD_IMG_URI', untrailingslashit( FWPWOOCHECKOUT_DIR_URI ) . '/assets/build/src/img' );
defined( 'FWPWOOCHECKOUT_BUILD_CSS_URI' ) || define( 'FWPWOOCHECKOUT_BUILD_CSS_URI', untrailingslashit( FWPWOOCHECKOUT_DIR_URI ) . '/assets/build/css' );
defined( 'FWPWOOCHECKOUT_BUILD_CSS_DIR_PATH' ) || define( 'FWPWOOCHECKOUT_BUILD_CSS_DIR_PATH', untrailingslashit( FWPWOOCHECKOUT_DIR_PATH ) . '/assets/build/css' );
defined( 'FWPWOOCHECKOUT_BUILD_LIB_URI' ) || define( 'FWPWOOCHECKOUT_BUILD_LIB_URI', untrailingslashit( FWPWOOCHECKOUT_DIR_URI ) . '/assets/build/library' );
defined( 'FWPWOOCHECKOUT_ARCHIVE_POST_PER_PAGE' ) || define( 'FWPWOOCHECKOUT_ARCHIVE_POST_PER_PAGE', 9 );
defined( 'FWPWOOCHECKOUT_SEARCH_RESULTS_POST_PER_PAGE' ) || define( 'FWPWOOCHECKOUT_SEARCH_RESULTS_POST_PER_PAGE', 9 );

require_once FWPWOOCHECKOUT_DIR_PATH . '/inc/helpers/autoloader.php';
require_once FWPWOOCHECKOUT_DIR_PATH . '/inc/helpers/template-tags.php';

if( ! function_exists( 'fwpwoocheckout_get_theme_instance' ) ) {
	function fwpwoocheckout_get_theme_instance() {\FWPWOOCHECKOUT_THEME\Inc\Project::get_instance();}
}
fwpwoocheckout_get_theme_instance();



