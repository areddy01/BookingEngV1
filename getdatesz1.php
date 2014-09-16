<?php
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
//echo $bf_id=$_REQUEST['data1'];
 $ppro_id=$_REQUEST['data2'];
  //echo $ppro_id;
 $avr=$_REQUEST['data3'];
$boookform=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");


//echo "SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'";
//$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


  
   <?php    $datepic_pic=$_POST['data1'];  ?>

   
   

<?php


$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
 if($gridsettings['ShowTitle']!='')
 {
	 $frm_qry=mysql_query("SELECT * FROM wp_booking_forms");
$frm_data=mysql_fetch_array($frm_qry);

 }
 ?>

</div>
	<?php
						
				$page=$_GET['page'];
		
		         if(!isset($page) || $page <= 0 || $page == "")
		         {
			     $page=1; 					
		         }


 $inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$datepic_pic'";
	

				$sql1= mysql_query($inventoory_qry) or die(mysql_error());
				
				$no_of_row = mysql_num_rows($sql1);
				if($no_of_row)		
	        {	
			
		$maxpage=$griddays;
		
		
	$totalpages=ceil($no_of_row / (float)$maxpage);
		
		if($page > $totalpages)
		{
			$page=1; 
		}
		}
		$whichrow=0;
		mysql_data_seek($sql1,($page-1) * $maxpage);
	
$properties=mysql_query("SELECT * FROM wp_properties");
?>
<table  id="main_tbody1" width="984" height="70px"   border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#fff" style="margin-top:60px;">

<tbody >
<tr height="70"> 
 <td colspan="2" width="270" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><b><?php echo $propertyname['Name'];?></b></font></td>

<?php

while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	  $whichrow=$whichrow + 1;
         ?>	
 
<td bgcolor="#c5c5c5" width="50" ALIGN="CENTER">&nbsp;<?php

	$d=$inventoory_grid_data['newgrid_date'];
	$ch=Date('D d M',strtotime($d));
	echo $ch=strtoupper($ch);

	
?>
</font></td>
  <?php
		 if($whichrow == $maxpage)
		  {
			break; 
		  }						  
		 }			
    
?>
</tr>

   <tr height="20"> 
   <?php
   $span=$griddays+1;
   ?>
 

 <div><?php
 
		if($totalpages>1)
		{ 
		
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style=" float:right; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
				<a href="RoomSelection.php?page=<?php echo $pre?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				echo $next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}
			
		}else{
			
			//$pre = (int)$page - 1;
			?>
			<td colspan="1"></td>
			<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
			<?php	
			
			//if($page < $totalpages)
			//{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
} ?>
</div>
 
 

</tr>   
<?php
$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
$rproperties=mysql_query($dquery);
while($details=mysql_fetch_array($rproperties))
{

$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
$roomcount=mysql_num_rows($rdetails);
$roomdetails=mysql_fetch_array($rdetails);
$room_id=$details['roomid'];
$rdata=$details['name'];
$roomdata=$roomdetails['defaultinclusion'];
$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id'");
$rate=mysql_fetch_array($q1);
$nights=$rate[0];
$night=($nights*5);
$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$popup_res=mysql_fetch_array($popup_query);
$popup_des=$popup_res['ds'];
$popup_featured=$popup_res['features'];
$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id'");
$rat=mysql_fetch_array($rack);?>
<tr align="center">

<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
 <td width="250"  height="60" bgcolor="#1c3f52"><b><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></b>
 
 <div id="booknow_text1" style="margin:10px 0px 0px 135px"><a href='roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><img src="images/next-buttion.png"></a></div>
  
  </div>
  </div>
</td>



</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b>AUS $<?php echo $rat[0];?></b></td>
<?php
for($i=0; $i<$whichrow; $i++){ 
$bf_qry=mysql_query("SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id'  AND  newgrid_date>='$curntdate' AND roomid='$room_id'");
?>

<?php while($bf_data=mysql_fetch_array($bf_qry))
{?>
<td bgcolor="#15a42e" width="50">

	<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></font></a>
</td>
<?php 

	  
	
	 } ?>
<?php }
}

?>

</tr>

</tbody>
</table>