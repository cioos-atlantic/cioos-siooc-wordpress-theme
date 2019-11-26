<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Call_To_Action_Widget extends \Elementor\Widget_Base {

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
    public function get_name() { return 'cta_widget'; }

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
	public function get_title() { return __('Call to Action Widget', 'cioos-siooc-wordpress-plugin'); }

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
	public function get_icon() { return 'eicon-click'; }

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
        // Body Section
        // 
        $this->start_controls_section(
            'section_body',
            [
                'label' => __( 'Body Text', 'cioos-siooc-wordpress-plugin' )
            ]
        );
        $this->add_control(
            'body_text',
            [
                'label' => __( 'Body Text', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your text', 'cioos-siooc-wordpress-plugin' ),
                'default' => __( 'Enter your text', 'cioos-siooc-wordpress-plugin' )
            ]
        );
        $this->end_controls_section();

        // 
        // Button 1 Section 
        // 
        $this->start_controls_section(
            'section_button_left',
            [
                'label' => __('Left Button', 'cioos-siooc-wordpress-plugin')
            ]
        );
        $this->add_control(
            'button_left_text',
            [
                'label' => __( 'Text', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
                'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
            ]
        );
		$this->add_control(
			'button_left_link',
			[
				'label' => __( 'Link', 'cioos-siooc-wordpress-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'button_left_css_id',
			[
				'label' => __( 'Button ID', 'cioos-siooc-wordpress-plugin' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'cioos-siooc-wordpress-plugin' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'cioos-siooc-wordpress-plugin' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_left_link_color',
			[
				'label' => __( 'Link Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'button_left_link_color_hover',
			[
				'label' => __( 'Link Color (Hover)', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'button_left_background_color',
			[
				'label' => __( 'Background Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#00adef',
			]
		);
		$this->add_control(
			'button_left_background_color_hover',
			[
				'label' => __( 'Background Color (Hover)', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1e4659',
			]
		);
        $this->end_controls_section();

        // 
        // Button 2 Section 
        // 
        $this->start_controls_section(
            'section_button_right',
            [
                'label' => __('Right Button', 'cioos-siooc-wordpress-plugin')
            ]
        );
        $this->add_control(
            'button_right_text',
            [
                'label' => __( 'Text', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
                'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
            ]
        );
		$this->add_control(
			'button_right_link',
			[
				'label' => __( 'Link', 'cioos-siooc-wordpress-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'button_right_css_id',
			[
				'label' => __( 'Button ID', 'cioos-siooc-wordpress-plugin' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'cioos-siooc-wordpress-plugin' ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'cioos-siooc-wordpress-plugin' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_right_link_color',
			[
				'label' => __( 'Link Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'button_right_link_color_hover',
			[
				'label' => __( 'Link Color (Hover)', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
			]
		);
		$this->add_control(
			'button_right_background_color',
			[
				'label' => __( 'Background Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#00adef',
			]
		);
		$this->add_control(
			'button_right_background_color_hover',
			[
				'label' => __( 'Background Color (Hover)', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1e4659',
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
		$target_btn_left  = $settings['button_left_link']['is_external'] ? ' target="_blank"' : '';
		$target_btn_right = $settings['button_right_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow_link_1 = $settings['button_left_link']['nofollow'] ? ' rel="nofollow"' : '';
		$nofollow_link_2 = $settings['button_right_link']['nofollow'] ? ' rel="nofollow"' : '';
		$css_btn_left  = sprintf("color: %s; background-color: %s;", $settings['button_left_link_color'], $settings['button_left_background_color']);
		$css_btn_right = sprintf("color: %s; background-color: %s;", $settings['button_right_link_color'], $settings['button_right_background_color']);
		?>
		<div class="elementor-container elementor-column-gap-default">
			<div class="elementor-row">
				<div class="elementor-element elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
					<div class="elementor-column-wrap  elementor-element-populated">
						<div class="elementor-widget-wrap">
							<div class="elementor-element elementor-widget elementor-widget-text-editor" data-element_type="widget" data-widget_type="text-editor.default">
								<div class="elementor-widget-container shrink-text-area">
									<div class="elementor-text-editor justify-text elementor-clearfix"><p>
										<?php echo $settings['body_text']; ?>
									</p></div>
								</div>
							</div>
							<section class="elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-element_type="section">
								<div class="elementor-container elementor-column-gap-default">
									<div class="elementor-row">
										<div class="elementor-element elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
											<div class="elementor-column-wrap  elementor-element-populated">
												<div class="elementor-widget-wrap">
													<div class="elementor-element elementor-align-center elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
														<div class="elementor-widget-container">
															<div class="elementor-button-wrapper">
																<a href="<?php echo $settings['button_left_link']['url']; ?>" <?php echo($target_btn_left)  ?> <?php echo($nofollow_link_1)  ?> style="<?php print($css_btn_left); ?>" class="elementor-button-link elementor-button elementor-size-md cta-button" role="button" id="<?php echo $settings['button_left_css_id']; ?>">	
																	<span class="elementor-button-content-wrapper">
																		<span class="elementor-button-text">
																			<?php echo $settings['button_left_text']; ?>
																		</span>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="elementor-element elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
											<div class="elementor-column-wrap  elementor-element-populated">
												<div class="elementor-widget-wrap">
													<div class="elementor-element elementor-align-center elementor-widget elementor-widget-button" data-element_type="widget" data-widget_type="button.default">
														<div class="elementor-widget-container">
															<div class="elementor-button-wrapper">
																<a href="<?php echo $settings['button_right_link']['url']; ?>" <?php echo($target_btn_right) ?> <?php echo($nofollow_link_2)  ?> style="<?php print($css_btn_right); ?>" class="elementor-button-link elementor-button elementor-size-md cta-button" role="button" id="<?php echo $settings['button_right_css_id']; ?>">
																	<span class="elementor-button-content-wrapper">
																		<span class="elementor-button-text">
																			<?php echo $settings['button_right_text']; ?>
																		</span>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
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