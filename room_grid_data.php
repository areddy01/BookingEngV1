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

print_r($_POST);
echo "<br>";

$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}
//if(isset($_POST['SUBMIT']))

//{   
       // echo $curntdate=Date("Y-m-d");
       // echo "bhskar";
	//exit;
			  $ppro_id=$_POST['ppro_id1'];
			  $uid=$_POST['uid'];
               $aname=$_POST['roomid1']; 
               $uid=$_POST['uid'];
				
				$newroom=$_POST['newroomid1'];
				//echo $v=count($newroom);
				
				
//print_r($newroom);
				
			//$uid=$_POST['uid'];
			 $rate=$_REQUEST['rate'];
			 print_r($rate);
			
			
			   $avil=$_POST['avil'];
			    $astay=$_POST['min']; 
			$adate=$_REQUEST['dt'];
			print_r($adate);
		//exit;
		   $range=$_POST['range'];
		  // print_r($range);
		   
		  // exit;
			  $sell=$_POST['stopsell'];
			   	//print_r($sell);
	
				$ij=0;					
				for($i=0;$i<count($newroom);$i++)
		          {
					   $newroomid1=$newroom[$i]."<br>";
					for($j=0;$j<$range;$j++)
					{	
					    		
						     $temp[$i]=array($rate[$ij+$j],$avil[$ij+$j],$astay[$ij+$j],$sell[$ij+$j],$adate[$ij+$j]);
 						 $srate=$rate[$ij+$j];
						$savil=$avil[$ij+$j];
						 $sastay=$astay[$ij+$j];
					$ssell=$sell[$ij+$j];
						 $sadate=$adate[$ij+$j];
			 $grid_data="SELECT newgrid_date FROM `wp_room_inventory_grid_details` WHERE ppro_id='$ppro_id' AND roomid='$aname' AND newgrid_date='$sadate' and room_id='$newroomid1' and user_id='$uid'";
			
			$grid_data_qry=mysql_query($grid_data) or die(mysql_error());
	        echo $count=mysql_num_rows($grid_data_qry);
		 // echo $count."<br>";
			   
		if($count!=0)
	    {
	    //echo "count:$count";
		/*echo "delete newroomrate from wp_room_inventory_grid_details where newgrid_date>='$sadate' and ppro_id='$ppro_id' AND roomid='$aname' and room_id='$newroomid1'";
			
	 $del="delete newroomrate from wp_room_inventory_grid_details where newgrid_date>='$sadate' and ppro_id='$ppro_id' AND roomid='$aname' and room_id='$newroomid1'";
		
		
			$grid_data_update1=mysql_query($del);*/
			
		    $grid_data_up="UPDATE wp_room_inventory_grid_details SET    newroomrate='$srate',newroomavilability='$savil',newmin_room_stay='$sastay',newstop_sell='$ssell'  WHERE newgrid_date='$sadate' AND  ppro_id='$ppro_id' AND roomid='$aname' and room_id='$newroomid1'";
	$grid_data_update=mysql_query($grid_data_up);
	 
	    }
	    else
	   {
	 
	   
          $insqry="INSERT INTO wp_room_inventory_grid_details VALUES('','$ppro_id','$aname','$srate',' $savil','$sastay','$ssell','$sadate','$newroomid1','availability','$uid','')";
 echo $insqry;
$insert_griddata=mysql_query($insqry);
       	}
	}
					 $ij=$ij+$range;
					 //echo "<hr/>";
	   			 }
header('location:inventorygrid.php');	 

 //}
 if(isset($_POST['cancel']))

 {   
 header('location:inventorygrid.php');
 }