<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}

if(isset($_POST['save']))
{
    $suname=$_POST['from'];
    $sfname=$_POST['to'];
    $slname=$_POST['snight'];
    $spwd=$_POST['fnight'];
    $scpwd=$_POST['mfnight'];
    $id=$_POST['id'];
    if($id!='')
    {
              
      $qr="UPDATE wp_staypays SET fromdate='$suname',todate='$sfname',snight='$slname',fnight='$spwd',mfnight='$scpwd' where id='$id'";
      $qr1=mysql_query($qr);
     
       header('location:bookformstaypay.php'); 
    }
    else {
         
        $quer="INSERT INTO `manage_user` (`id`, `username`, `firstname`, `lastname`, `password`, `conform pwd`, `roles`, `properties`, `active`, `pool members`, `available room types`) VALUES
('', '$suname', '$sfname', '$slname', '$spwd', '$scpwd', '', '', '', '', '')";
   $qur=mysql_query($quer); 
  
   
   header('location:bookformstaypay.php');
     
 
}
 }
 if(isset($_POST['cancel']))
 {
      header('location:bookformstaypay.php');
 }
?>