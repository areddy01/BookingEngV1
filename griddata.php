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

if(isset($_POST['submit']))

 {   
           
			  $ppro_id=$_POST['ppro_id1'];
                $aname=$_POST['roomid1']; 
			   $rate=$_POST['rate'];
			   $avil=$_POST['avil'];
			     $astay=$_POST['min']; 
			  $adate=$_POST['dt'];
			     $range=$_POST['range'];
			   $sell=$_POST['stopsell'];
			   			
				$ij=0;					
				for($i=0;$i<count($aname);$i++)
		          {
					  $roomid=$aname[$i];
					for($j=0;$j<$range;$j++)
					{	
					    		
						     $temp[$i]=array($rate[$ij+$j],$avil[$ij+$j],$astay[$ij+$j],$sell[$ij+$j],$adate[$ij+$j]);
 							 $srate=$rate[$ij+$j];
							 $savil=$avil[$ij+$j];
							 $sastay=$astay[$ij+$j];
							 $ssell=$sell[$ij+$j];
							 $sadate=$adate[$ij+$j];
			$grid_data="SELECT grid_date FROM `wp_inventory_grid_details` WHERE ppro_id='$ppro_id' AND roomid='$roomid' AND grid_date='$sadate' ";
			
			$grid_data_qry=mysql_query($grid_data) or die(mysql_error());
	        $count=mysql_num_rows($grid_data_qry);
		  echo $count."<br>";
			     
		if($count!=0)
	    {
			
		     echo   $grid_data_up="UPDATE wp_inventory_grid_details SET    roomrate='$srate',roomavilability='$savil',min_room_stay='$sastay',stop_sell='$ssell'  WHERE grid_date='$sadate' AND  ppro_id='$ppro_id' AND roomid='$roomid'";
	$grid_data_update=mysql_query($grid_data_up);
	echo $grid_data_up;
	    }
	    else
	   {
       echo   $insqry="INSERT INTO wp_inventory_grid_details VALUES('','$ppro_id','$roomid','$srate',' $savil','$sastay','$ssell','$sadate')";
echo $insqry;
$insert_griddata=mysql_query($insqry);
       	}
	}
					 $ij=$ij+$range;
					 //echo "<hr/>";
	   			 }
	header('location:inventorygrid.php');	 

 }