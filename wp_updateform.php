<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
if(isset($_POST['cancel'])){
header('location:settings.php');
}

 if(isset($_POST['SUBMIT'])){
      echo  $user_id=$_POST['user_id'];
		echo  $name=$_POST['name'];
		echo $bookid=$_POST['book_id'];
		
		/*echo $ppro_id=$_POST['ppro_id'];
		print_r($ppro_id);
		echo $c=count($ppro_id);
		for($i=0;$i<$c;$i++){
		$ppd=$ppd.",".$ppro_id[$i];
		
		}
		echo "total pps".$ppd;*/
		
		
		
		$ppro_id=$_POST['ppro_id'];
		echo "count".$count=count($ppro_id);
		
		$de=mysql_query("delete from wp_userforms where book_id='$bookid' and user_id='$user_id'");
              if($de){
		for($i=0;$i<$count;$i++){
       $query="INSERT INTO wp_userforms  VALUES ('','$name','$bookid','$user_id','$ppro_id[$i]')";  
       echo $query;
	 
	 
       $query1=mysql_query($query) or die(mysql_error);
     }}
          if($query1)
	{
	
		header('location:BookingFormContentConfiguration.php?bookid='.$bookid);
     }
    else{
	//echo "<script> alert('hello')</script> ";
     }
 }
?>
	