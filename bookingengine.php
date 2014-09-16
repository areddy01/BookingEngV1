<?php
ob_start();
/*
Plugin Name: BookingEng 
Plugin URI: dev.wotusee.com?return=true
Description: bokinengine Plugin performs booking
Version: 3.8.1
Author: Automattic
Author URI: http://dev.wotusee.com
License: GPLv2 or later
*/
?><html>
<head>
</head>
<body id="mydiv">
<?php
function fitow()
 {  
 ?>
<form method="POST" name="form" id="form" action="">
<a href="javascript:document.form.submit();" onClick=""><h2 style="bgcolor:red;">BookingEngine</h2></a>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 	
wp_redirect(plugins_url('BookingEng/login.php'));
 }
?></body>
</html>