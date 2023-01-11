<?php
/**
 * Register Post Types
 *
 * @package FWPWooCheckoutVideo
 */

namespace FWPWOOCHECKOUT_THEME\Inc;

use FWPWOOCHECKOUT_THEME\Inc\Traits\Singleton;

class Register_Post_Types {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'create_movie_cpt' ], 0 );

	}

	// Register Custom Post Type Movie
	public function create_movie_cpt() {

		$labels = [
			'name'                  => _x( 'Movies', 'Post Type General Name', 'fwp-Listivo-child-c4trade' ),
			'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'fwp-Listivo-child-c4trade' ),
			'menu_name'             => _x( 'Movies', 'Admin Menu text', 'fwp-Listivo-child-c4trade' ),
			'name_admin_bar'        => _x( 'Movie', 'Add New on Toolbar', 'fwp-Listivo-child-c4trade' ),
			'archives'              => __( 'Movie Archives', 'fwp-Listivo-child-c4trade' ),
			'attributes'            => __( 'Movie Attributes', 'fwp-Listivo-child-c4trade' ),
			'parent_item_colon'     => __( 'Parent Movie:', 'fwp-Listivo-child-c4trade' ),
			'all_items'             => __( 'All Movies', 'fwp-Listivo-child-c4trade' ),
			'add_new_item'          => __( 'Add New Movie', 'fwp-Listivo-child-c4trade' ),
			'add_new'               => __( 'Add New', 'fwp-Listivo-child-c4trade' ),
			'new_item'              => __( 'New Movie', 'fwp-Listivo-child-c4trade' ),
			'edit_item'             => __( 'Edit Movie', 'fwp-Listivo-child-c4trade' ),
			'update_item'           => __( 'Update Movie', 'fwp-Listivo-child-c4trade' ),
			'view_item'             => __( 'View Movie', 'fwp-Listivo-child-c4trade' ),
			'view_items'            => __( 'View Movies', 'fwp-Listivo-child-c4trade' ),
			'search_items'          => __( 'Search Movie', 'fwp-Listivo-child-c4trade' ),
			'not_found'             => __( 'Not found', 'fwp-Listivo-child-c4trade' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'fwp-Listivo-child-c4trade' ),
			'featured_image'        => __( 'Featured Image', 'fwp-Listivo-child-c4trade' ),
			'set_featured_image'    => __( 'Set featured image', 'fwp-Listivo-child-c4trade' ),
			'remove_featured_image' => __( 'Remove featured image', 'fwp-Listivo-child-c4trade' ),
			'use_featured_image'    => __( 'Use as featured image', 'fwp-Listivo-child-c4trade' ),
			'insert_into_item'      => __( 'Insert into Movie', 'fwp-Listivo-child-c4trade' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'fwp-Listivo-child-c4trade' ),
			'items_list'            => __( 'Movies list', 'fwp-Listivo-child-c4trade' ),
			'items_list_navigation' => __( 'Movies list navigation', 'fwp-Listivo-child-c4trade' ),
			'filter_items_list'     => __( 'Filter Movies list', 'fwp-Listivo-child-c4trade' ),
		];
		$args   = [
			'label'               => __( 'Movie', 'fwp-Listivo-child-c4trade' ),
			'description'         => __( 'The movies', 'fwp-Listivo-child-c4trade' ),
			'labels'              => $labels,
			'menu_icon'           => 'dashicons-video-alt',
			'supports'            => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
				'author',
				'comments',
				'trackbacks',
				'page-attributes',
				'custom-fields',
			],
			'taxonomies'          => [],
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		];

		register_post_type( 'movies', $args );

	}


}
