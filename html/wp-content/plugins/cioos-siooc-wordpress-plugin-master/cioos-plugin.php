<?php
/*
Plugin Name: CIOOS Plugin
Description: Custom widgets for the CIOOS National and RA sites
Version: 0.1.0
Author: OGSL
Author URI: https://ogsl.ca/
Text Domain: cioos-siooc-wordpress-plugin
Domain Path: /languages
*/
namespace CIOOS;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main CIOOS Plugin Class
 *
 * The init class that runs the CIOOS plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match the plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 0.1.0
 */
final class CIOOS_plugin {
    /**
	 * Plugin Version
	 *
	 * @since 0.1.0
	 * @var string The plugin version.
	 */
    const VERSION = '0.1.0';
    
    /**
	 * Minimum Elementor Version
	 *
	 * @since 0.1.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
    const MINIMUM_ELEMENTOR_VERSION = '2.5.15';
    
    /**
	 * Minimum PHP Version
	 *
	 * @since 0.1.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
    const MINIMUM_PHP_VERSION = '5.0';
    
    /**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct() {
		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

    /**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'cioos-siooc-wordpress-plugin', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    
    /**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fails don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
    }
    
   /**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'cioos-siooc-wordpress-plugin' ),
			'<strong>' . esc_html__( 'CIOOS Plugin', 'cioos-siooc-wordpress-plugin' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cioos-siooc-wordpress-plugin' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

    /**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cioos-siooc-wordpress-plugin' ),
			'<strong>' . esc_html__( 'CIOOS Plugin', 'cioos-siooc-wordpress-plugin' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cioos-siooc-wordpress-plugin' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
    
    /**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cioos-siooc-wordpress-plugin' ),
			'<strong>' . esc_html__( 'CIOOS Plugin', 'cioos-siooc-wordpress-plugin' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'cioos-siooc-wordpress-plugin' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

new CIOOS_plugin();

/* Stop Adding Functions Below this Line */
?>