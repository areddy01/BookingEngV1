<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(isset($_POST['SUBMIT']))
{
	$id=$_POST['ppro_id'];
	$user=$_POST['user'];
		$rid=$_POST['roomid'];
		$userid=$_POST['userid'];
	$var1=$_POST['name'];
	$var2=$_POST['Default1'];
	$r_id=$_POST['room_id'];
	$var5=$_POST['minstay'];
	
	$var13=$_SESSION['sele'];
	
    $var6=$_POST['rate'];
	$var7=$_POST['allocation'];
	$var8=$_POST['rackrate'];
	$terms=$_POST['t'];
	 $url=$_POST['viewroom'];
		$maxpersons=$_POST['maxpersons'];
		$show=$_POST['show'];
	 $sql1="UPDATE wp_rooms SET roomname='$var1',roomdes='$var2',minstay='$var5',roomrate='$var6', maxpersons='$maxpersons',rackrate='$var8',terms='$terms',link='$url',showroom='$show' WHERE room_id='$r_id'";
	 echo $sql1;
	mysql_query($sql1) or die("My sql Error");
	
	
	echo $inv=mysql_query("UPDATE wp_room_inventory_grid_details SET showroom='$show' WHERE ppro_id='$id' and roomid='$rid' and room_id='$r_id'");
	
	
	header('location:wp_rooms.php?id='.$id.'&rid='.$rid);
	
}
?>