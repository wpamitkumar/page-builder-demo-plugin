<?php
/**
 * Call To Action Beaver Module.
 *
 * @package Demo_Plugin
 */

/**
 * Call To Action Beaver Module Class.
 */
class Module_Call_To_Action extends FLBuilderModule {
	/**
	 * Constructor function to intialize module.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'          => __( 'Call to Action', 'demo-plugin' ),
				'description'   => __( 'A Call to Action module!', 'demo-plugin' ),
				'group'         => __( 'Call to Action Plugin', 'demo-plugin' ),
				'category'      => __( 'Call to Action Plugin base', 'demo-plugin' ),
				'dir'           => DEMO_PLUGIN_PATH . 'page-builders/beaver/',
				'url'           => DEMO_PLUGIN_URL . 'page-builders/beaver/',
				'icon'          => 'icon.svg',
				'editor_export' => true, // Defaults to true and can be omitted.
				'enabled'       => true, // Defaults to true and can be omitted.
			)
		);
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'Module_Call_To_Action',
	array(
		// Tab General.
		'bbm_general_tab' => array(
			'title'    => __( 'General', 'demo-plugin' ),
			'sections' => array(
				// Section Layout.
				'bbm_layout'  => array(
					'title'  => __( 'Layout', 'demo-plugin' ),
					'fields' => array(
						'bbm_layout_style' => array(
							'type'    => 'select',
							'label'   => __( 'Layout Style', 'demo-plugin' ),
							'default' => 'layout-style-1',
							'options' => array(
								'layout-style-1' => __( 'Layout Style 1', 'demo-plugin' ),
								'layout-style-2' => __( 'Layout Style 2', 'demo-plugin' ),
							),
						),
					),
				),
				// Section Content.
				'bbm_content' => array(
					'title'  => __( 'Content', 'demo-plugin' ),
					'fields' => array(
						// Title.
						'bbm_title'       => array(
							'type'    => 'text',
							'default' => __( 'This is heading', 'demo-plugin' ),
							'label'   => __( 'Title', 'demo-plugin' ),
						),
						// Description.
						'bbm_description' => array(
							'type'        => 'textarea',
							'label'       => __( 'Description', 'demo-plugin' ),
							'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'demo-plugin' ),
							'placeholder' => __( 'Add Description', 'demo-plugin' ),
							'rows'        => '6',
						),
						// Button Text.
						'bbm_button_text' => array(
							'type'    => 'text',
							'default' => __( 'Click Here', 'demo-plugin' ),
							'label'   => __( 'Button Text', 'demo-plugin' ),
						),
						// Link.
						'bbm_link'        => array(
							'type'          => 'link',
							'label'         => __( 'Link', 'demo-plugin' ),
							'show_target'   => true,
							'show_nofollow' => true,
						),
					),
				),
			),
		),
		// Tab Style.
		'bbm_style_tab'   => array(
			'title'    => __( 'Style', 'demo-plugin' ),
			'sections' => array(
				// Section Box.
				'bbm_box_style'     => array(
					'title'  => __( 'Box', 'demo-plugin' ),
					'fields' => array(
						// Alignment.
						'bbm_box_content_align'    => array(
							'type'       => 'align',
							'label'      => __( 'Alignment', 'demo-plugin' ),
							'responsive' => true,
							'default'    => 'center',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbm-box-style',
								'property' => 'text-align',
							),
						),
						// Content Padding.
						'bbm_box_content_padding'  => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'demo-plugin' ),
							'responsive' => true,
							'slider'     => true,
							'units'      => array(
								'px',
								'em',
								'%',
								'vw',
								'vh',
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbm-box-style',
								'property' => 'padding',
							),
						),
						// Box color.
						'bbm_box_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'demo-plugin' ),
							'default'    => '0030f8',
							'show_reset' => true,
							'show_alpha' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbm-box-style',
								'property' => 'background-color',
							),
						),
					),
				),
				// Section Title.
				'bbm_content_style' => array(
					'title'  => __( 'Title', 'demo-plugin' ),
					'fields' => array(
						// Title Spacing.
						'bbm_title_spacing_bottom' => array(
							'type'         => 'unit',
							'label'        => __( 'Spacing', 'demo-plugin' ),
							'units'        => array( 'px', '%' ),
							'responsive'   => true,
							'default_unit' => 'px',
							'default'      => '20',
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.bbm-title-style',
								'property' => 'margin-bottom',
							),
						),
						// Title Color.
						'bbm_title_text_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'demo-plugin' ),
							'show_reset'  => true,
							'show_alpha'  => true,
							'default'     => 'ffffff',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.bbm-title-style',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
						// Title typography.
						'bbm_title_typography'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'demo-plugin' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbm-title-style',
							),
						),
					),
				),
			),
		),
	)
);
