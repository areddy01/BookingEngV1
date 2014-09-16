<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_REQUEST['ppro_id'];
$bfrid=$_REQUEST['bfrid'];
$avr=$_REQUEST['avr'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
?>
<html>
<head>
<style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #000 url(bg-texture.png) repeat;
        color: #dddddd;
      }
      
      h1, h3 {
        margin: 0;
        padding: 0;
        font-weight: normal;
      }
      
      a {
        color: #EB067B;
      }
      
      #container {
        width: 100px;
        margin: 100px auto 0 auto;
        padding: 20px;
        background: #000;
        border: 1px solid #1a1a1a;
      }
      
      /* HOVER STYLES */
      .pop-up {
        display: none;
        position: absolute;
        width: 280px;
        padding: 10px;
        background: #eeeeee;
        color: #000000;
        border: 1px solid #1a1a1a;
        font-size: 90%;
      }
    </style>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(function() {
        var moveLeft = 20;
        var moveDown = 10;
        
        $('.trigger').hover(function(e) {
          $('div.pop-up').show();
          //.css('top', e.pageY + moveDown)
          //.css('left', e.pageX + moveLeft)
          //.appendTo('body');
        }, function() {
          $('div.pop-up').hide();
        });
        
        $('.trigger').mousemove(function(e) {
          $("div.pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        
      });
    </script>

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
<script>
  var dateToday = new Date();

$(function() {
	
    $( "#picker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm-dd-yy"
    });
});
$(function() {
    $( "#picker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm-dd-yy"
    });
});
  </script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/bokkingform1.css" rel="stylesheet" type="text/css" />

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
$curntdate=Date("m-d-y");
$enddate=Date("m-d-y", strtotime("+$griddays days"));
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
	
	$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";
/*$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'";*/
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
         <div style=" float:left;width:1024px; height:60px;"><?php
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		    $pre = (int)$page - 1;
          ?>
      <div style="width:120px; float:left; background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; margin:0px 0px 0px 30px; ">
    <a href="roomnames.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <div style=" background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; float:right;" >
            <a href="roomnames.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>
       <?php
	    }
	  }  ?>
</div>
<table border="1" bordercolor="#FFFFFF">
<tr><td><img src="images/gree.jpg">Availablitity &nbsp; &nbsp; &nbsp;<img src="images/green.jpg">Enquiry &nbsp; &nbsp; &nbsp;<img src="images/white.jpg">Sold</td></tr><tr bgcolor="#968862">
<td align="center" bgcolor="#004080"><font color="#FFFFFF" size="+2">Rooms </font></td>
<td width="25"  bgcolor="#004080"><font color="#FFFFFF">FULL RATE</font></td>
<?php
 $whichrow=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

<td width="30" bgcolor="#666666">  <font color="#FFFFFF">
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//$d=$inventoory_grid_data["newgrid_date"]; 
	//echo $ch=Date('D-d-M',strtotime($d));
	echo "<b>".$d=$inventoory_grid_data['newgrid_date']."</b>";
	
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
 $dquery="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid'";
$rproperties=mysql_query($dquery);
while($details=mysql_fetch_array($rproperties))
{
//$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and and roomid='$bfrid'");
//$roomcount=mysql_num_rows($rdetails);
//$roomdetails=mysql_fetch_array($rdetails);
$room_id=$details['roomid'];
$roomid1=$details['room_id'];
$rdata=$details['roomname'];
$fullrate=$details['rackrate'];
 $rackrate=$details['roomrate'];
$roomdata=$roomdetails['defaultinclusion'];
$q1=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1'");
$rate=mysql_fetch_array($q1);
$nights=$rate['newroomrate'];
$night=($nights*5);
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
$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>'$curntdate'";
$sql1= mysql_query($bf_qry) or die(mysql_error());
				
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
         <div style=" float:left;width:1024px; height:60px;"><?php
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		   $pre = (int)$page - 1;
          ?>
    <!--  <div style="width:120px; float:left; background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; margin:0px 0px 0px 30px; ">
    <a href="roomnames.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> </b></a>
    </div>-->
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
           <!-- <div style=" background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; float:right;" >
            <a href="roomnames.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> </b></a></div>-->
       <?php
	    }
	  }  ?>
</div>


<?php 
$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$popup_res=mysql_fetch_array($popup_query);
$popup_des=$popup_res['ds'];
$popup_featured=$popup_res['features'];?>
<tr>
<td>
<table>
<tr>
<td width="250" bgcolor="#004080"><a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"  class="trigger"> <font color="#FFFFFF"><?php echo $rdata;?></font></a>
</td><td></td>
<?php $days=mysql_query("SELECT newstop_sell FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate'and  room_id='$roomid1' and newstop_sell='stopsell'");

$no_stopsell=mysql_num_rows($days);?>
<td width="100">
<?php
if($no_stopsell)
{ 
echo "<b>Not Avilable</b>";}
else{
	?><br>5 nights for $<?php echo $night;?><center>
<input type="image" onClick="location.href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $details['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&minstay=<?php echo$details['minstay'];?>'"src="images/booknow.png" ></center>
<?php }?></td>
</tr>
<tr><td><!-- Button to trigger modal -->

<input type="image"  onClick="location.href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'" src="images/view.jpg" >
 </td></tr>
</table>
</td>
<td class="underline" bgcolor="#666666"><font color="#FFFFFF"><?php echo $fullrate;?></font></td>
<?php
$which=0;
while($bf_data=mysql_fetch_array($sql1))
{
	$which=$which + 1;
	?>
<!--<td width="30" bgcolor="#80E693"><?php echo $bf_data['newroomrate'];?></td>-->
<?php 
if($bf_data['flag']=='sold')
{?>
	<td  bgcolor="#E9E9E9">
	<font  color="#FFFFFF"><?php echo "SOLD";?></font>
    </td>
    <?php }
	  
	
	else if($bf_data['flag']=='enquiry')
	{?>
    
    <td  bgcolor="#B4B669">
	<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"><font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font></a>
 </td>
    <?php }
	else{?>    
    
		<td bgcolor="#80E693">
	<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>" class="trigger"><font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font></a>	
	<?php 	}
    ?> 
     <div class="pop-up">
        <h3><?php echo $rdata;?></h3>
        <p>
         Comfortable room specified Allocation please visit our site For Booking
		
		 
        </p>
   </div> </td>
    
	<?php

		 if($which == $maxpage)
		  {
			
			
			break; 
		  }						  
		 }			

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