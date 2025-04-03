<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://allnextver.expert/our-experts/junaid-bin-jaman/
 * @since      1.0.0
 *
 * @package    Todo_Kick
 * @subpackage Todo_Kick/includes
 */

namespace Todo_Kick;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Todo_Kick
 * @subpackage Todo_Kick/includes
 * @author     Junaid Bin Jaman <junaid@allnextver.com>
 */
class Todo_Kick_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain(): void {

		load_plugin_textdomain(
			'todo-kick',
			false,
			dirname( plugin_basename( __FILE__ ), 2 ) . '/languages/'
		);

	}



}
