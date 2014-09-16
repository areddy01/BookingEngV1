<?php
ob_start();
@session_start();
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

//echo "welcome";
if($_POST['SUBMIT'] == "SAVE") 
{
	 $imgid=$_POST['imid'];
	 $title=$_POST['title'];
	 $img_name=$_POST['imname'];
	 $des=$_POST['des'];
	 $bookid=$_POST['pid'];
	 $proid=$_POST['ppid'];
     $room1=$_POST['rid']; 
	 $vid=$_POST['video_id'];
	  $room=$_POST['room'];
     $query="insert into wp_imginfo values('','$imgid','$img_name','$des','$bookid','$proid','$room1','$vid','$room')";
	//echo $query;
	mysql_query($query);
	header('location:edit_image1.php?imgid='. $imgid.'&title='. $title);
}
 