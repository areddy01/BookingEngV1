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
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
 if(isset($_POST['SUBMIT']))
 {
              $aname=$_POST['pname'];
             // echo $aname;
              $areg=$_POST['region'];
             //echo $areg;
              $aord=$_POST['order'];
            //  echo $aord;
               
              $acheck=  implode(',',$_POST['check']);
              
              $id=$_POST['mySelect'];
             // echo $id;
              $flg=$_POST['flg'];
            // echo $flg;
			
              if(strlen($aname)>0)
              {			  
   $inquery="INSERT INTO wp_mapping(property_name,region,ordering,featured,ppro_id) VALUES('$aname','$areg','$aord','$acheck','$id')";
   $my=mysql_query($inquery);
   $query1="update wp_properties set flag=1 where ppro_id='$id'";
$q1=mysql_query($query1);
              header("location:allmappings.php");
        }
 }
            ?>
 <?php 

                 if(isset($_POST['add']))
                 {
                 $id2=$_REQUEST['mySelect1'];
                 $rad=$_REQUEST['radd'];
                
                 $query2="select distinct roomid,name from wp_room_type_details where roomid='$id2'";
                 $q2=mysql_query($query2);
                 $res=mysql_fetch_array($q2);
                 $result=$res['name'];
                 //echo $result;
                // echo "<br>";
                 $que="select ordering from wp_properties where ppro_id='$rad'";
                 $q=mysql_query($que);
                 $re=mysql_fetch_array($q);
                 $r=$re['ordering'];
                 
                
                  
                  $inquery="insert into wp_room_mapping values('$id2','$result','$r','$rad','')";
                 mysql_query($inquery);
                 header("location:allmappings.php");
                   }
                  
                 ?> 
 