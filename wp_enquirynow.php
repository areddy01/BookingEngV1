<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 
 {
	 $pid=$_POST['pid'];
	echo   $pid."<br>";
	$bf_id=$_POST['bf_id'];
	$avr=$_POST['avr'];
	 $rid=$_POST['rid'];
	echo $rid."<br>";
	echo  $room_id=$_POST['room_id'];
	 $arrival=$_POST['arrival'];
	echo $arrival."<br>";
	 $nights=$_POST['nights'];
	echo  $nights."<br>";
	 $depature=$_POST['depature'];
	 echo  $depature."<br>";
	 $adult=$_POST['adult'];
	 echo  $adult."<br>";
	  $child=$_POST['child'];
	 echo $child."<br>";
	  $first=$_POST['first'];
	echo   $first."<br>";
	 $last=$_POST['last'];
	 echo $last."<br>";
	 $addr=$_POST['addr'];
     echo $addr."<br>";
	 $city=$_POST['city'];
	 echo  $city."<br>";
	 $state=$_POST['state'];
	echo  $state."<br>";
	 $postal=$_POST['postal'];
	echo  $postal."<br>";
	  $phone=$_POST['phone'];
	 echo $phone."<br>";
	   $email=$_POST['email'];
	echo  $email."<br>";
	 $request=$_POST['request'];
	echo  $request."<br>";
	 $card=$_POST['card'];
	 echo  $card."<br>";
	  $card_holder=$_POST['card_holder'];
	echo $card_holder."<br>";
	   $card_num=$_POST['card_num'];
	echo  $card_num."<br>";
	  $card_ex=$_POST['card_ex'];
	 echo $card_ex."<br>";
	  $card_year=$_POST['card_year'];
	 echo $card_year."<br>";
	   $ccv=$_POST['ccv'];
	 echo  $ccv."<br>";
	
		/*$quer="insert into wp_bookinfo values('','$pid','$rid','$arrival','$nights','$depature','$adult','$child','$first','$last','$addr','$city','$state','$postal','$phone','$email','$request','$card','$card_holder','$card_num','$card_ex','$card_year','$ccv') ";
		
		$q1=mysql_query($quer) or die(mysql_error);*/
	
	  //$q2=mysql_fetch_array($q1);
	   //$count=$q2['bookings'];
		//$cnt=$count+1;
		//$up="update wp_room_type_details set bookings='$cnt' where ppro_id='$pid' and roomid='$rid'";
		//echo $up;
		//$q=mysql_query($up) or die(mysql_error);	
	    $grid_data_up="UPDATE wp_room_inventory_grid_details SET  flag='enquiry'  WHERE  ppro_id='$pid' AND roomid='$rid' and room_id='$room_id' and newgrid_date>='$arrival' and newgrid_date<='$depature'";
	
	$grid_data_update=mysql_query($grid_data_up);
	//header('location:roomnames.php?bf_id='.$bf_id.'&bfrid='.$rid.'&ppro_id='.$pid.'&avr='.$avr.'&rumid='.$rid);
	//header('location:edit_image1.php?imgid='. $imgid.'&title='. $title);
	//header('location:propertySelection.php?bf_id='.$bf_id);
	header('location:settings.php');
}
 ?>
 <html>
 <body>
 <div style="background-color:#999; size:auto; text-align:center;"><center><h2>Thanks for Enquiry
 </center></h2></div>
 <a href="settings.php"><h4><center>Go Back</center></h4></a>
       </body>
       </html>
		