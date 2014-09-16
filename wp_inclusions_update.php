<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$sele=$_SESSION['sele'];

if(isset($_POST['SUBMIT']))
	{
		
		$ary1=$_REQUEST['new_quantity'];
		$count=count($_REQUEST['new_quantity']);
		$ary2=$_REQUEST['text'];
		$channelid=$_REQUEST['channelid'];
		
		for($i=0;$i<$count;$i++)
	{
		$id1=$ary1[$i];
		$ar2=$ary2[$i];
		$ar3=$channelid[$i];
		
      $update="UPDATE wp_room_type_details SET description='$ar2' WHERE roomid='$id1' AND chanel_id='$ar3'";
	
	  $updateqery=mysql_query($update);
	  	} 
	
	header('location:inclusions.php');
	}
	?>