=== EMC2 Popup Disclaimer ===
Contributors: emcniece
Donate link: http://emc2innovation.com
Tags: video, help, dashboard, client, developer
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 1.0

EMC2 Popup Disclaimer places a specified post into a lightbox and adds buttons so that your visitors must click through to agree to your terms!

== Description ==


EMC2 Popup Disclaimer uses Fancybox (http://fancybox.net) to display the popup, and jQuery-cookie (https://github.com/carhartl/jquery-cookie) to detect user session. Creates a cookie named "emc2pdc" that can be viewed with regular developer tools.

To Do list:

*   Add No-JS fallback support
*   Create a selection of button themes
*   Add support for different lightbox types
*   Better post-grabber dialog
*   Shortcode support
*   Function call support
*   Demo website

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

= I'm having trouble =

Send me an email! hello@emc2innovation.com. You could also post here on the forums.

== Screenshots ==

1. Dashboard view with themed widget.
2. Settings page with demo server and first video expanded. 

== Changelog ==

= 1.0 =
* Helloooooo World.

