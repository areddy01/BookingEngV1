<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();
  if(isset($_GET['city_id']))
  { 
  
    
	  $city_id = $_GET['city_id'];// return array
	$query = mysql_query("DELETE FROM `wp_citys` WHERE `city_id` = '$city_id'");
	$query2 = mysql_query("DELETE FROM `wp_region` WHERE `city_id` = '$city_id'");
	
	if(!$query) { die(mysql_error()); }
	
	
	header("Location:regions.php"); // redirent after deleting
  }
  if(isset($_GET['region_id']))
  {
	$region_id = $_GET['region_id']; // return array
	$query = mysql_query("DELETE FROM `wp_region` WHERE `region_id` = '$region_id'");
	
	if(!$query) { die(mysql_error()); }
	header("Location:regions.php"); // redirent after deleting
  }
  
?>