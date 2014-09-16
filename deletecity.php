<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();
 
  if(isset($_GET['region_id']))
  {
	$region_id = $_GET['region_id']; // return array
	$query = mysql_query("DELETE FROM `wp_region` WHERE `region_id` = '$region_id'");
	
	if(!$query) { die(mysql_error()); }
	header("Location:wp_citys.php"); // redirent after deleting
  }
  
?>