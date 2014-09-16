<?php
@session_start();
require_once('functions.php');
require_once('connection.php');
$user=new User(); 

if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}


$sele=$_SESSION['sele'];
$book_id=$_REQUEST['bookid'];
if($book_id){
echo "delete from wp_userforms where book_id='$book_id'";
echo "delete from wp_general_settings where book_id='$book_id'";

$d1=mysql_query("delete from wp_userforms where book_id='$book_id'");
$d2=mysql_query("delete from wp_general_settings where book_id='$book_id'");
if($d1 && $d2){
header('location:settings.php');
}
}

?>