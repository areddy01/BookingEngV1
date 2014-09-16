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
	   $ppro_id=$_POST['ppro_id'];  
	    echo $user=$_POST['user']; 
	   $features=$_POST['features']; 
         $name=$_POST['name'];
		$des=$_POST['desc'];
		$phone=$_POST['phone'];
		$fax=$_POST['fax'];
		$webaddr=$_POST['webad'];
		$addr1=$_POST['addr1'];
		$addr2=$_POST['addr2'];
		$sub1=$_POST['subr'];
		$region=$_POST['place'];
		$state=$_POST['state'];
		$pcode=$_POST['postcode'];
		$country=$_POST['country'];
		$city=$_POST['city'];
		$cos=$_POST['coordinates'];
		$map=$_POST['map'];
		$accodi=$_POST['accodimation'];
		$ratingtype=$_POST['ratingtype'];
		$rating=$_POST['rating'];
		$leadtime=$_POST['leadtime'];
	    $value=$_POST['value']; 
	  
		$qry="UPDATE wp_properties SET Name='$name',ds='$des',features=' $features',phone='$phone',fax='$fax',webaddr='$webaddr',addr1='$addr1',addr2='$addr2',suburb='$sub1',region_id='$region',state='',postcode='$pcode',cid='$country',city_id='$city',geographicalcoordinates='$cos',mapzonelevel='$map',accodimationtype='$accodi',ratingtype='$ratingtype',rating='$rating',leadtime='$leadtime',availabletime='$value' WHERE ppro_id='$ppro_id'";
	
	$result=mysql_query($qry);
	
	
if($result){
header('location:propertymanager.php');
	}
	}
	
    
 ?>
