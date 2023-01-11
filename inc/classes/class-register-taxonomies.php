<?php
/**
 * Register Custom Taxonomies
 *
 * @package FWPWooCheckoutVideo
 */

namespace FWPWOOCHECKOUT_THEME\Inc;

use FWPWOOCHECKOUT_THEME\Inc\Traits\Singleton;

class Register_Taxonomies {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'create_genre_taxonomy' ] );
		add_action( 'init', [ $this, 'create_year_taxonomy' ] );

	}

	// Register Taxonomy Genre
	public function create_genre_taxonomy() {

		$labels = [
			'name'              => _x( 'Genres', 'taxonomy general name', 'fwp-Listivo-child-c4trade' ),
			'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'fwp-Listivo-child-c4trade' ),
			'search_items'      => __( 'Search Genres', 'fwp-Listivo-child-c4trade' ),
			'all_items'         => __( 'All Genres', 'fwp-Listivo-child-c4trade' ),
			'parent_item'       => __( 'Parent Genre', 'fwp-Listivo-child-c4trade' ),
			'parent_item_colon' => __( 'Parent Genre:', 'fwp-Listivo-child-c4trade' ),
			'edit_item'         => __( 'Edit Genre', 'fwp-Listivo-child-c4trade' ),
			'update_item'       => __( 'Update Genre', 'fwp-Listivo-child-c4trade' ),
			'add_new_item'      => __( 'Add New Genre', 'fwp-Listivo-child-c4trade' ),
			'new_item_name'     => __( 'New Genre Name', 'fwp-Listivo-child-c4trade' ),
			'menu_name'         => __( 'Genre', 'fwp-Listivo-child-c4trade' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Movie Genre', 'fwp-Listivo-child-c4trade' ),
			'hierarchical'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];

		register_taxonomy( 'genre', [ 'movies' ], $args );

	}

	// Register Taxonomy Year
	public function create_year_taxonomy() {

		$labels = [
			'name'              => _x( 'Years', 'taxonomy general name', 'fwp-Listivo-child-c4trade' ),
			'singular_name'     => _x( 'Year', 'taxonomy singular name', 'fwp-Listivo-child-c4trade' ),
			'search_items'      => __( 'Search Years', 'fwp-Listivo-child-c4trade' ),
			'all_items'         => __( 'All Years', 'fwp-Listivo-child-c4trade' ),
			'parent_item'       => __( 'Parent Year', 'fwp-Listivo-child-c4trade' ),
			'parent_item_colon' => __( 'Parent Year:', 'fwp-Listivo-child-c4trade' ),
			'edit_item'         => __( 'Edit Year', 'fwp-Listivo-child-c4trade' ),
			'update_item'       => __( 'Update Year', 'fwp-Listivo-child-c4trade' ),
			'add_new_item'      => __( 'Add New Year', 'fwp-Listivo-child-c4trade' ),
			'new_item_name'     => __( 'New Year Name', 'fwp-Listivo-child-c4trade' ),
			'menu_name'         => __( 'Year', 'fwp-Listivo-child-c4trade' ),
		];
		$args   = [
			'labels'             => $labels,
			'description'        => __( 'Movie Release Year', 'fwp-Listivo-child-c4trade' ),
			'hierarchical'       => false,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
		];
		register_taxonomy( 'movie-year', [ 'movies' ], $args );

	}

}
