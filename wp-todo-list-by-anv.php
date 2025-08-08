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
 * @package           Wp_Todo_List_By_Anv
 *
 * @wordpress-plugin
 * Plugin Name:       WP Todo List By ANV
 * Plugin URI:        https://allnextver.com/wp-todo-list-by-anv
 * Description:       A lightweight WordPress plugin that adds a simple To-Do List widget to your admin dashboard. Easily manage daily tasks, keep track of reminders, and stay organized without leaving your WordPress panel.
 * Version:           1.0.0
 * Author:            Junaid Bin Jaman
 * Author URI:        https://https://allnextver.expert/our-experts/junaid-bin-jaman//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_todo_list_by_anv
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
define( 'WP_TODO_LIST_BY_ANV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-todo-list-by-anv-activator.php
 */
function activate_wp_todo_list_by_anv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-todo-list-by-anv-activator.php';
	Wp_Todo_List_By_Anv_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-todo-list-by-anv-deactivator.php
 */
function deactivate_wp_todo_list_by_anv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-todo-list-by-anv-deactivator.php';
	Wp_Todo_List_By_Anv_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_todo_list_by_anv' );
register_deactivation_hook( __FILE__, 'deactivate_wp_todo_list_by_anv' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-todo-list-by-anv.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_todo_list_by_anv() {
	Wp_Todo_List_By_Anv::get_instance()->run();
}
run_wp_todo_list_by_anv();
