<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}
//data store in roomtype details 
if(isset($_GET['changes']))
{
  $id=$_GET['pid'];	
      $id1=$_GET['rid'];
	  $id2=$_GET['roomid'];	
   $callo=$_GET['allocation'];
    
$crate=$_GET['rate'];
 
   $cmin=$_GET['min_stay'];

  $ctext=$_GET['text'];
  $del=mysql_query("delete from wp_room_inventory_grid_details where ppro_id=$id and roomid=$id1 and room_id=$id2");
  
   $uquery="update wp_rooms set newdefaultallocation='$callo',roomrate='$crate',minstay='$cmin' where  ppro_id=$id and roomid=$id1 and room_id=$id2";
   $q2=mysql_query($uquery);
   header('location:inventorygrid.php');
}
 if(isset($_GET['cancel']))
{
	header('location:inventorygrid.php');
}
?>
 