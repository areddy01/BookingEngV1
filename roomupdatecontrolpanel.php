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
	
	$status=$_POST['check'];
	$enquiry=$_POST['enquiry'];
	if($status=='sold')
	{
	echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  echo   $id2=$_POST['room_id'];	
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_room_inventory_grid_details  set  newstop_sell='$status' where  ppro_id='$id' and room_id='$id2' and roomid='$id1' and newgrid_date>='$fromDate' and newgrid_date<='$toDate'";
 
  
  $q2=mysql_query($uquery) or die(mysql_error());
	}else{
	echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  echo   $id2=$_POST['room_id'];	
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_room_inventory_grid_details  set  newstop_sell='$status' where  ppro_id='$id' and room_id='$id2' and roomid='$id1' and newgrid_date>='$fromDate' and newgrid_date<='$toDate'";
 
  
  $q2=mysql_query($uquery) or die(mysql_error());
	
	
	}
	
	
	if($enquiry == 'enquiry')
	{
	echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  echo   $id2=$_POST['room_id'];	
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_room_inventory_grid_details  set  flag='$enquiry' where  ppro_id='$id' and room_id='$id2' and roomid='$id1' and newgrid_date>='$fromDate' and newgrid_date<='$toDate'";
 
  
  $q2=mysql_query($uquery) or die(mysql_error());
	}else{
	$enquiry='availability';
	echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  echo   $id2=$_POST['room_id'];	
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_room_inventory_grid_details  set  flag='$enquiry' where  ppro_id='$id' and room_id='$id2' and roomid='$id1' and newgrid_date>='$fromDate' and newgrid_date<='$toDate'";
 
  
  $q2=mysql_query($uquery) or die(mysql_error());
	
	}
	
	
  echo $id=$_POST['pid'];	
    echo   $id1=$_POST['rid'];	
  echo   $id2=$_POST['room_id'];	
    
echo $crate=$_POST['roomrate'];
 
   echo $fromDate=$_POST['fromDate'];
    echo $toDate=$_POST['toDate'];
    echo $uquery="update wp_room_inventory_grid_details  set  newroomrate='$crate' where  ppro_id='$id' and room_id='$id2' and roomid='$id1' and newgrid_date>='$fromDate' and newgrid_date<='$toDate'";
 
  
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
 