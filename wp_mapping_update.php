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
if($_SERVER["REQUEST_METHOD"] == "POST")
                  {
                      $time=time();
                      
                      //$id2=$_POST['cup'];
                        $oname=$_POST['oname'];
             
                     $oregion=$_POST['oregion'];
            
                     $order=$_POST['order'];
                    //echo $aord;
               
                      $check=implode(',',$_POST['check']);
              
                     $ar1=$_POST['rem'];
                  //  $count1=count($_REQUEST['rem']);
                    //  for($i=0;$i<=$count1;$i++)
                    //  {
                        //  $ar1=$arr[$i];
                         $up="update wp_mapping set property_name='$oname',region='$oregion',ordering='$order',featured='$check' where ppro_id='$ar1'";
                  						 mysql_query($up);
                         
                      //}
                    
                    header("location:allmappings.php");
                  }
                  ?>

                        
                  <!-- -----------------roomadd update--------------> 
                 
                    <?php /* $id=$_POST['hide'];
                   echo $id."<br>";
                   $uover=$_POST['over'];
                   echo $uover."<br>"; 
                   $uorder=$_POST['order'];
                   echo $uorder;
                     if(strlen($id)>0 && strlen($uover)>0 && strlen($uorder)>0)
                     {
                       $up="update roomadd set rdata='$uover',ordering='$uorder' where rid='$id'";
                     mysql_query($up);
                     }
                      header("location:mapping.php");
                     
                  }
                   ?>*/
               
