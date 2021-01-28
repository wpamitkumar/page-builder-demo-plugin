<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpamitkumar.com/
 * @since      1.0.0
 *
 * @package    Demo_Plugin
 */

$cta_layout_style = is_blank_string( $settings['cta_layout_style'], 'layout-style-1' );

$cta_background_color = is_blank_string( $settings['cta_background_color'], '' );

$cta_title       = is_blank_string( $settings['cta_title'], '' );
$cta_description = is_blank_string( $settings['cta_description'], '' );

$cta_button_icon  = is_blank_string( $settings['cta_button_icon'], '' );
$cta_button_title = is_blank_string( $settings['cta_button_title'], '' );
$cta_button_link  = is_blank_string( $settings['cta_button_link'], array() );
// print_r($cta_button_link);
// wp_die();
if ( 'layout-style-2' === $cta_layout_style ) {
	$layout_style_class = 'layout-style-2';
} else {
	$layout_style_class = 'layout-style-1';
}

$cta_html = '<div class="demo-call-to-action-widget %9$s" style="background: %1$s;">
				<div class="demo-call-to-action-widget__content">
					<h4 class="call-to-action-title">%2$s</h4>
					<div class="call-to-action-description">%3$s</div>
				</div>
				<div class="demo-call-to-action-widget__button-area">
					<a href="%4$s" target="%5$s" rel="%6$s" class="demo-call-to-action-widget__button">
						<i class="%7$s" aria-hidden="true"></i>
						<div class="demo-call-to-action-widget__button-text">
							%8$s
						</div>
					</a>
				</div>
			</div>';

echo sprintf(
	wp_kses_post( $cta_html ),
	esc_html( $cta_background_color ),
	esc_html( $cta_title ),
	wp_kses_post( $cta_description ),
	esc_attr( $cta_button_link['url'] ),
	esc_html( ( 'true' === $cta_button_link['is_external'] ) ? '_blank' : '' ),
	esc_html( ( 'on' === $cta_button_link['nofollow'] ) ? 'nofollow' : '' ),
	esc_html( $cta_button_icon ),
	esc_html( $cta_button_title ),
	esc_html( $layout_style_class )
);
