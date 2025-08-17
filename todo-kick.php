<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://allnextver.expert/our-experts/junaid-bin-jaman/
 * @since             1.0.0
 * @package           Todo_Kick
 *
 * @wordpress-plugin
 * Plugin Name:       Todo Kick
 * Plugin URI:        https://allnextver.com/todo-kick
 * Description:       A lightweight WordPress plugin that adds a simple To-Do List widget to your admin dashboard. Easily manage daily tasks, keep track of reminders, and stay organized without leaving your WordPress panel.
 * Version:           1.0.0
 * Author:            Junaid Bin Jaman
 * Author URI:        https://https://allnextver.expert/our-experts/junaid-bin-jaman//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       todo-kick
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
define( 'TODO_KICK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-todo-kick-activator.php
 */
function activate_todo_kick() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-todo-kick-activator.php';
	Todo_Kick_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-todo-kick-deactivator.php
 */
function deactivate_todo_kick() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-todo-kick-deactivator.php';
	Todo_Kick_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_todo_kick' );
register_deactivation_hook( __FILE__, 'deactivate_todo_kick' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-todo-kick.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_todo_kick() {

	$plugin = new Todo_Kick();
	$plugin->run();

}
run_todo_kick();
