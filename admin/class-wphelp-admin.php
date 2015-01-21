<?php
/**
 * WPHelp_Admin class. Responsible for loading CSS Stylesheets and the Help Video page.
 */
class WPHelp_Admin {
	/**
	 * version used to track the version of the plugin. Value is passed to constructur and used
	 * to ensure including the most recent version of the plugin.
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $version;
	
	public function __construct ($version) {
		$this->version = $version;
	}
	// Loads up the style sheets using wp_enqueue_style wordpress function
	public function enqueue_styles() {
		wp_enqueue_style(
			'wphelp-admin',
			plugin_dir_url(__FILE__) . 'styles/wphelp.css',
			array(),
			$this->version,
			FALSE
			);
	}
	// Creates the Help page menu item in the Wordpress Navigation
	public function load_options() {
		add_menu_page('Help', 'Help', 'administrator', __FILE__, array(&$this, 'add_admin_page'));
			
	}
	// Used to call the admin view partial html/php page.
	public function add_admin_page() {
		require_once 'views/partials-wphelp.php';
	}
} // end class