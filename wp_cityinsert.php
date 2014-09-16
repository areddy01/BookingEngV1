<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
 $country=$_POST['country'];
 $region=$_POST['city'];
 $place=$_POST['place'];
 
 
 


           $quer="INSERT INTO wp_region  VALUES('', '$place','$region', '$country')";
           $qur=mysql_query($quer); 
      
       
   
             header('location:wp_citys.php');
     
 
?>