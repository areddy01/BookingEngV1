<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 if(isset($_POST['UPDATE'])){
      echo  $fname=$_POST['fname'];
		echo  $lname=$_POST['lname'];
		 echo $uname=$_POST['uname'];
		
		echo $user=$_POST['user'];
		  echo $pwd1=md5($_POST['pwd']);
		
		 echo $password = hash('sha1', $pwd1);
		 
		
	
		 $pwd=$pwd1.$salt;
		
		echo   $cpwd=$_POST['cpwd'];
		echo  $email=$_POST['email'];
		echo  $role=$_POST['role'];
		
	
       $query="UPDATE wp_manage_user SET username='$uname',firstname='$fname',lastname='$lname',password='$password',roles='$role',email='$email' WHERE  id='$user'";  
	   echo $query."<br>";	
	   
       $query1=mysql_query($query) or die(mysql_error);
      /*deleting userid-*/
$n="delete from wp_manage_mappings where user_id='$user'";
echo $n;
$old=mysql_query($n);


      
   
echo"<br>";

 $c=($_POST['count']);
		 $m=explode(',',$c);
		 echo "<br>";
		echo "cnt".$count=count($m);
		
		
		for($i=1;$i<=$count;$i++)
{
  $region=$_POST['select_'.$i]."<br>";
 echo $ppro_id =$_POST['ppro_id_'.$i]."<br>";
 echo $roomid=$_POST['roomtype_'.$i]."<br>";
 echo $room_id=$_POST['room_'.$i]."<br>";
 $parts = explode("-",$region);
          echo   $one=$parts[0];
           echo  $two=$parts[1];
          
          
           if($one && $two){
            $tdata="INSERT INTO wp_manage_mappings  VALUES ('','$user','$ppro_id','$roomid','$room_id','$two','$one')";  
	   echo $tdata."<br>";
           }else{
            $tdata="INSERT INTO wp_manage_mappings  VALUES ('','$user','$ppro_id','$roomid','$room_id','$region','')";  
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
	