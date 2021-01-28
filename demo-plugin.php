<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpamitkumar.com/
 * @since             1.0.0
 * @package           Demo_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Demo Plugin
 * Plugin URI:        https://www.test.com/
 * Description:       demo plugin for WordPress.
 * Version: 1.0.0
 * Author:            Amit Dudhat
 * Author URI:        https://wpamitkumar.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       demo-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DEMO_PLUGIN_VERSION', '1.0.0' );
define( 'DEMO_PLUGIN_FILE', __FILE__ );
define( 'DEMO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'DEMO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-demo-plugin-activator.php
 */
function activate_demo_plugin() {
	require_once DEMO_PLUGIN_PATH . 'includes/class-demo-plugin-activator.php';
	Demo_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-demo-plugin-deactivator.php
 */
function deactivate_demo_plugin() {
	require_once DEMO_PLUGIN_PATH . 'includes/class-demo-plugin-deactivator.php';
	Demo_Plugin_Deactivator::deactivate();
}

register_activation_hook( DEMO_PLUGIN_FILE, 'activate_demo_plugin' );
register_deactivation_hook( DEMO_PLUGIN_FILE, 'deactivate_demo_plugin' );

/**
 * Check the string is blank.
 *
 * @since 1.0.0
 * @param string $string        Pass String.
 * @param string $default_value Pass return string value if is blank, Default value is blank string.
 */
function is_blank_string( $string, $default_value = '' ) {
	return ( $string ) ? ( $string ) : $default_value;
}

/**
 * Check for the Compatibility.
 */
if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
	/**
	 * Display admin notice for PHP version less than 5.6.
	 *
	 * @since 1.0.0
	 */
	add_action( 'admin_notices', 'demo_plugin_notice_php_version' );
} elseif ( ! version_compare( get_bloginfo( 'version' ), '5.0', '>=' ) ) {
	/**
	 * Display admin notice for WordPress version less than 5.0
	 *
	 * @since 1.0.0
	 */
	add_action( 'admin_notices', 'demo_plugin_notice_wp_version' );
} else {
	/**
	 * Load the plugin.php file to run the plugin.
	 *
	 * @since 1.0.0
	 */
	require DEMO_PLUGIN_PATH . 'includes/class-demo-plugin.php';
	run_demo_plugin();
}

/**
 * Shows Admin Notice for PHP compatibility.
 *
 * Function is used when the installed PHP is incompatible with the plugin to
 * show an Admin Notice informing the user that the PHP version is incompatible
 * with the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function demo_plugin_notice_php_version() {
	/* translators: %s: PHP version */
	$message      = sprintf( esc_html__( 'Demo Plugin requires PHP version %s+, plugin is currently NOT RUNNING.', 'demo-plugin' ), '5.6' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}

/**
 * Shows admin notice for minimum WordPress version.
 *
 * Warning when the site doesn't have the minimum required WordPress version.
 *
 * @since 1.0.0
 *
 * @return void
 */
function demo_plugin_notice_wp_version() {
	/* translators: %s: WordPress version */
	$message      = sprintf( esc_html__( 'Demo Plugin requires WordPress version %s+. Because you are using an earlier version, the plugin is currently NOT RUNNING.', 'demo-plugin' ), '5.0' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_demo_plugin() {

	$plugin = new Demo_Plugin();
	$plugin->run();

}
