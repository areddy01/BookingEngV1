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
	 $id=$_POST['id'];
	  $user=$_POST['user'];
	 $pid=$_POST['pid'];
	$var1=$_POST['name'];
	 $var2=$_POST['Default1'];
	 $var3=$_POST['Default2'];
	$var4=$_POST['Default3'];
	$var5=$_POST['Default4'];
	 $var6=$_POST['maxpersons'];
	 $var7=$_POST['rate1'];
	 $var8=$_POST['rate2'];
	 $var9=$_POST['rate3'];
	 $var10=$_POST['rate4'];
	 $var11=$_POST['roomtype'];
	 $var12=$_POST['sell'];
	 $var13=$_SESSION['sele'];
 $roomtype=mysql_query("SELECT * FROM  wp_room_type WHERE name='$var1'");
   $no=mysql_num_rows($roomtype);
	/*if($no>0)
	       {*/
     		$fetch1=mysql_fetch_row($roomtype);
			$roomid1=$fetch1[0];
	$sql1="UPDATE wp_room_type_details SET name='$var1',defaultinclusion='$var2',rackrate='$var9',setstop='$var12',ppro_id='$pid' WHERE roomid='$id'";
	mysql_query($sql1) or die("My sql Error");
	header('location:roomtypes.php');
	
	//}
}
?>
