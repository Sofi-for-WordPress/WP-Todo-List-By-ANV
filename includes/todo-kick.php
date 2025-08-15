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
}