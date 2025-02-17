<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://wpamitkumar.com/
 * @since      1.0.0
 *
 * @package    Demo_Plugin
 * @subpackage Demo_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Demo_Plugin
 * @subpackage Demo_Plugin/includes
 * @author     Amit Dudhat <hello@wpamitkumar.com>
 */
class Demo_Plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Demo_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'DEMO_PLUGIN_VERSION' ) ) {
			$this->version = DEMO_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'demo-plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		$this->init_beaver_module();
		$this->init_elementor_widget();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Demo_Plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Demo_Plugin_i18n. Defines internationalization functionality.
	 * - Demo_Plugin_Admin. Defines all hooks for the admin area.
	 * - Demo_Plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once DEMO_PLUGIN_PATH . 'includes/class-demo-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once DEMO_PLUGIN_PATH . 'includes/class-demo-plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once DEMO_PLUGIN_PATH . 'admin/class-demo-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once DEMO_PLUGIN_PATH . 'public/class-demo-plugin-public.php';

		$this->loader = new Demo_Plugin_Loader();

	}

	/**
	 * Intialization Beaver Module.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function init_beaver_module() {
		$this->loader->add_action( 'init', $this, 'load_beaver_module', 5 );
	}

	/**
	 * Load Beaver Module.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function load_beaver_module() {
		if ( class_exists( 'FLBuilder' ) ) {
			require DEMO_PLUGIN_PATH . 'page-builders/beaver/class-module-call-to-action.php';
		}
	}

	/**
	 * Intialization elementor widget.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function init_elementor_widget() {
		$this->loader->add_action( 'elementor/init', $this, 'init_elementor_category' );
		$this->loader->add_action( 'elementor/widgets/widgets_registered', $this, 'load_elementor_widget' );
	}

	/**
	 * Init Elementor Category Section.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_elementor_category() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'demo-call-to-action-widget',
			array(
				'title' => __( 'Call to Actions', 'demo-plugin' ),
				'icon'  => 'fa fa-external-link-alt',
			)
		);
	}

	/**
	 * Loads Elementor widget.
	 *
	 * @return void
	 */
	public function load_elementor_widget() {
		$this->include_widget_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CallToAction\Call_To_Action_Widget() );
	}

	/**
	 * Include Widget Files.
	 *
	 * Includes the widget files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function include_widget_files() {
		require_once DEMO_PLUGIN_PATH . 'page-builders/elementor/class-call-to-action-widget.php';
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Demo_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Demo_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Demo_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'demo_plugin_option_menu' );
		$this->loader->add_action( 'init', $plugin_admin, 'demo_plugin_register_settings' );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Demo_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Demo_Plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
