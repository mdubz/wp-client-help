<?php 
/*
Plugin Name: WP Client Help
Plugin URI: http://ilocalbusiness.net
Description: WordPress Tutorials inside WordPress Dashboard
Author: Mikal W.
Version: 1.0
Author URI: http://ilocalbusiness.net
License: GPL2
	Copyright 2014  Mikal W.  (email : mawhite@ilocalbusiness.net)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Die if called directly in the browser
if (! defined( 'WPINC' )) {
echo "ERROR DO NOT CALL DIRECTLY";
	die;
}
// Load the WPHelp Class
require_once plugin_dir_path( __FILE__ ) . '/includes/class-wphelp.php';

function run_wphelp(){
	// instanstiate the WPHelp Class and call the run method to start the plugin
	$wphelp = new WPHelp();
	$wphelp->run();
}
run_wphelp(); // start the plugin 