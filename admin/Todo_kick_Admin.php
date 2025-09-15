<?php
/**
 * WP admin screen specific methods goes here
 *
 * @package TodoKick
 * @subpackge TodoKick/admin
 *
 * @author Junaid Bin Jaman <junaid@allnextver.com>
 * @const 2025 All Next Ver
 * @since 1.0.0
 */

namespace Todokick\Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package   Todo_Kick
 * @subpackage Todo_Kick/admin
 * @author     Your Name <email@example.com>
 */
class Todo_kick_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private string $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private string $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct(string $plugin_name, string $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @return void
     * @since    1.0.0
     *
     */
    public function enqueue_styles(): void
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/todo-kick-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @return void
     * @since    1.0.0
     */
    public function enqueue_scripts(): void
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/todo-kick-admin.js', array('jquery'), $this->version, false);

//        wp_enqueue_script(
//            'my-plugin-react',
//            plugins_url('dist/assets/index.js', __FILE__),
//            array(),
//            filemtime(plugin_dir_path(__FILE__) . 'dist/assets/index.js'),
//            true
//        );
    }
}