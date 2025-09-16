<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://allnextver.expert/our-experts/junaid-bin-jaman/
 * @since      1.0.0
 *
 * @package    Todo_Kick
 * @subpackage Todo_Kick/includes
 */

namespace Todo_Kick;

/**
 * The class responsible for orchestrating the actions and filters of the
 * core plugin.
 */

use Todo_Kick\Todo_Kick_Loader;

/**
 * The class responsible for defining internationalization functionality
 * of the plugin.
 */

use Todo_Kick\Todo_Kick_i18n;

/**
 * The class responsible for defining all actions that occur in the admin area.
 */

use Todo_Kick\Admin\Todo_Kick_Admin;

/**
 * The class responsible for defining all actions that occur in the public-facing
 * side of the site.
 */

use Todo_Kick\Public\Todo_Kick_Public;

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
 * @package    Todo_Kick
 * @subpackage Todo_Kick/includes
 * @author     Junaid Bin Jaman <junaid@allnextver.com>
 */
class Todo_Kick {

	/**
	 * Instance the core plugin class.
	 * Used for singleton pattern implementation.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var Todo_Kick | null
	 */
	private static ?Todo_Kick $instance = null;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Todo_Kick_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected Todo_Kick_Loader $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected string $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected string $version;

	/**
	 * Rest api namespace for the plugin
	 *
	 * @since 1.0.0;
	 * @access protected
	 * @var string
	 */
	protected static string $rest_api_namespace;

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
		if ( defined( 'TODO_KICK_VERSION' ) ) {
			$this->version = TODO_KICK_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'todo-kick';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Get the current instance of the class
	 *
	 * @return Todo_Kick
	 * @since 1.0.0
	 * @access public
	 */
	public static function get_instance(): Todo_Kick {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Returns the namespace for rest api
	 *
	 * @return string
	 * @since 1.0.0
	 * @access public
	 */
	public static function get_rest_api_namespace(): string {
		if ( ! defined( TODO_KICK_REST_API_NAMESPACE ) ) {
			define( 'TODO_KICK_REST_API_NAMESPACE', 'todo-kick' );
		}

		self::$rest_api_namespace = TODO_KICK_REST_API_NAMESPACE;

		return self::$rest_api_namespace;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Todo_Kick_Loader. Orchestrates the hooks of the plugin.
	 * - Todo_Kick_i18n. Defines internationalization functionality.
	 * - Todo_Kick_Admin. Defines all hooks for the admin area.
	 * - Todo_Kick_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies(): void {

		$this->loader = new Todo_Kick_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Todo_Kick_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale(): void {

		$plugin_i18n = new Todo_Kick_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks(): void {

		$plugin_admin = new Todo_Kick_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks(): void {

		$plugin_public = new Todo_Kick_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run(): void {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 * @since     1.0.0
	 */
	public function get_plugin_name(): string {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    Todo_Kick_Loader    Orchestrates the hooks of the plugin.
	 * @since     1.0.0
	 */
	public function get_loader(): Todo_Kick_Loader {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.0.0
	 */
	public function get_version(): string {
		return $this->version;
	}

}
