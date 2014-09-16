<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
 if (isset($_POST['SUBMIT']))
  {
	   echo $user_id=$_POST['user_id'];  
	   $opwd=$_POST['opwd']; 
        echo  $newpwd=md5($_POST['npwd']);
        $npwd=hash('sha1', $newpwd);
        
       // $_POST['npwd'];
		
		$qry="UPDATE wp_manage_user SET password='$npwd' WHERE id='$user_id'";
	
	$result=mysql_query($qry);
	
	
if($result){
header('location:user.php');
	}
	}
	
    
 ?>
