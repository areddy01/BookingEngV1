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
if(isset($_POST['save']))
{
  echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_inventory_grid_details  set  roomrate='$crate' where  ppro_id='$id' and roomid='$id1' and grid_date>='$fromDate' and grid_date<='$toDate'";
 
  
  $q2=mysql_query($uquery) or die(mysql_error());
   // $no=mysql_num_rows($q2);
	//echo $no;
  header('location:inventorygrid.php');
}
 if(isset($_POST['cancel']))
{
	header('location:inventorygrid.php');
}
?>
 