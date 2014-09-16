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
<body><div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo">   </div>
<div style="height:100px; width:1024px	; background:#FFF; float:left;">
<h2><?php echo $propertyname['Name'];?></h2>
<div style="float:right; margin-top:25px;">
<!--<input type="button" value="NEXT <?php echo $griddays;?> DAYS">-->
</div>
</div>
<?php 
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
if($gridsettings['ShowTitle']!='')
 {?>
<?php
 }
if($bf_id!='' && $ppro_id!='' && $avr!='')
{
	$inventoory_qry=mysql_query("SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate' AND str_to_date(grid_date, '%d-%m-%Y')<'$enddate'");

?>
<table border="1" bordercolor="#FFFFFF">
<tr bgcolor="#968862">
<td align="center"><font color="#FFFFFF" size="+2">Rooms </font></td>
<td width="25"><font color="#FFFFFF">FULL RATE</font></td>
<?php
for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($inventoory_qry))
{?>
<td width="30">  <font color="#FFFFFF">
<?php
$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	echo $ch=Date('D-d-M',strtotime($d));
?>
</font></td>
<?php }}?>
</tr>
<?php
$dquery="SELECT * FROM wp_room_mapping WHERE ppro_id='$ppro_id'";
$rproperties=mysql_query($dquery);
while($details=mysql_fetch_array($rproperties))
{
$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
$roomcount=mysql_num_rows($rdetails);
$roomdetails=mysql_fetch_array($rdetails);
$room_id=$details['room_id'];
$rdata=$details['rdata'];
$roomdata=$roomdetails['defaultinclusion'];
$q1=mysql_query("SELECT * FROM wp_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id'");
$rate=mysql_fetch_array($q1);
$nights=$rate['roomrate'];
$night=($nights*5);

$bf_qry=mysql_query("SELECT * FROM wp_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' Limit 0,$griddays");
$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$popup_res=mysql_fetch_array($popup_query);
$popup_des=$popup_res['ds'];
$popup_featured=$popup_res['features'];?>
<tr>
<td>
<table>
<tr>
<td width="250"><?php echo $rdata;?></td><td></td>
<td width="100"><br>5 nights for $<?php echo $night;?><center>
<input type="image" onClick="location.href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['room_id'];?>&ppro_id=<?php echo $roomdetails['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"src="images/booknow.png" ></center></td>
</tr>
<tr><td><!-- Button to trigger modal -->

<input type="image"  onClick="location.href='RoomDetails.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['room_id'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['room_id'];?>'" src="images/roliover-img.2.png" >
 </td></tr>
</table>
</td>
<td class="underline" bgcolor="#FFE6C9"><?php echo $roomdetails['rackrate'];?></td>
<?php
while($bf_data=mysql_fetch_array($bf_qry))
{?>
<td width="30" bgcolor="#80E693"><?php echo $bf_data['roomrate'];?></td>
	<?php
}

}
	
}
?>
</tr></table>
<table>
<tr bgcolor="#968862">
<td width="1024"><h2><?php echo $propertyname['Name'];?></h2></td>
</tr>
<tr>
<td><?php echo  $propertyname['addr1'];?></td>
</tr>
<tr>
<td><?php echo  $propertyname['addr2'];?></td>
</tr>
<tr>
<td><?php echo  $propertyname['ds'];?></td>
</tr>
</table></div></div>
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