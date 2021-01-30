<?php
/**
 * Styles for CTA frontend.
 *
 * @package Demo_Plugin
 * @version 1.0.0
 */

// Box( Color , Alignment).
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'bbm_box_content_align',
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'props'        => array(
			'text-align' => $settings->bbm_box_content_align,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'bbm_box_content_align',
		'media'        => 'medium',
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'props'        => array(
			'text-align' => $settings->bbm_box_content_align_medium,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'bbm_box_content_align',
		'media'        => 'responsive',
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'props'        => array(
			'text-align' => $settings->bbm_box_content_align_responsive,
		),
	)
);

FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .demo-call-to-action-box",
		'props'    => array(
			'background-color' => $settings->bbm_box_background_color,
		),
	)
);

FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'media'        => 'default',
		'setting_name' => 'bbm_box_content_padding',
		'props'        => array(
			'padding-top'    => $settings->bbm_box_content_padding_top . $settings->bbm_box_content_padding_unit,
			'padding-right'  => $settings->bbm_box_content_padding_right . $settings->bbm_box_content_padding_unit,
			'padding-bottom' => $settings->bbm_box_content_padding_bottom . $settings->bbm_box_content_padding_unit,
			'padding-left'   => $settings->bbm_box_content_padding_left . $settings->bbm_box_content_padding_unit,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'media'        => 'medium',
		'setting_name' => 'bbm_box_content_padding',
		'props'        => array(
			'padding-top'    => $settings->bbm_box_content_padding_top_medium . $settings->bbm_box_content_padding_medium_unit,
			'padding-right'  => $settings->bbm_box_content_padding_right_medium . $settings->bbm_box_content_padding_medium_unit,
			'padding-bottom' => $settings->bbm_box_content_padding_bottom_medium . $settings->bbm_box_content_padding_medium_unit,
			'padding-left'   => $settings->bbm_box_content_padding_left_medium . $settings->bbm_box_content_padding_medium_unit,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .demo-call-to-action-box",
		'media'        => 'responsive',
		'setting_name' => 'bbm_box_content_padding',
		'props'        => array(
			'padding-top'    => $settings->bbm_box_content_padding_top_responsive . $settings->bbm_box_content_padding_responsive_unit,
			'padding-right'  => $settings->bbm_box_content_padding_right_responsive . $settings->bbm_box_content_padding_responsive_unit,
			'padding-bottom' => $settings->bbm_box_content_padding_bottom_responsive . $settings->bbm_box_content_padding_responsive_unit,
			'padding-left'   => $settings->bbm_box_content_padding_left_responsive . $settings->bbm_box_content_padding_responsive_unit,
		),
	)
);

// Title(Spacing , Color , Typography).
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .call-to-action-title",
		'setting_name' => 'bbm_title_spacing_bottom',
		'props'        => array(
			'margin-bottom' => $settings->bbm_title_spacing_bottom . $settings->bbm_title_spacing_bottom_unit,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .call-to-action-title",
		'media'        => 'medium',
		'setting_name' => 'bbm_title_spacing_bottom',
		'props'        => array(
			'margin-bottom' => $settings->bbm_title_spacing_bottom_medium . $settings->bbm_title_spacing_bottom_medium_unit,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'settings'     => $settings,
		'selector'     => ".fl-node-$id .call-to-action-title",
		'media'        => 'responsive',
		'setting_name' => 'bbm_title_spacing_bottom',
		'props'        => array(
			'margin-bottom' => $settings->bbm_title_spacing_bottom_responsive . $settings->bbm_title_spacing_bottom_responsive_unit,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .call-to-action-title",
		'props'    => array(
			'color' => $settings->bbm_title_text_color,
		),
	)
);
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'bbm_title_typography',
		'selector'     => ".fl-node-$id .call-to-action-title",
	)
);
