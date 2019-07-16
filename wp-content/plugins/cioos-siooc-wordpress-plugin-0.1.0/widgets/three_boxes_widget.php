<?php
namespace CIOOS\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Three_Boxes_Widget extends \Elementor\Widget_Base {

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
    public function get_name() { return 'three_boxes_widget'; }

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
	public function get_title() { return __('Three Boxes Widget', 'cioos-siooc-wordpress-plugin'); }

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
	public function get_icon() { return 'fa fa-cubes'; }

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
        // Background
        // 
        $this->start_controls_section(
            'background',
            [
                'label' => __('Background', 'cioos-siooc-wordpress-plugin')
            ]
		);
		$this->add_control(
			'background_color',
            [
                'label' => __( 'Background Color', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
					'type' => Scheme_color::get_type(),
					'value' => Scheme_color::COLOR_1,
                ],
			]
        );
        $this->end_controls_section();  
		
		// 
        // Titles
        // 
        $this->start_controls_section(
            'titles',
            [
                'label' => __('Titles', 'cioos-siooc-wordpress-plugin')
            ]
		);
		$this->add_control(
		 	'title_left_text',
            [
                'label' => __( 'Text Title Left', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
                'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
			]
		);
		$this->add_control(
			'title_middle_text',
            [
                'label' => __( 'Text Title Middle', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
                'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
			]
		);
		$this->add_control(
			'title_right_text',
            [
                'label' => __( 'Text Title Right', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
                'placeholder' => __( 'Click here', 'cioos-siooc-wordpress-plugin' ),
			]
        );
        $this->end_controls_section();

        // 
        // Images/Links 
        // 
        $this->start_controls_section(
            'section_images_links',
            [
				'label' => __('Images/Links', 'cioos-siooc-wordpress-plugin'),
            ]
		);
		$this->add_control(
			'image_1',
            [
                'label' => __( 'Image 1', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'link_1',
			[
				'label' => __( 'Link 1', 'cioos-siooc-wordpress-plugin' ),
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
		$this->add_control(
			'image_2',
            [
                'label' => __( 'Image 2', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'link_2',
			[
				'label' => __( 'Link 2', 'cioos-siooc-wordpress-plugin' ),
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
		$this->add_control(
			'image_3',
            [
                'label' => __( 'Image 3', 'cioos-siooc-wordpress-plugin'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'link_3',
			[
				'label' => __( 'Link 3', 'cioos-siooc-wordpress-plugin' ),
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
		$target_link_1 = $settings['link_1']['is_external'] ? ' target="_blank"' : '';
		$target_link_2 = $settings['link_2']['is_external'] ? ' target="_blank"' : '';
		$target_link_3 = $settings['link_3']['is_external'] ? ' target="_blank"' : '';
		$nofollow_link_1 = $settings['link_1']['nofollow'] ? ' rel="nofollow"' : '';
		$nofollow_link_2 = $settings['link_2']['nofollow'] ? ' rel="nofollow"' : '';
		$nofollow_link_3 = $settings['link_3']['nofollow'] ? ' rel="nofollow"' : '';		
		?>
		<div class="elementor-element half-box-background elementor-widget elementor-widget-html" style="background-color: <?php echo $settings['background_color']; ?>;" data-element_type="widget" data-widget_type="html.default">
			<div class="elementor-widget-container">
				<div></div>
			</div>
		</div>
		<section class="elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-element_type="section">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
					<div class="elementor-element elementor-column elementor-col-33 elementor-inner-column" data-element_type="column">
						<div class="elementor-column-wrap  elementor-element-populated">
							<div class="elementor-widget-wrap">
								<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
									<div class="elementor-widget-container">
										<h3 class="elementor-heading-title elementor-size-large box-title"><?php echo $settings['title_left_text']; ?></h3>
									</div>
								</div>
								<div class="elementor-element elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
									<div class="elementor-widget-container">
										<a href="<?php $settings['link_1']['url']; ?>" data-elementor-open-lightbox="" <?php echo($target_link_1)  ?> <?php echo($nofollow_link_1)  ?> >
											<div class="box">
												<img src="<?php echo $settings['image_1']['url']; ?>" class="attachment-large size-large image-size" alt=""/>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-element elementor-column elementor-col-33 elementor-inner-column" data-element_type="column">
						<div class="elementor-column-wrap  elementor-element-populated">
							<div class="elementor-widget-wrap">
								<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
									<div class="elementor-widget-container">
										<h3 class="elementor-heading-title elementor-size-large box-title"><?php echo $settings['title_middle_text']; ?></h3>
									</div>
								</div>
								<div class="elementor-element elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
									<div class="elementor-widget-container">
										<a href="<?php echo $settings['link_2']['url']; ?>" data-elementor-open-lightbox="" <?php echo($target_link_2) ?> <?php echo($nofollow_link_2)  ?>>
											<div class="box">
												<img src="<?php echo $settings['image_2']['url']; ?>" class="attachment-large size-large image-size" alt=""/>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-element elementor-column elementor-col-33 elementor-inner-column" data-element_type="column">
						<div class="elementor-column-wrap  elementor-element-populated">
							<div class="elementor-widget-wrap">
								<div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
									<div class="elementor-widget-container">
										<h3 class="elementor-heading-title elementor-size-large box-title"><?php echo $settings['title_right_text']; ?></h3>
									</div>
								</div>
								<div class="elementor-element elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
									<div class="elementor-widget-container">
										<a href="<?php echo $settings['link_3']['url']; ?>" data-elementor-open-lightbox="" <?php echo($target_link_3) ?> <?php echo($nofollow_link_3)  ?>>
											<div class="box">	
												<img src="<?php echo $settings['image_3']['url']; ?>" class="image-size attachment-large size-large" alt="" />
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
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