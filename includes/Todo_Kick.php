<?php
/**
 * This is the main class file of the plugin
 *
 * @package TodoKick
 * @subpackge TodoKick/includes
 *
 * @author Junaid Bin Jaman <junaid@allnextver.com>
 * @copyright 2025 All Next Ver
 * @since 1.0.0
 */

namespace TodoKick;

use TodoKick\Admin\Todo_kick_Admin;
use TodoKick\Todo_Kick_Loader;

// abort if the file is directly called
defined( 'ABSPATH' ) || exit;

class Todo_Kick {
	/**
	 * Holds the current instance of the class
	 * Used for singleton pattern
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var Todo_Kick|null
	 */
	protected static ?Todo_Kick $instance = null;

	/**
	 * Holds the action/filter hook loader class instance
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var Todo_Kick_Loader
	 */
	protected Todo_Kick_Loader $loader;

	/**
	 * The name of plugin
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected string $plugin_name;

	/**
	 * Plugin's version name
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected string $version;

	/**
	 * namespace of plugins rest api
	 *
	 * @since 1.0.0
	 * @access public static
	 * @var string
	 */
	public static string $api_namespace;

	public function __construct() {
		if ( defined( TODO_KICK_VERSION ) ) {
			$this->version = TODO_KICK_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->plugin_name = 'WP Todo Kick';
		$this->load_dependencies();
		$this->define_admin_hooks();
	}

	/**
	 * Singleton instance method
	 *
	 * @return Todo_Kick
	 */
	public static function get_instance(): Todo_Kick {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Loads the filter and actions hooks
	 *
	 * @return void
	 * @since 1.0.0
	 */
	private function load_dependencies(): void {
		$this->loader = new Todo_Kick_Loader();
	}

	/**
	 * Register all the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks(): void {
		$plugin_admin = new Todo_kick_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}

	/**
	 * Runs the filter/action hooks
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function run(): void {
		$this->loader->run();
	}

	/**
	 * Get the plugin name
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_plugin_name(): string {
		return $this->plugin_name;
	}

	/**
	 * Get the version of the plugin
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function get_version(): string {
		return $this->version;
	}

	/**
	 * Get the api namespace of the plugin
	 *
	 * @return string
	 */
	public static function get_api_namespace(): string {
		if (defined('TODO_KICK_API_NAMESPACE')) {
			self::$api_namespace = TODO_KICK_API_NAMESPACE;
		} else {
			self::$api_namespace = 'todo-kick';
		}

		return self::$api_namespace;
	}
}