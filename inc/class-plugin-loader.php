<?php
/**
 * Plugin Loader
 *
 * @since 1.0
 * @package KJR
 */

namespace KJR;

/** Inits the Plugin */
class Plugin_Loader {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'pre_get_posts', array( $this, 'modify_main_query' ) );
	}

	/**
	 * Modifies the main query to add post-type 'portfolio-item' to 'post'
	 *
	 * @param WP_Query $query The main query object.
	 * @return void
	 */
	public function modify_main_query( $query ): void {
		if ( ! is_admin() && $query->is_main_query() ) {
			$query->set( 'post_type', array( 'post', 'portfolio-item' ) );
		}
	}


	/**
	 * Initializes the Plugin
	 *
	 * @return void
	 */
	public function activate(): void {
		flush_rewrite_rules();
	}

	/**
	 * Handles Plugin Deactivation
	 * (this is a callback function for the `register_deactivation_hook` function)
	 *
	 * @return void
	 */
	public function deactivate(): void {
		flush_rewrite_rules();
	}
}
