<?php
namespace CIOOS;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 0.1.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 0.1.0 
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// /**
	//  * widget_scripts
	//  *
	//  * Load required plugin core files.
	//  *
	//  * @since 0.1.0
	//  * @access public
	//  */
	// public function widget_scripts() {
	// 	// Just loading an example JavaScript file, this isn't used
	// 	wp_register_script( 'cioos-siooc-wordpress-plugin', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	// }

	/**
	 * widget_styles
	 *
	 * Load widgets styles files
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function widget_styles() {
		wp_register_style( 'CIOOS-global_plugin', plugins_url( '/assets/css/global_plugin.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-global_plugin' );

		wp_register_style( 'CIOOS-cta_widget', plugins_url( '/assets/css/cta_widget.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-cta_widget' );

		wp_register_style( 'CIOOS-three_boxes_widget', plugins_url( '/assets/css/three_boxes_widget.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-three_boxes_widget' );

		wp_register_style( 'CIOOS-mailchimp_widget', plugins_url( '/assets/css/mailchimp_widget.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-mailchimp_widget' );

		wp_register_style( 'CIOOS-two_panel_box_widget', plugins_url( '/assets/css/two_panel_box_widget.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-two_panel_box_widget' );

		wp_register_style( 'CIOOS-offset_background_widget', plugins_url( '/assets/css/offset_background_widget.css', __FILE__ ) );
		wp_enqueue_style( 'CIOOS-offset_background_widget' );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 0.1.0
	 * @access private
	 */
	private function include_widgets_files() {
	}

	/**
	 * Register WordPres Widgets
	 *
	 * Register new widgets.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function register_wordpress_widgets() {
		// Its is now safe to include Widgets files
		require_once( __DIR__ . '/widgets/mailchimp_widget.php' );

		// Register Widgets
		register_widget('CIOOS\Widgets\mailchimp_widget');
	}

	/**
	 * Register Widgets
	 *
	 * Register new widgets.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function register_elementor_widgets() {
		// Its is now safe to include Widgets files
		require_once( __DIR__ . '/widgets/cta_widget.php' );
		require_once( __DIR__ . '/widgets/three_boxes_widget.php' );
		require_once( __DIR__ . '/widgets/two_panel_box_widget.php' );
		require_once( __DIR__ . '/widgets/offset_background_widget.php' );
		// $this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Call_To_Action_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Three_Boxes_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Two_Panel_Box_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Offset_Background_Widget() );
	}


	/**
	 *  Custom widget category creator
	 * 
	 * Register a custom widget category for CIOOS
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function add_elementor_widget_categories() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'CIOOS',
			[
				'title' => __( 'CIOOS', 'plugin-name'),
				'icon' => 'fa fa-thermometer-full'
			]
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct() {
		// Register widget categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		// Register widget scripts
		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'widgets_init', [ $this, 'register_wordpress_widgets' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_elementor_widgets' ] );

		// Register Widgets styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();
