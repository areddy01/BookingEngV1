<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 if(isset($_POST['SUBMIT'])){
      echo  $user_id=$_POST['user_id'];
		echo  $name=$_POST['name'];
		echo $bookid=$_POST['book_id'];
		echo $mode=$_POST['mode'];
		
		
       $query="INSERT INTO wp_booking_forms  VALUES ('$bookid','$user_id','$name','$mode','','')";  
	   echo $query;	
       $query1=mysql_query($query) or die(mysql_error);
     
          if($query1)
	{
	
		header('location:settings.php');
     }
    else{
	//echo "<script> alert('hello')</script> ";
     }
 }
?>
	