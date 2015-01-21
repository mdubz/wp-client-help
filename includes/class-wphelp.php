<?php
/**
 * WPHelp class loads the WPHelp_Loader and WPhelp_Admin classes
 * and kicks off starting the plugin by adding our functions to Wordpress using API add_action function.
 */
class WPHelp {
	/**
	 * loader
	 * a reference to the loader class that coordinate all of the hooks and
	 * callbacks thoughout the plugin.
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $loader;	
	/**
	 * plugin_slug
	 * plugin slug used for internalionalization purposes and as an unique identifier.
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $plugin_slug;	
	/**
	 * version 
	 * used to track the version of the plugin. Value is passed to constructur and used
	 * to ensure including the most recent version of the plugin.
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $version;
	/**
     * Instantiates the plugin by setting up the data structures and
     * running the two private methods to start the plugin.
     */
	public function __construct (){
		$this->plugin_slug = 'wphelp-slug';
		$this->version = '1.0';
		
		$this->load_dependencies();
		$this->define_admin_hooks();
		
	}
	/**
     * Loads the WPHelp_Admin and WPHelp_Loader classes
     * and Instantiates the WPHelp_Loader class.
     */
	private function load_dependencies (){
		require_once plugin_dir_path ( dirname(__FILE__)) . 'admin/class-wphelp-admin.php';
		require_once plugin_dir_path ( dirname(__FILE__)) . 'includes/class-wphelp-loader.php';
		$this->loader = new WPHelp_Loader();
	}
	/**
	/ Instantiates the WPHelp_Admin Class, loads the version. Loads in the hook, component
	/ and callback wordpress structures for the style sheet and Help Page into the WPHelp_Loader 
	/ Class add_action Method. 
	*/
	private function define_admin_hooks(){
		$admin = new WPHelp_Admin ( $this->get_version() );
		$this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_styles'); // load stylesheets
		$this->loader->add_action( 'admin_menu', $admin, 'load_options'); // add Help Page & Menu item
	}
	/**
	* run the WPHelp_Loader Class run() method to start adding
	* the wordpress structures into the wordpress API add_action() function
	* so we can register our methods/functions.
	*/
	public function run(){
		$this->loader->run();
	}
	/**
	* Get the version of the plugin
	*/
	public function get_version(){
		return $this->version;
	}
}//end class