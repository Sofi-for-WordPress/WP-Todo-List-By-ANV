<?php
/**
 * TodoKick
 *
 * @package           TodoKick
 * @author            Junaid Bin Jaman
 * @copyright         2025 All Next Ver
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Todo Kick
 * Plugin URI:        https://allnextver.com/todo-kick
 * Description:       A lightweight WordPress plugin that adds a custom dashboard widget and an admin page featuring a Kanban-style board. It allows you to create, manage, and track to-do tasks with different statuses directly from the WordPress admin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Junaid Bin Jaman
 * Author URI:        https://allnextver.expert/junaidbinjaman
 * Text Domain:       todo_kick
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://allnextver.com/todo-kick
 */

use TodoKick\Todo_Kick;
use TodoKick\Todo_Kick_Activator;
use TodoKick\Todo_Kick_Deactivator;

// if the file is called directly, abort
defined( 'ABSPATH' ) || exit;

// Include the autoloader file
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Current plugin version
 * Starts at 1.0.0. Follows SemVer - https://semver.org
 * Update the version number as you release new version
 */
const TODO_KICK_VERSION = '1.0.0';

/**
 * Rest api namespace for this plugin.
 */
const TODO_KICK_API_NAMESPACE = 'todo-kick';


/**
 * The function runs during activation
 *
 * @return void
 */
function activate_todo_kick(): void {
	Todo_Kick_Activator::activator();
}

/**
 * The function runs during deactivation
 *
 * @return void
 */
function deactivate_todo_kick(): void {
	Todo_Kick_Deactivator::deactivator();
}

register_activation_hook( __FILE__, 'activate_todo_kick' );
register_deactivation_hook( __FILE__, 'deactivate_todo_kick' );

/**
 * The plugin runs the TodoKick plugin
 *
 * @return void
 */
function run_todo_kick_plugin(): void {
	Todo_Kick::get_instance()->run();
}

add_action( 'plugins_loaded', 'run_todo_kick_plugin' );
