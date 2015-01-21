<?php
/**
 * WPHelp_Loader class.
 * Responsible for coordinating actions between WPHelp Class and the WPHelp_Admin Class.
 * acts as a wrapper to the wordpress API.
 * @package WPHELP
 */
class WPHelp_Loader {
	/**
	 * actions member for adding hook, components, and callbacks to the Wordpress API add_action function
	 * @var mixed
	 * @access protected
	 */
	protected $actions;
	protected $filters;
	
	/**
     * Instantiates the plugin by setting up the data structures that will
     * be used to maintain the actions.
     */
	public function __construct(){
		$this->actions = array();
		$this->filters = array();
	}
    /**
     * Registers the actions with WordPress and the respective objects and
     * their methods.
     *
     * @param  string    $hook        The name of the WordPress hook to which we're registering a callback.
     * @param  object    $component   The object that contains the method to be called when the hook is fired.
     * @param  string    $callback    The function that resides on the specified component.
     */
    public function add_action($hook, $component, $callback ) {
		$this->actions = $this->add($this->actions, $hook, $component, $callback);
	}
	/**
     * Registers the filters with WordPress and the respective objects and
     * their methods.
     *
     * @param  string    $hook        The name of the WordPress hook to which we're registering a callback.
     * @param  object    $component   The object that contains the method to be called when the hook is fired.
     * @param  string    $callback    The function that resides on the specified component.
     */
	public function add_filter( $hook, $component, $callback ) {
		$this->filters = $this->add($this->filters, $hook, $component, $callback);
	}
	/**
	* @return array                  The collection of hooks that are registered with WordPress via this class.
	* @access private
     *
     * @param  array     $hooks       The collection of existing hooks to add to the collection of hooks.
     * @param  string    $hook        The name of the WordPress hook to which we're registering a callback.
     * @param  object    $component   The object that contains the method to be called when the hook is fired.
     * @param  string    $callback    The function that resides on the specified component.
	*/
	// Used to add the hook to the proper array
	private function add($hooks, $hook, $component, $callback){
		$hooks[] = array(
			'hook'				=>	$hook,
			'component'	=>	$component,
			'callback'			=>	$callback
			);
			return $hooks;
	}
	// Wire up all of the defined filters and actions and register our functions with WordPress API add_action
	public function run() {
		
		foreach( $this->actions as $hook ) {
			add_action($hook['hook'], 
														array ( $hook['component'], $hook['callback'] ) );				
		}
		
		foreach ( $this->filters as $hook ) {
			add_filter($hook['hook'],
														array( $hook['component'], $hook['callback'] ) );
		}
	}//end function
}	//end class