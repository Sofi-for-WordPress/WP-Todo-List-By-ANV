<?php
/**
 * The class bellow fires during plugin deactivation
 *
 * @package TodoKick
 * @subpackage TodoKick/includes
 *
 * @author Junaid Bin Jaman <junaid@allnextver.com>
 * @copyright 2025 All Next Ver
 * @since 1.0.0
 */

namespace TodoKick;

// If the file is called directly, abort.
defined('ABSPATH') || exit;

/**
 * The class runs during plugin deactivation
 *
 * @subpackage TodoKick/includes
 * @author junaid Bin Jaman <junaid@allnextver.com>
 * @since 1.0.0
 */
class Todo_Kick_Deactivator {
	/**
	 * The method that's called from the plugin's bootstrap file
	 *
	 * @return void
	 */
	public static function deactivator() {
		//
	}
}