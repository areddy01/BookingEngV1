<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();
  if(isset($_GET['ppro_id']))
  { 
  
    
	  $ppro_id = $_GET['ppro_id'];// return array
	$query = mysql_query("DELETE FROM `wp_properties` WHERE `ppro_id` = '$ppro_id'");
	$query2 = mysql_query("DELETE FROM `wp_room_type_details` WHERE `ppro_id` = '$ppro_id'");
	$query3 = mysql_query("DELETE FROM `wp_rooms` WHERE `ppro_id` = '$ppro_id'");
	$query1 = mysql_query("DELETE FROM `wp_room_inventory_grid_details` WHERE `ppro_id` = '$ppro_id'");
	if(!$query) { die(mysql_error()); }
	
	
	header("Location:propertymanager.php"); // redirent after deleting
  }
  if(isset($_GET['roomid']))
  {
	$roomid = $_GET['roomid']; // return array
	$query = mysql_query("DELETE FROM `wp_room_type_details` WHERE `roomid` = '$roomid'");
	$query3 = mysql_query("DELETE FROM `wp_rooms` WHERE `roomid` = '$roomid'");
	$query1 = mysql_query("DELETE FROM `wp_room_inventory_grid_details` WHERE `roomid` = '$roomid'");
	if(!$query) { die(mysql_error()); }
	header("Location:roomtypes.php"); // redirent after deleting
  }
   if(isset($_GET['room_id']))
  {
	$room_id = $_GET['room_id']; // return array
	$query = mysql_query("DELETE FROM `wp_rooms` WHERE `room_id` = '$room_id'");
		$query1 = mysql_query("DELETE FROM `wp_room_inventory_grid_details` WHERE `room_id` = '$room_id'");
		if(!$query) { die(mysql_error()); }
	header("Location:wp_rooms.php"); // redirent after deleting
  }
?>