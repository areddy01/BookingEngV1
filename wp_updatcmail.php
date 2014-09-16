<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(isset($_POST['cancel']))

 {   
 header('location:propertysettings.php');
 }
 
 if (isset($_POST['SUBMIT']))
  {
	   echo $ppro_id=$_POST['ppro_id'];  
	    echo $cemail=$_POST['cemail']; 
	    
	    echo $qry="UPDATE wp_properties SET conformationemail='$cemail' WHERE ppro_id='$ppro_id'";
	   
	
	$result=mysql_query($qry);
	
	
if($result){
header('location:propertysettings.php');
	}
	}