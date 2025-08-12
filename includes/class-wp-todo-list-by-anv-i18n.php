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
 * @package    Wp_Todo_List_By_Anv
 * @subpackage Wp_Todo_List_By_Anv/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Todo_List_By_Anv
 * @subpackage Wp_Todo_List_By_Anv/includes
 * @author     Junaid Bin Jaman <junaid@allnextver.com>
 */
class Wp_Todo_List_By_Anv_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-todo-list-by-anv',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
