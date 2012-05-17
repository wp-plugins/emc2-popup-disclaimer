<?php
/*
Plugin Name: EMC2 Popup Disclaimer 
Plugin URI: http://emc2innovation.com/
Description: Adds a popup Disclaimer for users
Version: 1.0
Author: Eric McNiece
Author URI: http://emc2innovation.com
License: GPL

*/

include('emc2pdc-admin.php');

wp_enqueue_style('emc2pdc_css', plugin_dir_url(__FILE__) . 'emc2pdc.css');



// Plugin installer!
register_activation_hook(__FILE__,'emc2pdc_install');
function emc2pdc_install () {

	// Initial Settings
	$settings = serialize( array(
		'nid'=>1,
		'cexpire' => 1,
		'accept_text' => 'Accept',
		'decline_text' => 'Decline',
		'redirect_url' => 'http://google.ca',
	));
	
	update_option('emc2pdc_settings', $settings);

}

// Plugin uninstall!
register_uninstall_hook(__FILE__, 'emc2pdc_uninstall');
function emc2pdc_uninstall(){

	delete_option('emc2pdc_settings');
	
}

// Run when plugin inits (each page view)
add_action('init','emc2pdc_functions');
function emc2pdc_functions()
{
	$settings = unserialize(get_option('emc2pdc_settings'));

	// Add popup disclaimer to footer
	add_action('wp_footer', 'emc2pdc_disclaimer');

}



// Add admin scripts and styles
add_action("admin_print_styles", 'plugin_admin_styles' );
function plugin_admin_styles() {
	wp_enqueue_style('thickbox'); // needed for find posts div
	
}

add_action("admin_print_scripts", 'plugin_admin_scripts' );
function plugin_admin_scripts() {
	wp_enqueue_script('thickbox'); // needed for find posts div
	wp_enqueue_script('media');
	wp_enqueue_script('wp-ajax-response');
}