<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html><?php
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
//$bf_id=$_REQUEST['bf_id'];
 //$dest=$_REQUEST['destination']."<br>";
 $ppro_id=$_POST['ppro_id'];
 $arrival=$_POST['arrival'];
 $region=$_POST['region'];
 
//exit;
 //$ppro_id=$_GET['ppro_id'];
  //echo $ppro_id;
 //$avr=$_REQUEST['avr'];
$boookform=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
?>
<!DOCTYPE HTML>
<html>
<body>
<div id="search1">

<div class="span12">
<div class="container">
			
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

				$page=$_GET['page'];
		
		         if(!isset($page) || $page <= 0 || $page == "")
		         {
			     $page=1; 					
		         }
$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$arrival'";

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
		@mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
		


<div class="row-fluid">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" height="139" align="left" valign="top">
		<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
							<td width="50%" class="bigbox_blue" height="57"><strong>Properties</strong></td>
							<td width="50%" class="bigbox_blue_small" height="57"><strong>FULL RATE</strong></td>
				</tr>

 <?php
 
 
  $properties1=mysql_query("SELECT * FROM wp_properties where ppro_id='$ppro_id' and region='$region'");
							
							while($properties_data=mysql_fetch_array($properties1))
							{
							$property_id= $properties_data['ppro_id'];
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id'");
							$rat=mysql_fetch_array($rack);
							$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id'");
							$roomcount=mysql_num_rows($rdetails);
							?>
							<tr>
												<td class="bigbox_dark">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td colspan="2" align="center"><strong>widgetproperties<a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF" size="2"><?php echo $properties_data['Name']; ?></a></font></strong></td>
														</tr> 
														<tr>
															<td width="72%">&nbsp;</td>
															<td width="28%" class="bigbox_blue_withsection_orange"><a href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'">NEXT</a></td>
														</tr>
													</table>
												</td>
												<td class="doalr_section"> <strong> <strong>&nbsp;<b><?php echo $currency;?> <?php echo $rat[0];?></b></strong></a></strong></td>

			    </tr>
							<?php } ?>
		</table>
   </td>
<?php
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
							  $whichrow=$whichrow + 1;
								 ?>	
								<td  width="<?php echo $_td_width=(70/$griddays);?>%" valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td height="56" colspan="2" align="center" valign="top" bgcolor="#C5C5C5"  style="border-bottom:1px solid #FFF; padding:.1em; border-right:1px solid #FFF;" ><?php

							$d=$inventoory_grid_data['newgrid_date'];
							$ch=Date('D d M',strtotime($d));
							echo $ch=strtoupper($ch);
							$edate=Date("Y-m-d",strtotime($d));
							?>
							</td>
											</tr>
							<?php
							$properties=mysql_query("SELECT * FROM wp_properties where ppro_id='$ppro_id'and region='$region'");
							while($properties_data=mysql_fetch_array($properties))
							{
							$property_id= $properties_data['ppro_id'];
							$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id'");
							$roomcount=mysql_num_rows($rdetails);
							$roomdetails=mysql_fetch_array($rdetails);
							$bfqry=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'");
							$nights=$roomdetails['roomrate'];
							$night=($nights*5);
							$address=$properties_data['addr2'];
							$des=$properties_data['ds'];
							$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id'");
							$rat=mysql_fetch_array($rack);?>
							
							<?php
										$low_rate=mysql_query("SELECT newroomrate FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold')");
											$bfdata=mysql_fetch_row($low_rate);
											if($bfdata)
											{
											?>
											<tr>
											<td height="53"  align="center" valign="middle" bgcolor="#15a42e" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">
												       <a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></a>
												</td>
												<?php }
												else 
												{
												?>
												<td height="53"  align="center" valign="middle" bgcolor="#e3e3e3" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">
													<?php echo "SOLD";?>
												</td> 
												
												<?php  } ?>  
											</tr> 
											<?php } ?>
									    </table>
						</td>
<?php
								 if($whichrow == $maxpage)
								  {
									break; 
								  }						  
		}	    
?>
<table><tbody>
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
				<a href="widget_properties.php?page=<?php echo $pre?>&ppro_id=<?php echo $ppro_id;?>&arrival=<?php echo $arrival;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_properties.php?page=<?php echo $next?>&ppro_id=<?php echo $ppro_id;?>&arrival=<?php echo $arrival;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}
		}else{
			?>
			
			<?php	
			
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_properties.php?page=<?php echo $next?>&ppro_id=<?php echo $ppro_id;?>&arrival=<?php echo $arrival;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				
<?php } } ?>
</div>
</tr>   
</tr>
</tbody>
</table></table></div>
<script>
parent.iframeLoaded();
</script>
</body>
</html>