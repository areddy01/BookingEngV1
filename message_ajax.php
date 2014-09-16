<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();

  $clickedid = $_GET['clicked'];
    
$query="UPDATE wp_messages SET readit = 1 WHERE id = '$clickedid'";
$getResults=mysql_query($query) or die(mysql_error());
$sql = mysql_query("SELECT * FROM wp_messages");
$c= mysql_query("SELECT * FROM wp_messages where readit='0'");
$r= mysql_num_rows($c);?>
  

  You have (<?php print $r ?>) Messages

