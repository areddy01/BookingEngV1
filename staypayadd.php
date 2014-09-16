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
   
    $fdate=$_POST['from'];
    //echo $fdate;
     $tdate=$_POST['to'];
     //echo $tdate;
     $snigh=$_POST['snight'];
    // echo $snigh;
     $fnigh=$_POST['fnight'];
     //echo $fnigh;
     $mfnigh=$_POST['mfnight'];
     //echo $mfnigh;
     $query="insert into wp_staypays values('','$fdate','$tdate','$snigh','$fnigh','$mfnigh')";
     mysql_query($query);
     $q="select * from wp_staypays";
     $q1=mysql_query($q);
     while($row=mysql_fetch_array($q1))
     {
         echo $row['fromdate']."<br>";
         echo $row['todate']."<br>";
         echo $row['snight']."<br>";
         echo $row['fnight']."<br>";
         echo $row['mfnight'];

     }
     header("location:bookformstaypay.php");
}
if(isset($_POST['cancel']))
{
    header("location:bookformstaypay.php");
}

?>
