<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpamitkumar.com/
 * @since      1.0.0
 *
 * @package    Demo_Plugin
 */

$bbm_layout_style = is_blank_string( $settings->bbm_layout_style, 'layout-style-1' );

$bbm_title       = is_blank_string( $settings->bbm_title, '' );
$bbm_description = is_blank_string( $settings->bbm_description, '' );

$bbm_button_icon   = 'fa fa-paper-plane';
$bbm_button_text   = is_blank_string( $settings->bbm_button_text, '' );
$bbm_link          = is_blank_string( $settings->bbm_link, '' );
$bbm_link_target   = is_blank_string( $settings->bbm_link_target, '' );
$bbm_link_nofollow = is_blank_string( $settings->bbm_link_nofollow, '' );


if ( 'layout-style-2' === $bbm_layout_style ) {
	$layout_style_class = 'layout-style-2';
} else {
	$layout_style_class = 'layout-style-1';
}

$cta_html = '<div class="fl-node-%1$s">
				<div class="demo-call-to-action-box">
					<div class="demo-call-to-action-widget %9$s">
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
					</div>
				</div>
			</div>';

echo sprintf(
	wp_kses_post( $cta_html ),
	esc_html( $id ),
	esc_html( $bbm_title ),
	wp_kses_post( $bbm_description ),
	esc_attr( $bbm_link ),
	esc_html( ( '_blank' === $bbm_link_target ) ? '_blank' : '' ),
	esc_html( ( 'yes' === $bbm_link_nofollow ) ? 'nofollow' : '' ),
	esc_html( $bbm_button_icon ),
	esc_html( $bbm_button_text ),
	esc_html( $layout_style_class )
);

