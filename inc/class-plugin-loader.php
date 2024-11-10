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
		add_action( 'pre_get_posts', array( $this, 'modify_main_query' ),20,1 );
	}

	/**
	 * Modifies the main query to add post-type 'portfolio-item' to 'post'
	 *
	 * @param WP_Query $query The main query object.
	 * @return void
	 */
	public function modify_main_query( $query ): void {
		$is_admin = is_admin();
		$is_main_query = $query->is_main_query();
		$is_archive = $query->is_archive();
		if ( $is_admin || ! $is_archive  || ! $is_main_query ) {
			return;
		}
		$query->set( 'post_type', array( 'post', 'kjr-portfolio-item' ) );
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
