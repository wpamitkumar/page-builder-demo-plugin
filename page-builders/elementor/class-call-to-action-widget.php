<?php
/**
 * Elementor Widgets
 *
 * @package Demo_Plugin
 */

namespace CallToAction;

// Elementor Classes.
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Base;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Call to Action widget class.
 */
class Call_To_Action_Widget extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve Call to Action widget slug.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'calltoaction_widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Call to Action widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Call To Action', 'demo-plugin' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Call to Action widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-external-link-alt';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'demo-call-to-action-widget' );
	}

	/**
	 * Load Elementor Widget.
	 *
	 * Loads Elementor widget.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	protected function _register_controls() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
		/* Content Tab: Layout */
		$this->register_content_layout_controls();

		/* Style Tab: CTA Title */
		$this->register_style_cta_title_controls();
	}

	/**
	 * Content Tab: Layout
	 */
	protected function register_content_layout_controls() {
		/*
		* Start post card controls fields
		*/
		$this->start_controls_section(
			'section_layout',
			array(
				'label' => esc_html__( 'Layout', 'demo-plugin' ),
			)
		);

		$this->add_control(
			'cta_layout_style',
			array(
				'label'   => __( 'Layout Style', 'demo-plugin' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'layout-style-1' => esc_html__( 'Layout Style 1', 'demo-plugin' ),
					'layout-style-2' => esc_html__( 'Layout Style 2', 'demo-plugin' ),
				),
				'default' => 'layout-style-1',
			)
		);

		$this->add_control(
			'cta_title',
			array(
				'label'       => __( 'Title', 'demo-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'What is Lorem Ipsum?', 'demo-plugin' ),
				'placeholder' => __( 'Enter Title', 'demo-plugin' ),
			)
		);

		$this->add_control(
			'cta_description',
			array(
				'label'     => esc_html__( 'Description', 'demo-plugin' ),
				'type'      => Controls_Manager::WYSIWYG,
				'condition' => array(
					'cta_layout_style' => array(
						'layout-style-1',
						'layout-style-2',
					),
				),
				'default'   => __( 'Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'demo-plugin' ),
			)
		);

		$this->add_control(
			'cta_background_color',
			array(
				'label'   => __( 'Background Color', 'demo-plugin' ),
				'type'    => \Elementor\Controls_Manager::COLOR,
				'default' => '#0030f8',
			)
		);

		$this->add_control(
			'cta_button_icon',
			array(
				'label'       => __( 'Button Icon', 'demo-plugin' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'fa fa-paper-plane',
				'include'     => array(
					'fa fa-paper-plane-o',
					'fa fa-paper-plane',
				),
			)
		);

		$this->add_control(
			'cta_button_title',
			array(
				'label'       => __( 'Button Title', 'demo-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'GET STARTED', 'demo-plugin' ),
				'placeholder' => __( 'Enter Button Title', 'demo-plugin' ),
			)
		);

		$this->add_control(
			'cta_button_link',
			array(
				'label'       => __( 'Button Link', 'demo-plugin' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'default'     => array(
					'is_external' => 'true',
				),
				'placeholder' => __( 'https://your-link.com', 'demo-plugin' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Style Tab: CTA Title
	 */
	protected function register_style_cta_title_controls() {
		/*
		* Start control style tab for CTA
		* Start name control style
		*/
		$this->start_controls_section(
			'section_cta_title',
			array(
				'label' => __( 'CTA Title', 'demo-plugin' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'cta_title_align',
			array(
				'label'     => __( 'Alignment', 'demo-plugin' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'    => array(
						'title' => __( 'Left', 'demo-plugin' ),
						'icon'  => 'fa fa-align-left',
					),
					'center'  => array(
						'title' => __( 'Center', 'demo-plugin' ),
						'icon'  => 'fa fa-align-center',
					),
					'right'   => array(
						'title' => __( 'Right', 'demo-plugin' ),
						'icon'  => 'fa fa-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'demo-plugin' ),
						'icon'  => 'fa fa-align-justify',
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .call-to-action-title' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'cta_title_color',
			array(
				'label'     => __( 'Text Color', 'demo-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} .call-to-action-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'cta_title_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => array(
					'{{WRAPPER}} .call-to-action-title',
				),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render Elementor Widget.
	 *
	 * Renders the Call to Action Widget.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		include DEMO_PLUGIN_PATH . 'page-builders/elementor/layouts/elementor-cta-layout.php';
		/* switch ( $settings['cta_layout_style'] ) {
			case 'layout-style-1':
				include DEMO_PLUGIN_PATH . 'page-builders/elementor/layouts/elementor-cta-1.php'; // CTA Style 1.
				break;
			case 'layout-style-2':
				include DEMO_PLUGIN_PATH . 'page-builders/elementor/layouts/elementor-cta-2.php'; // CTA Style 2.
				break;
			default:
				include DEMO_PLUGIN_PATH . 'page-builders/elementor/layouts/elementor-cta-1.php'; // Default CTA Style 1.
				break;
		} */
	}
}
