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

if(isset($_POST['Staypays']))
 {
   //$ar1=$_REQUEST['hide'];
   $ar1=$_POST['hide'];
   echo $ar1;
   //$count1=count($_REQUEST['hide']);
   //echo $count1;
  //for($i=0;$i<=$count1;$i++)
 // {
      $ar=$ar1[$i];
      //echo $ar;?>
   
   <!--Room Type StayPay for:-->
   <?php 
 // }
   //echo $ar;
 }?>
