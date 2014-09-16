<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 



$email=$_REQUEST['email'];
$m=mysql_query("SELECT * FROM wp_manage_user where email='$email'");

$cnt=mysql_num_rows($m);
if($cnt)
{
echo "Email Id is Already Taken Please Use another";

}?>