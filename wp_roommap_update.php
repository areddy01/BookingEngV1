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
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
} 
if($_SERVER["REQUEST_METHOD"] == "POST")
                  {
                   $id=$_REQUEST['hide'];
                   echo $id."<br>";
                   $uover=$_POST['over'];
                   echo $uover."<br>"; 
                   $uorder=$_POST['order'];
                   echo $uorder;
                   
                    
                       $up="update wp_room_mapping set rdata='$uover',ordering='$uorder' where addid='$id'";
                     mysql_query($up);
                    
                       header("location:allmappings.php");  
                   
                  }
            ?>
