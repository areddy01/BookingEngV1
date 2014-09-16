
<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 



$user=$_REQUEST['user'];
$m=mysql_query("SELECT * FROM wp_manage_user where username='$user'");

$cnt=mysql_num_rows($m);
if($cnt)
{
echo "Username Already Taken Please Use another";

}