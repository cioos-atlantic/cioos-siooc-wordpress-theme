<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Offset_Background_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
    public function get_name() { return 'offset_background_widget'; }

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() { return __('Offset Background Widget', 'cioos-siooc-wordpress-plugin'); }

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() { return 'fa fa-object-ungroup'; }

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
    public function get_categories() { return [ 'CIOOS' ]; }

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	protected function _register_controls() {}
	
	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	protected function render() { 
		?>
		<div class="half-box-background-news"></div>
	<?php
	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	// protected function _content_template() {}
}
?>