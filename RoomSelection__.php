<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_REQUEST['ppro_id'];
$avr=$_REQUEST['avr'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
?>
<html>
<head>
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
  
		<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
 
        <style>
 .underline {
    text-decoration:line-through;
}
 </style>
</head>
<body><div id="main1">
<div id="logo_main" style="display:none;">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar" style="display:none;">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >>  <?php echo $propertyname['Name'];?></font> </b></div>
</div> 

<div style="width:1024px; height:500px; overflow-y:scroll;">     
      
<div id="main_content">
<?php 
$cdate=Date("D M d Y");
?>
<div id="buttion_main">
<div class="green_button"></div>
<div class="available_text">AVAILABLE</div>
<div class="yellow_button"></div>
<div class="makeanenquirry_text">MAKE AN ENQUIRY </div>
<div class="white_button"></div>
<div class="sold_text">SOLD</div>
<div class="start_date_text">START DATE</div>
<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>
</div>

<?php 
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
if($gridsettings['ShowTitle']!='')
 {?>
<?php
 }
$page=$_GET['page'];
 if(!isset($page) || $page <= 0 || $page == "")
{
	$page=1; 					
 }
if($ppro_id!='' && $avr!='')
{
	/*$inventoory_qry="SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'";*/

				$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";
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
		
		 mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
         <div style="float:left;"><?php
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		    $pre = (int)$page - 1;
          ?>
      <div style="width:120px; float:left; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="RoomSelection.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right;" >
            <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>
       <?php
	    }
	  }  ?>
</div>

<table width="984" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><b>Room Types</b></font></td>
<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" style="padding:0px 0px 0px 12px"> FULL RATE</font></td>
<?php
 $whichrow=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

<td bgcolor="#c5c5c5" width="50" ALIGN="CENTER">&nbsp;<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > 
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//echo $ch=Date('D-d-M',strtotime($d));
	$d=$inventoory_grid_data['newgrid_date'];
	echo $ch=Date('D d M',strtotime($d));
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
$rat=mysql_fetch_array($rack);
?>
<tr align="center">
<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
<td width="250"  height="60" bgcolor="#1c3f52"><b><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><font color="#FFFFFF"><?php echo $rdata;?></font></a></b>
<!--<div id="book_now_buttion">
  <div id="viewroom_text">    
   
<div id="booh_buttion_11">-->
  <div id="booknow_text1"><a href='roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><img src="images/next-buttion.png"></a></div>
  
  </div>
  </div></td>
<?php

 //$days=mysql_query("SELECT newstop_sell FROM `wp_room_inventory_grid_details` 
//WHERE newgrid_date>='$curntdate'and roomid='$room_id' and newstop_sell='stopsell'");
/*echo "SELECT stop_sell FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'and roomid='$room_id' and stop_sell='stopsell'";*/
// $no_stopsell=mysql_num_rows($days);

/*echo "SELECT stop_sell FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'and ppro_id='$propertyid'and stop_sell='stopsell'";
echo $no_stopsell;*/
?>

</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;AUS $<?php echo $rat[0];?></font></td>
<?php
for($i=0; $i<$whichrow; $i++)
{ 
 $bf_qry=mysql_query("SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id'  AND  newgrid_date>='$curntdate' AND roomid='$room_id'");
//echo "welcome";
while($bf_data=mysql_fetch_array($bf_qry))
{?>
<td bgcolor="#15a42e" width="50"><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></font></a></td>
	<?php
}

}
}
}
?>
</tr></table>
<!--
 hidden by subbu august-14-2013
<table>
<tr  height="20">
<td width="1024"><h2><?php echo $propertyname['Name'];?></h2></td>
</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['addr1'];?></font></td>
</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['addr2'];?></font></td>
</tr>
<tr>
<td><font family="400 14px/1.8em, Arial, sans-serif" color="#757575" size="-1"><?php echo  $propertyname['ds'];?></font></td>
</tr>
</table>
 -->
</div></div>
<!-- Button to trigger modal -->

 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo $rdata;?></h3>
  </div>
  <div class="modal-body">
 	<h3 id="myModalLabel"> Description:</h3><hr>
    <p><?php echo $popup_des;?></p>
    <h3 id="myModalLabel">Features:</h3><hr> 
    <p><?php echo $popup_featured;?></p>
    <h3 id="myModalLabel">Enquiry Form:</h3><hr>
    <p>
    <table>
    <tr><td>Name:</td><td><input type="text" name="bname"></td></tr>
    <tr><td>mail_id:</td><td><input type="text" name="bmail"></td></tr>
    <tr><td>Phone Number:</td><td><input type="text" name="bphone"></td></tr>
    <tr><td>check_in_date:</td><td><input type="text" name="bindate"></td></tr>
    <tr><td>check_out_date:</td><td><input type="text" name="boutdate"></td></tr>
    <tr><td> Your Message:</td><td><textarea rows="4" cols="5"></textarea></td></tr>
     <tr><td> </td><td><center><input type="submit" name="send" value="send"></center></td></tr></table></p>
    
  </div>
  <div class="modal-footer">
   <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>-->
  </div>
</div>		
</body></html>