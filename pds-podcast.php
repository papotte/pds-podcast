<?php
/**
 * Plugin Name: PdS Podcast
 * Version: 1.0.1
 * Plugin URI: https://github.com/papotte/pds-podcast
 * Description: Based on Seriously Simple Podcasing
 * Author: papotte
 * Author URI: https://github.com/papotte
 * Requires PHP: 5.6
 * Requires at least: 4.4
 * Tested up to: 5.7
 *
 * Text Domain: pds-podcast
 *
 * @package PdS Podcast
 *
 * GitHub Plugin URI: https://github.com/papotte/pds-podcast
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use PdSPodcast\Blocks\Castos_Blocks;
use PdSPodcast\Controllers\Admin_Controller;
use PdSPodcast\Controllers\Frontend_Controller;
use PdSPodcast\Controllers\Settings_Controller;
use PdSPodcast\Controllers\Options_Controller;
use PdSPodcast\Handlers\Images_Handler;
use PdSPodcast\Rest\Rest_Api_Controller;
use PdSPodcast\Controllers\Players_Controller;
use PdSPodcast\Integrations\Elementor\Elementor_Widgets;

define( 'SSP_VERSION', '2.7.3' );
define( 'SSP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SSP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'SSP_CASTOS_APP_URL' ) ) {
	define( 'SSP_CASTOS_APP_URL', 'https://app.castos.com/' );
}
if ( ! defined( 'SSP_CASTOS_EPISODES_URL' ) ) {
	define( 'SSP_CASTOS_EPISODES_URL', 'https://episodes.castos.com/' );
}
if ( ! defined( 'SSP_CPT_PODCAST' ) ) {
	define( 'SSP_CPT_PODCAST', 'podcast' );
}
if ( ! defined( 'SSP_DOMAIN' ) ) {
	define('SSP_DOMAIN', 'pds-podcast');
}

require SSP_PLUGIN_PATH . 'vendor/autoload.php';

global $images_handler;
$images_handler = new Images_Handler();

require_once SSP_PLUGIN_PATH . 'php/includes/ssp-functions.php';

if ( ! ssp_is_php_version_ok() ) {
	return;
}

if ( ! ssp_is_vendor_ok() ) {
	return;
}

ssp_beta_check();

/**
 * @todo refactor these globals
 * @todo the admin_controller should really be renamed, as it's not really 'admin' specific
 * @todo alternatively the non admin specific functionality should be moved into it's own 'foundation' controller, perhaps even the parent controller, or a trait
 */
global $ssp_admin, $ss_podcasting, $ssp_players;
$ssp_admin     = new Admin_Controller( __FILE__, SSP_VERSION );
$ss_podcasting = new Frontend_Controller( __FILE__, SSP_VERSION );
$ssp_players   = new Players_Controller( __FILE__, SSP_VERSION );

/**
 * Only load the settings if we're in the admin dashboard
 */
if ( is_admin() ) {
	global $ssp_settings, $ssp_options;
	$ssp_settings = new Settings_Controller( __FILE__, SSP_VERSION );
	$ssp_options  = new Options_Controller( __FILE__, SSP_VERSION );
}
/**
 * Only load Blocks if the WordPress version is newer than 5.0
 */
global $wp_version;
if ( version_compare( $wp_version, '5.0', '>=' ) ) {
	$ssp_castos_blocks = new Castos_Blocks( __FILE__, SSP_VERSION );
}
/**
 * Only load WP REST API Endpoints if the WordPress version is newer than 4.7
 */
global $wp_version;
if ( version_compare( $wp_version, '4.7', '>=' ) ) {
	global $ssp_wp_rest_api;
	$ssp_wp_rest_api = new Rest_Api_Controller( __FILE__, SSP_VERSION );
}

if ( ssp_is_elementor_ok() ) {
	$elementor_widgets = new Elementor_Widgets();
}
