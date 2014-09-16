<?php
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
 $ppro_id=$_GET['ppro_id'];
  //echo $ppro_id;
 $avr=$_REQUEST['avr'];
$boookform=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
?>
<html>
<head>

<!-- Bootstrap --> 
		<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
		       <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-popover.js"></script>	
 
 <style>
 .underline {
    text-decoration:line-through;
}
 </style>
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
/*if($_REQUEST['action']=='nextdays')
      {
           $s_id=$_GET['sid'];
	  }*/?>
<div id="main">
<div id="logo_main" style="display:none;">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar" style="display:none;">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >> PALM COVE </font> </b></div>
</div> 


<!-- new div-->
<div style="width:970px; height:500px;">     
<div id="main_content">
<?php 
$cdate=Date("D M d Y");
?>
<!--<div id="buttion_main">
<div class="green_button"></div>
<div class="available_text">AVAILABLE</div>
<div class="yellow_button"></div>
<div class="makeanenquirry_text">MAKE AN ENQUIRY </div>
<div class="white_button"></div>
<div class="sold_text">SOLD</div>
<div class="start_date_text">START DATE</div>-->
<!--<div  class="start_button"></div>-->
<!--<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>
</div>-->

<?php
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];

//echo $curntdate=Date("Y-M-d",strtotime("-1 days"))."<br>";
//$curntdate=Date("Y-m-d");
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
 if($gridsettings['ShowTitle']!='')
 {
	 $frm_qry=mysql_query("SELECT * FROM wp_booking_forms");
$frm_data=mysql_fetch_array($frm_qry);
	// echo "<h1 style='color:#BCA36B'>".$frm_data['bookingform_name']."</h1>";
 }
 ?>
 	<div style="float:right; margin-top:25px;">
<!--<input type="button" value="NEXT <?php echo $griddays;?> DAYS" name="next15days">-->
<!--<input type="button"   value="NEXT <?php echo $griddays;?> DAYS"  onClick="location.href='PropertySelection.php?bf_id=<?php echo $bf_id;?>&action=nextdays'">-->
</div>
</div>
	<?php
						
				$page=$_GET['page'];
		
		         if(!isset($page) || $page <= 0 || $page == "")
		         {
			     $page=1; 					
		         }
				 /*$h="select * from country_table WHERE ".$src;
				$inventoory_qry="SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'";*/

$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";
	
				/*$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE str_to_date(newgrid_date, '%m-%d-%Y')>='$curntdate'";*/
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
/*$inventoory_qry=mysql_query("SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate' AND str_to_date(grid_date, '%d-%m-%Y')<'$enddate'");*/

	
$properties=mysql_query("SELECT * FROM wp_properties");
?>
 <!--<div style=" float:left;width:1024px; height:60px;"><?php
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		    $pre = (int)$page - 1;
          ?>
      <div style="width:120px; float:left; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="PropertySelection.php?page=<?php echo $pre?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 25px 0px 0px;" >
            <a href="PropertySelection.php?page=<?php echo $next?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>
       <?php
	    }
	  }  ?>
</div>-->


<table width="984" height="70px"   tyle="margin-top:360px;" border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" colspan="2" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><b>Properties</b></font></td>
<!--<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>-->


<?php

//for($i=1; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	  $whichrow=$whichrow + 1;
         ?>	
 <td bgcolor="#c5c5c5" width="50" ALIGN="CENTER">&nbsp;<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > 
<?php
	//$d=$inventoory_grid_data["str_to_date(newgrid_date, '%m-%d-%Y')"];
//$Weddingdate = new DateTime($inventoory_grid_data['grid_date']);
//echo $Weddingdate->format('d-m-Y');
//  echo "<b>".$d=$inventoory_grid_data['newgrid_date']."</b>";
 //str_to_date(newgrid_date, '%m-%d-%Y')//$d=$inventoory_grid_data['newgrid_date'];
 //echo $e=date('m-d-y',strtotime($d));
// $t=date_create($d);
 //echo date_format($t,'d-m-y');
	//echo $f=date('d-m-y',$s);//	$dc=$inventoory_grid_data["str_to_date(grid_date, '%m-%d-%Y')"];

//	 $e=strtotime($d);
	// $dd=date('d-m-y',$e);
	//echo $d;
	$d=$inventoory_grid_data['newgrid_date'];
	echo $ch=Date('D d M',strtotime($d));
	//echo $inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	/*$dob1=trim($inventoory_grid_data['newgrid_date']);//$dob1='dd/mm/yyyy' format
			list($m, $d, $y) = explode('/', $dob1);
			$mk=mktime(0, 0, 0, $m, $d, $y);
			echo $dob_disp1=strftime('%Y-%m-%d',$mk);*/
	
?>
</font></td>
  <?php
		 if($whichrow == $maxpage)
		  {
			break; 
		  }						  
		 }			
//  echo $whichrow;       
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
 
<b><a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF"><?php echo $properties_data['Name']; ?></a></font></b>  
<!--<div id="pop-up">
        <h3>Beautiful Room</h3>
        <p>
         Comfortable room specified Allocation please visit our site For Booking
		 www.stage.fitow.au.comuhfdlkulgelrgjlerkjhr
		 jsdgfjygweskrfteywt
		 jhegstfgwekgtweyt
		 klewhtwhrekthklwehtlkh
		 hkjhgsdfiyhsdfgtwselgtwt
		 
        </p>
      </div>-->
 
 <!--<div id="book_now_buttion">
  <div id="viewroom_text">     
   
<div id="booh_buttion_11">-->
  <div id="booknow_text1"><a href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><img src="images/next-buttion.png"></a></div>
  
  </div>
  </div>
</td>
<?php
/*$propertyid=$properties_data['ppro_id'];
 $days=mysql_query("SELECT stop_sell FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'and ppro_id='$propertyid'and stop_sell='stopsell'");
$no_stopsell=mysql_num_rows($days);
/*echo "SELECT stop_sell FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'and ppro_id='$propertyid'and stop_sell='stopsell'";
echo $no_stopsell;*/
?>

<?php 
//if($no_stopsell)
//{ 
//echo "<b>Not Avilable</b>";}
//else{?>



</tr>
</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b>AUS $<?php echo $rat[0];?></b></td>
<?php
for($i=0; $i<$whichrow; $i++){ 
$low_rate=mysql_query("SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'  AND  newgrid_date>='$curntdate'");
//echo "SELECT MIN(roomrate),flag FROM wp_inventory_grid_details WHERE ppro_id='$property_id'";
//echo "SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id'  AND  newgrid_date>='$curntdate'";?>

<?php while($bfdata=mysql_fetch_row($low_rate))
{?>
<td bgcolor="#15a42e" width="50">

	<a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></font></a>

</td>
<?php 
/*if($bfdata[1]=='sold')
{?>
	<td  bgcolor="#999999">
	<font  color="#FFFFFF"><?php echo "SOLD";?></font>
    </td>
    <?php }
	  
	
	else
	{?>
		<td bgcolor="#80E693">
	<?php  echo $bfdata[0];	
		}
    ?>  </td>
<?php*/ } ?>
<?php }
}

?>

</tr>


</table>

</div></div></div>

 
  
  
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $rdata;?></h3>
  </div>
  <div class="modal-body">
 	<h3 id="myModalLabel"> Description:</h3><hr>
    <p><?php echo $address;?></p>
    <h3 id="myModalLabel">Features:</h3><hr> 
    <p><?php echo $ds;?></p>
    
  
   
  </div>
  <div class="modal-footer">
   <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>-->
  </div>
</div>

  </body></html>
  
  <script>
  	$(function(){
		$('#example').popover();
	});
  </script>