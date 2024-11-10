<?php
/**
 * Plugin Name: KJR Site Mods
 * Plugin URI: https://github.com/kjroelke/kjr-site-mods-plugin
 * Description: A small plugin for recreating theme 'functions.php' file for an site built with Gutenberg.
 * Version: 1.0.0
 * Author: K.J. Roelke
 * Author URI: https://kjroelke.online
 * Text Domain: kjr
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires PHP: 8.2
 * Requires at least: 6.0
 * Tested up to: 6.6.2
 *
 * @package KJR
 */

use KJR\Plugin_Loader;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

require_once __DIR__ . '/inc/class-plugin-loader.php';
$plugin_loader = new Plugin_Loader();

register_activation_hook( __FILE__, array( $plugin_loader, 'activate' ) );
register_deactivation_hook( __FILE__, array( $plugin_loader, 'deactivate' ) );
