<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(isset($_POST['SUBMIT']))
{
 $user=$_POST['user'];
	 $var3=$_POST['ppro_id'];
	 $var4=$_POST['roomid'];
	 $var1=$_POST['name'];
 $var2=$_POST['Default1'];
	 $var13=$_SESSION['sele'];
	$var5=$_POST['minstay'];
	$var8=$_POST['rackrate'];
	$var6=$_POST['rate'];
	$var7=$_POST['allocation'];
	$maxpersons=$_POST['maxpersons'];
    $terms=$_POST['t'];
    $user_id=$_POST['uid'];
    
      $url=$_POST['viewroom'];
	
	
		$sql1="INSERT INTO wp_rooms VALUES ('','$var3','$var4','$var1','$var2','$var5','$var6','','','$maxpersons','$var8','$terms','$url','','')";
			mysql_query($sql1) or die(mysql_error());
			header('location:wp_rooms.php?id='.$var3.'&rid='.$var4);
		 
			  }
?>