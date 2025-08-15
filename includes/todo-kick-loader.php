<?php
/**
 * The action/filter hooks loader
 *
 * @package    TodoLKick
 * @subpackage TodoLKick/includes
 *
 * @author    Junaid Bin Jaman <junaid@allnextver.com>
 * @copyright 2025 All Next Ver
 * @since     1.0.0
 */

namespace TodoKick;

defined( 'ABSPATH' ) || exit;

/**
 * Action and filter hooks loader class
 *
 * @subpackge TodoKick/includes
 * @author    Junaid Bin Jaman <junaid@allnextver.com>
 * @since     1.0.0
 */
class Todo_Kick_Loader {
	/**
	 * An array of all action hooks
	 *
	 * @var array
	 * @access private;
	 * @since 1.0.0
	 */
	private array $actions;

	/**
	 * An array of all filters hooks
	 *
	 * @var array
	 * @access private;
	 * @since 1.0.0
	 */
	private array $filters;

	public function __construct() {
		$this->actions = array();
		$this->filters = array();
	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @param string $hook
	 * @param object $component
	 * @param string $callback
	 * @param int $priority
	 * @param int $args
	 *
	 * @return void
	 */
	public function add_action( string $hook, object $component, string $callback, int $priority = 10, int $args = 1 ): void {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @param string $hook
	 * @param object $component
	 * @param string $callback
	 * @param int $priority
	 * @param int $args
	 *
	 * @return void
	 */
	public function add_filter( string $hook, object $component, string $callback, int $priority = 10, int $args = 1 ): void {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @param array $hooks The collection of hooks that is being registered (that is, actions or filters).
	 * @param string $hook The name of the WordPress filter that is being registered.
	 * @param object $component A reference to the instance of the object on which the filter is defined.
	 * @param string $callback The name of the function definition on the $component.
	 * @param int $priority The priority at which the function should be fired.
	 * @param int $args The number of arguments that should be passed to the $callback.
	 *
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 * @since    1.0.0
	 * @access   private
	 */
	private function add( array $hooks, string $hook, object $component, string $callback, int $priority, int $args ) {
		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $args
		);

		return $hooks;
	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run(): void {
		foreach ( $this->actions as $hook ) {
			add_filter( $hook['hook'], array(
				$hook['component'],
				$hook['callback']
			), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array(
				$hook['component'],
				$hook['callback']
			), $hook['priority'], $hook['accepted_args'] );
		}
	}
}
