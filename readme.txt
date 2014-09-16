

Plugin Name: Bookingengine 
Plugin URI: 
Description: bokinengine Plugin performs fitow admin management
Version: 2.3
Author: 




== Installation ==

The automatic plugin installer should work for most people. Manual installation is easy and takes fewer than five minutes.

1. Unpack it and upload the '<em>wordpress-login-box</em>' folder to your wp-content/plugins directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

3. Paste the following code in the location you want the box to appear in (most of the times this is header.php). Then refresh the page and you're done! Enjoy!
`
<?php
	if(function_exists('fitow')) {
		fitow();
	}
?>