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
<link href="css/stylesheet_fonts.css" rel="stylesheet" type="text/css" />
<head>

 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />

		<!--<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">--->
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
		<script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-popover.js"></script>	
             <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
			 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
             <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <style>
 .underline {
    /*text-decoration:line-through;*/
}
 </style>







<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
 
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});
$(function() {
    $( "#datepicker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
        maxDate: '+6m' ,
		dateFormat:"yy-mm-dd"
    });
});




 $(document).ready(function(){             
							$("#datepicker3").change(function(){            
							var datepic=$("#datepicker3").val(); 
							var ppro_id=$("#ppro_id").val(); 
							var avr=$("#avr").val();
                                                        $.ajax({ 
								type: "POST",
								url: "getdates1.php",
								//data: "datepic_id="+ datepic,
								data: { data1:datepic, data2:ppro_id, data3:avr},
								success: function(response){
									//alert("response");
								$("#main_tbody1").replaceWith(response);  
								//$("#moeder").attr("size","10");
								//$("#moeder").css("width","100%");
								//$("#moeder").show('fast');
								//if($("#moeder").html().length<=500){
								//	$('#motherid').val(0);
								//	$("#motherdetails").hide('fast');
								//}
								}
								
							});      
							
							});
							
				});






						  
  </script>
</head>
<body><div id="main1">
<!--<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>-->
<!--<div id="menu_bar">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >>  <?php echo $propertyname['Name'];?></font> </b></div>
</div> -->

<div style="width:1024px; height:500px; float:left;">     
      
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
<!--<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>-->
<div><input type="text" id="datepicker3" width="500px" height="200px" name="arrival" value="<?php echo $_POST['arrival'];?>" style="width:160px; height:25px; margin-top:10px;"></div>
</div>
<input type="hidden" id="ppro_id" value="<?php echo $ppro_id;?>">
<input type="hidden" id="avr" value="<?php echo $avr;?>">

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
     <!-- <div style="width:120px; float:left; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="RoomSelection.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <div style="margin: 7px 0px 0px 13px;"><b>Previous <?php echo $griddays;?> Days</b></div></a>
    </div>-->
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
           <!-- <div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right;" >
            <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>-->
       <?php
	    }
	  }  ?>
</div>

<table id="main_tbody1" width="970" height="70px"   border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270"  colspan="2" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" size="2" ><b><?php echo $propertyname['Name'];?>-Room Types</b></font></td>
<!--<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>-->
<?php
 $whichrow=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

<td bgcolor="#c5c5c5" width="50">&nbsp;
<!--<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > -->
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//echo $ch=Date('D-d-M',strtotime($d));
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
				<td colspan="1"> <div style="width:120px;  float:right; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="RoomSelection.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><div style="margin: 7px 0px 0px 13px;"><b>Previous <?php echo $griddays;?> Days</b></div></font></a>
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
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
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
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
$rat=mysql_fetch_array($rack);
?>
<tr align="center">
<td>

<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
<td width="250"  height="60" bgcolor="#1c3f52"><b><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>'"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></b>

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
<td width="83"  bgcolor="#c5c5c5">&nbsp;<b>AUS $<?php echo $rat[0];?></b></font></td>
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
<!--<table>
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
</table>--></div></div>
<!-- Button to trigger modal -->

 
<!-- Modal -->
<!--<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  <div class="modal-footer">-->
   <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>-->
  </div>
</div>		
</body></html>