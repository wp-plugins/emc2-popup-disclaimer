=== EMC2 Popup Disclaimer ===
Contributors: emcniece
Donate link: http://emc2innovation.com
Tags: disclaimer, popup, warning, terms, agreement, notify
Requires at least: 3.0.0
Tested up to: 3.3.2
Stable tag: 1.1

EMC2 Popup Disclaimer places a specified post into a lightbox and adds buttons so that your visitors must click through to agree to your terms!

== Description ==

EMC2 Popup Disclaimer uses Fancybox (http://fancybox.net) to display the popup, and jQuery-cookie (https://github.com/carhartl/jquery-cookie) to detect user session. Creates a cookie named "emc2pdc" that can be viewed with regular developer tools.

Easy to use! By default the script is added to the wp_footer action and will work quietly. You can also force the display on pages via shortcode or function call:
Shortcode: `[emc2pdc]`
 -or-
Function:  `<?php emc2pdc_force(); ?>`

To Do list:

*   Add No-JS fallback support
*   Create a selection of button themes
*   Add support for different lightbox types
*   Improve handling, add PHP cookie support

Known bugs:

*   None yet!


== Installation ==

Installation is straighforward:

1. Upload the `/emc2-popup-disclaimer/` folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure settings at `wp-admin/options-general.php?page=emc2-popup-disclaimer/emc2pdc-admin.php`

= Configuration =

EMC2 Popup Disclaimer will work straight out of the box. There's a few options available from within WordPress, and future releases will feature themeable options.

Settings can be found in these locations:
*   /wp-admin/options-general.php?page=emc2-popup-disclaimer/emc2pdc-admin.php (Default settings)
*   /wp-content/plugins/emc2-popup-disclaimer/js/emc2pdc.js (Fancybox, jQuery-cookie settings)

The settings page is straightforward except for perhaps the "Restrict operation to directory:" setting. This is the operational directory of the jQuery cookie plugin - default is '/', which is your entire site. To specify operation for a certain directory, type it here like '/store'. More jQuery-cookie settings can be found at https://github.com/carhartl/jquery-cookie.

== Frequently Asked Questions ==

= My Cufon styles aren't showing in the popup =

You can add your own callback function for the Fancybox call in /wp-content/plugins/emc2-popup-disclaimer/js/emc2pdc.js in the .fancybox() call:
[?php 'onComplete': function(){ Cufon.refresh(); } ?]

= Are you available for help? =
I might be able to help you - it totally depends on my schedule and workload. Send me an email! hello@emc2innovation.com. You could also post here on the forums.

If you want to jump the gun, make me a temporary user (with that email up there) and I will be more inclined to give you a hand. In return for my help, all I ask for is a rating! :)

== Screenshots ==

1. Dashboard view with settings.
2. Initial page view with popup display. 

== Changelog ==

= 1.0 =
* Helloooooo World.

= 1.1 =
* Fixed post display selection input
* Added screenshots
* Set up demo site: http://popup.emc2innovation.com
* Admin styles
* Shortcode support
* Function call support


