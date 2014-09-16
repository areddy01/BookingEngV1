<?php
include('config.php');

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
     $query="insert into staypays values('','$fdate','$tdate','$snigh','$fnigh','$mfnigh')";
     mysql_query($query);
     $q="select * from staypays";
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
