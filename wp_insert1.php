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
	$var1=$_POST['name'];
	$var2=$_POST['Default1'];
	//$var3=$_POST['Default2'];
	//$var4=$_POST['Default3'];
	//$var5=$_POST['Default4'];
	//$var6=$_POST['maxpersons'];
	//$var7=$_POST['rate1'];
	//$var8=$_POST['rate2'];
	$var9=$_POST['rate3'];
	//$var10=$_POST['rate4'];
	//$var11=$_POST['roomtype'];
	$var12=$_POST['sell'];
	echo $var13=$_SESSION['sele'];
	echo $hide=$_POST['hide'];
	$user_id=$_POST['uid'];
	
	$roomtype=mysql_query("SELECT * FROM  wp_room_type WHERE name='$var1'");
    $no=mysql_num_rows($roomtype);
	if($no>0)
	       {
     		$fetch1=mysql_fetch_row($roomtype);
			$roomid1=$fetch1[0];
		$sql1="INSERT INTO wp_room_type_details(`roomid`, `name`, `defaultinclusion`, `defaultallocation`, `defaultrate`, `personincludedrate`, `maxpersons`, `extraadult_rate`, `extrachild_rate`, `rackrate`, `defaultmin_stay`, `typesofrooms`, `setstop`, `ppro_id`,``) VALUES ('$roomid1','$var1','$var2','','','','','','','$var9','','','$var12','$hide','$user')";
			mysql_query($sql1) or die(mysql_error());
			header('location:roomtypes.php');
		   }
	else
		 	{
		  
			   $qry="INSERT INTO wp_room_type(name) values('$var1')";
			  $sql2=mysql_query($qry);
			  $sql3=mysql_query("SELECT * FROM wp_room_type WHERE name='$var1'");
			  $sql4=mysql_fetch_row($sql3);
			 
			  $roomid2=$sql4[0];
			 

			$sql5="INSERT INTO wp_room_type_details(`roomid`, `name`, `defaultinclusion`, `defaultallocation`, `defaultrate`, `personincludedrate`, `maxpersons`, `extraadult_rate`, `extrachild_rate`, `rackrate`, `defaultmin_stay`, `typesofrooms`, `setstop`, `ppro_id`,`user_id`) VALUES ('$roomid2','$var1','$var2','','','','','','','$var9','','','$var12','$hide','$user')";
		
			 
			mysql_query($sql5) or die(mysql_error());
			header('location:roomtypes.php');
			  
			 }
		   
	
}
?>