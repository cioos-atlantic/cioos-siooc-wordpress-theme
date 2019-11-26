<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Two_Panel_Box_Widget extends \Elementor\Widget_Base {

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
    public function get_name() { return 'two_panel_box_widget'; }

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
	public function get_title() { return __('Two Panel Box Widget', 'cioos-siooc-wordpress-plugin'); }

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
	public function get_icon() { return 'fa fa-columns'; }

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
	protected function _register_controls() {
	    // 
        // Text panel
        // 
        $this->start_controls_section(
            'text_panel',
            [
                'label' => __('Text Panel', 'cioos-siooc-wordpress-plugin')
            ]
        );
        $this->add_control(
            'text_title',
           [
               'label' => __( 'Title', 'cioos-siooc-wordpress-plugin'),
               'type' => Controls_Manager::TEXT,
               'dynamic' => [
                   'active' => true,
               ],
               'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
               'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
           ]
        );
        $this->add_control(
			'body_text',
			[
				'label' => __( 'Body Text', 'cioos-siooc-wordpress-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Enter Your Text', 'cioos-siooc-wordpress-plugin' ),
				'placeholder' => __( 'Enter Your Text', 'cioos-siooc-wordpress-plugin' ),
			]
		);
		$this->add_control(
			'text_side',
            [
                'label' => __( 'Text Side ', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Left', 'cioos-siooc-wordpress-plugin'),
                'label_off' => __('Right', 'cioos-siooc-wordpress-plugin'),
                'return_value' => 'left',
                'default' => 'left',
                
			]
        );
       
        $this->end_controls_section();

        // 
        // Image/Link panel 
        // 
        $this->start_controls_section(
            'section_image_link_panel',
            [
				'label' => __('Image/Link Panel', 'cioos-siooc-wordpress-plugin'),
            ]
		);
		$this->add_control(
			'image',
            [
                'label' => __( 'Image', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'cioos-siooc-wordpress-plugin' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
        $this->end_controls_section();
	}
	
	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 0.1.0
	 * @access protected
	 */
	protected function render() { 
		$settings = $this->get_settings_for_display();
		$target_link = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow_link = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        $text_side_left =  $settings['text_side'];		
		?>
		<div class="elementor-container elementor-column-gap-default">
			<div class=" elementor-row <?php echo ($text_side_left == 'left' ? '' : 'switch-block-side') ?>">
				<div class="elementor-element order-text-box elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
					<div class="elementor-column-wrap  elementor-element-populated text-panel-background <?php echo ($text_side_left == 'left' ? 'border-left' : 'border-right') ?>">
						<div class="elementor-widget-wrap">
							<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
								<div class="elementor-widget-container">   
									<a href="<?php echo $settings['link']['url']; ?>" data-elementor-open-lightbox="" <?php echo($target_link)  ?> <?php echo($nofollow_link)  ?>>
										<h2 class="elementor-heading-title elementor-size-default dark-heading-title"><?php echo $settings['text_title']; ?>
									</a>
								</div>
							</div>
							<div class="elementor-element elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container">
									<div class="elementor-text-editor elementor-clearfix">
										<p><?php echo $settings['body_text']?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="elementor-element full-section-image order-image-box elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
					<div class="elementor-column-wrap  elementor-element-populated">
						<div class="elementor-widget-wrap">
							<div class="elementor-element elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
								<div class="elementor-widget-container">
									<div class="elementor-image">
										<a href="<?php echo $settings['link']['url']; ?>" data-elementor-open-lightbox="" <?php echo($target_link)  ?> <?php echo($nofollow_link)  ?> >
											<img src="<?php echo $settings['image']['url']; ?>" class="attachment-full size-full" alt="" />
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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