<?php
/**
 * Enqueue theme assets
 *
 * @package FWPWooCheckoutVideo
 */


namespace FWPWOOCHECKOUT_THEME\Inc;

use FWPWOOCHECKOUT_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		/**
		 * The 'enqueue_block_assets' hook includes styles and scripts both in editor and frontend,
		 * except when is_admin() is used to include them conditionally
		 */
		// add_action( 'enqueue_block_assets', [ $this, 'enqueue_editor_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ], 10, 1 );
	}

	public function register_styles() {
		// Register styles.
		// wp_register_style( 'bootstrap-css', FWPWOOCHECKOUT_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false, 'all' );
		// wp_register_style( 'slick-css', FWPWOOCHECKOUT_BUILD_LIB_URI . '/css/slick.css', [], false, 'all' );
		// wp_register_style( 'slick-theme-css', FWPWOOCHECKOUT_BUILD_LIB_URI . '/css/slick-theme.css', ['slick-css'], false, 'all' );

		wp_register_style( 'listivo', get_template_directory_uri() . '/style.css', [], $this->filemtime( get_template_directory() . '/style.css' ), 'all' );
		wp_register_style( 'listivo-child', FWPWOOCHECKOUT_BUILD_CSS_URI . '/main.css', [ 'listivo' ], $this->filemtime( FWPWOOCHECKOUT_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'listivo' );
		wp_enqueue_style( 'listivo-child' );

		// wp_enqueue_style( 'bootstrap-css' );
		// wp_enqueue_style( 'slick-css' );
		// wp_enqueue_style( 'slick-theme-css' );

	}

	public function register_scripts() {
		// Register scripts.
		// wp_register_script( 'slick-js', FWPWOOCHECKOUT_BUILD_LIB_URI . '/js/slick.min.js', ['jquery'], false, true );
		wp_register_script( 'listivo-child', FWPWOOCHECKOUT_BUILD_JS_URI . '/main.js', ['jquery'], $this->filemtime( FWPWOOCHECKOUT_BUILD_JS_DIR_PATH . '/main.js' ), true );
		// wp_register_script( 'single-js', FWPWOOCHECKOUT_BUILD_JS_URI . '/single.js', ['jquery', 'slick-js'], $this->filemtime( FWPWOOCHECKOUT_BUILD_JS_DIR_PATH . '/single.js' ), true );
		// wp_register_script( 'author-js', FWPWOOCHECKOUT_BUILD_JS_URI . '/author.js', ['jquery'], $this->filemtime( FWPWOOCHECKOUT_BUILD_JS_DIR_PATH . '/author.js' ), true );
		// wp_register_script( 'bootstrap-js', FWPWOOCHECKOUT_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, true );

		// Enqueue Scripts.
		wp_enqueue_script( 'listivo-child' );
		// wp_enqueue_script( 'bootstrap-js' );
		// wp_enqueue_script( 'slick-js' );

		// If single post page
		// if ( is_single() ) {
		// 	wp_enqueue_script( 'single-js' );
		// }

		// If author archive page
		// if ( is_author() ) {
		// 	wp_enqueue_script( 'author-js' );
		// }

		wp_localize_script( 'listivo-child', 'siteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' ),
		] );
	}

	/**
	 * Enqueue editor scripts and styles.
	 */
	public function enqueue_editor_assets() {

		$asset_config_file = sprintf( '%s/assets.php', FWPWOOCHECKOUT_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = require_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : $this->filemtime( $asset_config_file );

		// Theme Gutenberg blocks JS.
		if ( is_admin() ) {
			wp_enqueue_script(
				'aquila-blocks-js',
				FWPWOOCHECKOUT_BUILD_JS_URI . '/blocks.js',
				$js_dependencies,
				$version,
				true
			);
		}

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'aquila-blocks-css',
			FWPWOOCHECKOUT_BUILD_CSS_URI . '/blocks.css',
			$css_dependencies,
			$this->filemtime( FWPWOOCHECKOUT_BUILD_CSS_DIR_PATH . '/blocks.css' ),
			'all'
		);

	}
	public function admin_enqueue_scripts( $curr_page ) {
		// if( ! in_array( $curr_page, [ 'edit-tags.php', 'term.php' ] ) ) {return;}
		wp_register_style( 'FWPWOOCHECKOUTBackendCSS', FWPWOOCHECKOUT_BUILD_CSS_URI . '/admin.css', [], $this->filemtime( FWPWOOCHECKOUT_BUILD_CSS_DIR_PATH . '/admin.css' ), 'all' );
		wp_register_script( 'FWPWOOCHECKOUTBackendJS', FWPWOOCHECKOUT_BUILD_JS_URI . '/admin.js', [ 'jquery' ], $this->filemtime( FWPWOOCHECKOUT_BUILD_JS_DIR_PATH . '/admin.js' ), true );
		
		wp_enqueue_style( 'FWPWOOCHECKOUTBackendCSS' );
		wp_enqueue_script( 'FWPWOOCHECKOUTBackendJS' );

		wp_localize_script( 'FWPWOOCHECKOUTBackendJS', 'FWPsiteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			// 'ajax_nonce' => wp_create_nonce( 'futurewordpress_project_nonce' ),
		] );
	}
	private function filemtime( $file ) {
		return ( file_exists( $file ) && ! is_dir( $file ) ) ? filemtime( $file ) : rand( 0, 9999 );
	}

}
