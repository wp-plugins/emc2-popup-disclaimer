<?php

/* *********************************************************************************
	EMC2 Popup Disclaimer - Add Options Page
********************************************************************************** */



add_action('admin_menu', 'emc2pdc_help_page');

function emc2pdc_help_page() {
	add_options_page("EMC2 Popup Disclaimer", "EMC2 Popup Disclaimer",1, (__FILE__), "emc2pdc_help_admin");
}

// Output settings page!
function emc2pdc_help_admin() {
	
	// Update options on save
	if( $_POST['emc2_hidden'] ){

		echo '<div id="emc2-msg" class="ok">Settings Updated!</div>';
		//echo '<pre>'.print_r($_POST, true).'</pre>';
		update_option('emc2pdc_settings', serialize($_POST) );
	} // if $_POST

	// Init newly updated settings
	if( is_string( get_option('emc2pdc_settings') ) ){
		$settings = unserialize( get_option('emc2pdc_settings') );
	} else $settings = get_option('emc2pdc_settings');

	// Begin Output!
	echo '<h1>EMC2 Popup Disclaimer</h1><h2><em style="color:#666;">Settings Page</em></h2><br />';
	echo '<div id="iframe"><h4>It would mean a lot to me if you could rate this plugin!</h4>
	<iframe src="http://wordpress.org/extend/plugins/emc2-popup-disclaimer#plugin-title" frameborder="1" width="auto" height="200" scrolling="auto">
		<a href="http://wordpress.org/extend/plugins/emc2-popup-disclaimer" target="_blank">http://wordpress.org/extend/plugins/emc2-popup-disclaimer</a>
	</iframe></div>';

	// display plugin options

?>
	<form id="emc2pdc_form" method="post" action="">

		<?php wp_nonce_field('plugin_nonce'); ?> 
        <?php find_posts_div(); ?>



        <fieldset>
            <label class="block" for="nid">Page or post nid to display in popup:</label>
            <input type="text" name="nid" width="30" value="<?php echo $settings['nid']; ?>" />
			<a class="button" onclick="findPosts.open('action','find_posts');return false;" href="#"><?php esc_attr_e('Post Search'); ?></a>

		</fieldset>
        <fieldset>
            <label class="medium" for="cexpire">Number of days to hold cookies for (0 to disable):</label>
            <input type="text" name="cexpire" width="30" value="<?php echo $settings['cexpire']; ?>" />
		</fieldset>
        <fieldset>
            <label class="medium" for="accept_text">'Accept' button text:</label>
            <input type="text" name="accept_text" width="50" value="<?php echo $settings['accept_text']; ?>" />
		</fieldset>
        <fieldset>
            <label class="medium" for="decline_text">'Decline' button text:</label>
            <input type="text" name="decline_text" width="50" value="<?php echo $settings['decline_text']; ?>" />
		</fieldset>
        <fieldset>
            <label class="medium" for="redirect_url">'Decline' redirection url:</label>
            <input type="text" name="redirect_url" width="50" value="<?php echo $settings['redirect_url']; ?>" />
		</fieldset>
        
        
		<input type="hidden" name="emc2_hidden" value="1" />
		<input type="submit" value="Save Settings" class="button" />
	</form>


<?php
	


	
	// Final Options Update
	if($_POST['emc2_hidden']){
		update_option('emc2_videos', serialize($serial));
	} // update
	
	// Add some nice footer credits :)
	add_filter('admin_footer_text', 'emc2pdc_footer_admin');
	echo '</form>';
} // emc2_help_admin


function emc2pdc_footer_admin () {
    echo 'EMC2 PDC v1.0 |  EMC2 Popup Disclaimer | Designed by <a target="_blank" href="http://emc2innovation.com">Eric McNiece</a></p>';
}

    


/* ****************************************************************
**
**	function emc2pdc_shortcode( $atts)
**
**	Removes default footer action and adds a force argument 
**	to the new action. jQuery then picks up on the force
**	and displays the popup box regardless of cookie state.
**
**	This function can also be used to force the disclaimer popup.
**
**************************************************************** */
add_shortcode('emc2pdc', 'emc2pdc_force');
function emc2pdc_force( $atts=array() ){
	extract(shortcode_atts(array(
	      'force' => '0',
     ), $atts));

		remove_action('wp_footer', 'emc2pdc_disclaimer');
		add_action('emc2pdc_footer', 'emc2pdc_disclaimer', 10, 2 );
		do_action('emc2pdc_footer', $atts, $force=3);

} // emc2pdc_shortcode;



/* ****************************************************************
**
**	function emc2pdc_disclaimer( $atts, $force)
**
**	Working output of popup variables and content. Called from 
**	emc2-popup-disclaimer.php as well. 
**
**************************************************************** */

function emc2pdc_disclaimer( $atts, $force=NULL) {
	extract(shortcode_atts(array(
	      //'force' => '0',
     ), $atts));


	$settings = unserialize(get_option('emc2pdc_settings'));	
	if( !wp_script_is('jquery') ) wp_enqueue_script('jquery', plugin_dir_url(__FILE__) . 'fancybox/jquery-1.4.3.min.js' );
	if( !wp_script_is('easing') ) wp_enqueue_script('easing', plugin_dir_url(__FILE__) . 'fancybox/fancybox/jquery.easing-1.3.pack.js', array('jquery') );
	if( !wp_script_is('fancybox') ) wp_enqueue_script('fancybox', plugin_dir_url(__FILE__) . 'fancybox/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery') );
	if( !wp_script_is('cookie') ) wp_enqueue_script('cookie', plugin_dir_url(__FILE__) . 'js/jquery.cookie.js', array('jquery') );
	if( !wp_style_is('fancybox-css') ) wp_enqueue_style('fancybox-css', plugin_dir_url(__FILE__) . 'fancybox/fancybox/jquery.fancybox-1.3.4.css' );
	if( !wp_script_is('emc2pdc') ) wp_enqueue_script('emc2pdc_js', plugin_dir_url(__FILE__) . '/js/emc2pdc.js', array('fancybox') );

	// Setup jQuery vars div
	echo '<div id="emc2pdc-vars">';
	foreach($settings as $name => $setting){
		echo '<div id="'.$name.'">'.$setting.'</div>';
	} // foreach $settings 
	
	if($force){ echo '<div id="force">1</div>'; }
	
	echo '</div>'; // #emc2pdc-vars

	echo '<div id="emc2pdc-trigger"></div>';
	echo '<div id="emc2pdc-disc-wrap"><div id="emc2pdc-disclaimer">';
	$text = wp_get_single_post($settings['nid']);
	echo apply_filters('the_content', $text->post_content);
	
	echo '<p class="linkwraps"><a class="fancybox agree" href="#">'.$settings['accept_text'].'</a> <a class="fancybox disagree" href="'.$settings['redirect_url'].'">'.$settings['decline_text'].'</a></p>';
	
	echo '</div></div>';
}
