<?php
require_once('functions.php');
require_once('connection.php');
$user=new User();
  if(isset($_GET['uid']))
  { 
  
    
	  $user_id= $_GET['uid'];// return array
	$query = mysql_query("DELETE FROM `wp_manage_user` WHERE `id` = '$user_id '");
	
	if(!$query) { die(mysql_error()); }
	
	
	header("Location:user.php"); // redirent after deleting
  }
  ?>