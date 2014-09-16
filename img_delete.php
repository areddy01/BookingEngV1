<?php 
ob_start();
@session_start();
$mid=$_REQUEST['imgid'];

require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}
 $query = mysql_query("DELETE FROM `wp_images` WHERE `img_id` = '$mid'")or die(mysql_error());
		
	header("Location: imgupload.php"); // redirent after deleting
     
          ?>