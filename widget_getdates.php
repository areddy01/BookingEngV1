<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body><?php
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
//echo $bf_id=$_REQUEST['bf_id'];
 
$ppro_id=$_REQUEST['ppro_id'];
//echo $datepic_pic=$_REQUEST['datepic_id'];

 $avr=$_REQUEST['avr'];
$boookform=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
?>

  
   <?php  $datepic_pic=$_REQUEST['datepic'];  ?>
  
   
   

<?php
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$currency=$gridsettings['DefaultCurrency'];

$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
 if($gridsettings['ShowTitle']!='')
 {
	 $frm_qry=mysql_query("SELECT * FROM wp_booking_forms");
$frm_data=mysql_fetch_array($frm_qry);

 }
 ?>
<!-- <div style="float:right; margin-top:25px;">
<input type="button" value="NEXT <?php echo $griddays;?> DAYS" name="next15days">
<input type="button"   value="NEXT <?php echo $griddays;?> DAYS"  onClick="location.href='PropertySelection.php?bf_id=<?php echo $bf_id;?>&action=nextdays'">
</div>-->

	<?php
						
				echo $page=$_GET['page'];
		
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
		?>
		
<?php 


	
$properties=mysql_query("SELECT * FROM wp_properties where ppro_id='$ppro_id'");
?>
<table  id="main_tbody" width="984" height="70px"   border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#fff" style="margin-top:60px;">

<tbody >
<tr height="70"> 
 <td colspan="2" width="270" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><b>Properties</b></font></td>

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
				<a href="PropertySelection.php?page=<?php echo $pre?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="PropertySelection.php?page=<?php echo $next?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
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
				<a href="PropertySelection.php?page=<?php echo $next?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
} ?>
</div>
 
 

</tr>   
<?php
while($properties_data=mysql_fetch_array($properties))
{

$property_id= $properties_data['ppro_id'];
$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id'");
$roomcount=mysql_num_rows($rdetails);
$roomdetails=mysql_fetch_array($rdetails);
$bfqry=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'");
//$nights=$roomdetails['rackrate'];
$nights=$roomdetails['roomrate'];
$night=($nights*5);
$address=$properties_data['addr2'];
$des=$properties_data['ds'];
$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id'");
//$rack=mysql_query("SELECT  max(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'  AND  newgrid_date>='$curntdate'");
$rat=mysql_fetch_array($rack);?>
<tr align="center">

<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
  <td width="250" height="60" bgcolor="#1c3f52">&nbsp;
 
<b><a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF" size="2"><?php echo $properties_data['Name']; ?></a></font></b>  

 
 
  <div id="booknow_text1" style="margin:10px 0px 0px 135px"><a href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><img src="images/next-buttion.png"></a></div>
  
  </div>
  </div>
</td>



</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b><?php echo $currency;?> <?php echo $rat[0];?></b></td>
<?php
for($i=0; $i<$whichrow; $i++){ 
$low_rate=mysql_query("SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'  AND  newgrid_date>='$datepic_pic'");
?>

<?php while($bfdata=mysql_fetch_row($low_rate))
{?>
<td bgcolor="#15a42e" width="50">

	<a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></font></a>

</td>
<?php 

	  
	
	 } ?>
<?php }
}

?>

</tr>
<script>
parent.iframeLoaded();
</script>
</tbody>
</table>
</html>