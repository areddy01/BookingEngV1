<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();

	
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}


 if(isset($_POST['update']))
 { 
              $id=$_POST['hide'];	  
              $aname=$_POST['from'];            
              $areg=$_POST['to']; 
              $user_id=$_POST['user'];
			 
			       
               $range=$_POST['myselect'];			  
              $avail= $_POST['check1'];
			  $avai2= $_POST['check2'];
			 $avai3= $_POST['check3'];
			 $avai4= $_POST['check4'];
			 $q=mysql_query("select * from wp_griddateselection where user_id='$user_id'");
			 $cnt=mysql_num_rows($q);
              if($cnt)
              {
              
               $up="update wp_griddateselection set fromdate='$aname',todate='$areg', 	availability='$avail',rates='$avai2',min_stay='$avai3',stop_sell='$avai4',date_range='$range' where user_id='$user_id'";
				   $q=mysql_query($up);
              
              
		
               }
		else
			   {
						
              $inquery="insert into wp_griddateselection values('','$aname','$areg','$avail','$avai2','$avai3','$avai4','$range','$user_id')";
			  
			  
              $q1=mysql_query($inquery);  
				   
			   }
							
                        header("location:inventorygrid.php");
        }
            ?>