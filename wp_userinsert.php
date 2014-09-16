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
       $fname=$_POST['fname'];
		 $lname=$_POST['lname'];
		 echo $uname=$_POST['uname'];
		
		
		  $pwd1=md5($_POST['pwd']);
		
		 echo $password = hash('sha1', $pwd1);
		 
		//exit;
	
		 $pwd=$pwd1.$salt;
		
		  $cpwd=$_POST['cpwd'];
		 $email=$_POST['email'];
		 $role=$_POST['role'];
		
	
       $query="INSERT INTO wp_manage_user  VALUES ('','$uname','$fname','$lname','$password','$role','$email')";  
	   echo $query."<br>";	
      $query1=mysql_query($query) or die(mysql_error);
    echo  $user_id=mysql_insert_id();
echo"<br>";

 $c=($_POST['count1']);
		 $m=explode(',',$c);
		echo $count=count($m);
		
		
		for($i=1;$i<=$count;$i++)
{
  $region=$_POST['select_'.$i]."<br>";
echo $ppro_id=$_POST['ppro_id_'.$i]."<br>";
echo $roomid=$_POST['roomtype_'.$i]."<br>";
echo $room_id=$_POST['room_'.$i]."<br>";
$parts = explode("-",$region);
          echo   $one=$parts[0];
           echo  $two=$parts[1];
           if($one && $two){
            $tdata="INSERT INTO wp_manage_mappings  VALUES ('','$user_id','$ppro_id','$roomid','$room_id','$two','$one')";  
	   echo $tdata."<br>";
           }else{
            $tdata="INSERT INTO wp_manage_mappings  VALUES ('','$user_id','$ppro_id','$roomid','$room_id','$region','')";  
	   echo $tdata."<br>";
           }


       $query11=mysql_query($tdata) or die(mysql_error);
}
    


          if($query1)
	{
	$to = $email; 
        $subject = "Your Login Details"; 
        $from = "pyn.srinivas0101@gmail.com";
        $message ="UserName:".$uname."   Password:".$_POST['pwd']; 
        $headers = "From: $from"; 
        $sent = mail($to, $subject, $message, $headers) ; 
         if($sent) 
         {print "Your mail was sent successfully";
         header('location:user.php'); }
         
        else 
          {print "We encountered an error sending your mail"; }
	
		
        }
    else{
	echo "<script> alert('hello')</script> ";
     }
 }
?>
	