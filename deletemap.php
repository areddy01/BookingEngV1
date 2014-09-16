<?php 
ob_start();
@session_start();
echo $mid=$_REQUEST['id'];
echo  $img_id=$_REQUEST['id1'];
echo 	 $title=$_REQUEST['tit'];
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
 $delet="DELETE FROM wp_img_config_mapping WHERE mapid='$mid'";

 $s=mysql_query($delet) or die(mysql_error());
header('location:edit_image1.php?imgid='.$img_id.'&title='.$title);
       // echo "<script>window.location='edit_image1.php"</script>";   
     
          ?>