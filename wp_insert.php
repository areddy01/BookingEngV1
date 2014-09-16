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
     $user_id=$_POST['user_id']."<br>";
       $user=$_POST['user'];
		 $name=$_POST['name'];
		$des=$_POST['desc'];
		$feature=$_POST['features'];
		$phone=$_POST['phone'];
		$fax=$_POST['fax'];
		$webaddr=$_POST['webad'];
		$addr1=$_POST['addr1'];
		$addr2=$_POST['addr2'];
		$subb=$_POST['subr'];
		//$region=$_POST['region'];
		//$state=$_POST['state'];
		$pcode=$_POST['postcode'];
		 $country=$_POST['country'];
		 $city=$_POST['city'];
		$cos=$_POST['coordinates'];
		$map=$_POST['map'];
		$accodi=$_POST['accodimation'];
		$ratingtype=$_POST['ratingtype'];
		$rating=$_POST['rating'];
		$leadtime=$_POST['ltime'];
	        $value=$_POST['value'];
	        $place=$_POST['place'];
	        $m=mysql_query("select * from wp_properties where Name='$name'");
	        $c=mysql_fetch_array($m);
	        $c_name = $c['Name'];
	        if($c_name){
	        echo "<script>
	        	 alert('This Property Name is already Exist')
	        	 location.replace('propertymanager.php')
	        	</script> ";
	        	
	        
	        }
	        else{
	      
	        $query="INSERT INTO wp_properties  VALUES ('','','$name','$des','$feature','$phone','$fax','$webaddr','$addr1','$addr2','$subb','$place','','$pcode','$country','$city','$cos','$map','$accodi','$ratingtype','$rating','$leadtime','$value','','','')";  
	        
	        
	       
	  // echo $query;	
       $query1=mysql_query($query) or die(mysql_error);
     }
          if($query1)
	{
	
		header('location:propertymanager.php');
     }
    else{
	echo "<script> alert('hello')</script> ";
     }
 }
?>
	