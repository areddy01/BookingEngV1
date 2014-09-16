  <?php 
require_once('functions.php');
require_once('connection.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$user=new User();
$tmp=$_REQUEST['temp'];
$roomid=$_REQUEST['roomid'];
$prev=$_REQUEST['prev'];
 $prpty=$_REQUEST['prpty'];
 $region=$_REQUEST['region'];
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_REQUEST['ppro_id'];
$avr=$_REQUEST['avr'];
$user_id=$_REQUEST['user_id'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings where user_id='$user_id'"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
 $arrival=$_REQUEST['arrival'];
$query="select * from wp_griddateselection where user_id='$user_id'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);

 $to=$q2['todate'];
 

  $enddat = date('Y-m-d ', strtotime($to));
 $bg=mysql_query("SELECT * FROM wp_color");
$bgclr=mysql_fetch_array($bg);
$bgcolor=$bgclr['color'];
$parts = explode("-",$region);
            $one=$parts[0];
             $two=$parts[1];
             $three=$parts[2];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Grid</title>

<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
<script src="js1/bootstrap.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="js/properties.js"></script>
<Script Language="JavaScript">
var objappVersion = navigator.appVersion;
var objAgent = navigator.userAgent;
var objbrowserName  = navigator.appName;
var objfullVersion  = ''+parseFloat(navigator.appVersion);
var objBrMajorVersion = parseInt(navigator.appVersion,10);
var objOffsetName,objOffsetVersion,ix;
 
// In Chrome
if ((objOffsetVersion=objAgent.indexOf("Chrome"))!=-1) {

 objbrowserName = "Chrome";
 objfullVersion = objAgent.substring(objOffsetVersion+7);
 
document.write('<link rel="stylesheet" type="text/css" href="css/bootst.css">');
document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css">');


 
}

// In Firefox
else if ((objOffsetVersion=objAgent.indexOf("Firefox"))!=-1) {

document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap1.css">');
document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css">');

 
}
// In Safari
else if ((objOffsetVersion=objAgent.indexOf("Safari"))!=-1) {

 objbrowserName = "Safari";
 objfullVersion = objAgent.substring(objOffsetVersion+7);
 if ((objOffsetVersion=objAgent.indexOf("Version"))!=-1)
   objfullVersion = objAgent.substring(objOffsetVersion+8);
   document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap1.css">');
document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css">');

}
// In Internet Explorer
else if ((objOffsetVersion=objAgent.indexOf("Microsoft"))!=0) {

document.write('<link rel="stylesheet" type="text/css" href="css/bootstie.css">');
document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css">');

 
}

// For other browser "name/version" is at the end of userAgent
else if ( (objOffsetName=objAgent.lastIndexOf(' ')+1) <
          (objOffsetVersion=objAgent.lastIndexOf('/')) )
        
{
 objbrowserName = objAgent.substring(objOffsetName,objOffsetVersion);
 objfullVersion = objAgent.substring(objOffsetVersion+1);
 if (objbrowserName.toLowerCase()==objbrowserName.toUpperCase()) {
  objbrowserName = navigator.appName;
    document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap1.css">');
document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css">');

 }
}
// trimming the fullVersion string at semicolon/space if present
if ((ix=objfullVersion.indexOf(";"))!=-1)
   objfullVersion=objfullVersion.substring(0,ix);
if ((ix=objfullVersion.indexOf(" "))!=-1)
   objfullVersion=objfullVersion.substring(0,ix);
 
objBrMajorVersion = parseInt(''+objfullVersion,10);
if (isNaN(objBrMajorVersion)) {
 objfullVersion  = ''+parseFloat(navigator.appVersion);
 objBrMajorVersion = parseInt(navigator.appVersion,10);
}

</script>



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
		dateFormat:"yy-mm-dd"
    });
});

 $(document).ready(function(){             
							$("#datepicker3").change(function(){            
							var datepic=$("#datepicker3").val(); 
							var ppro_id=$("#ppro_id").val();
							var bf_id=$("#bf_id").val();
							 var avr=$("#avr").val();
							 var slot=$("#slot").val();
							 var userid=$("#userid").val();
							
							$.ajax({ 
								type: "POST",
								url: "getdates1.php",
								//data: "datepic_id="+ datepic,
								data: { datepic:datepic, ppro_id:ppro_id, avr:avr,slot:slot,userid:userid,bf_id:bf_id},
								success: function(response){
									$("#main").replaceWith(response);  
							
								}
								
							});      
							


							});
							
				});

  </script>
   <script>
  
  var dateToday = new Date();


$(function() {
	
	
    $( "#input-xlarge" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd",
		
  gotoCurrent: true}).datepicker('setDate',"0");
});

$(function() {
	
	
    $( "#input-xlarge1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
		
  });
});

//$(document).ready(function(){
             $(function() {
							$(".btn").click(function(){            
							var ppro_id=$("#select02").val();
							
							if($("#input-xlarge").val()){
							var arrival=$("#input-xlarge").val();
							}else{
							var arrival=$("#input-xlarge1").val();
							}
							var region=$("#select01").val();
							var bf_id=$("#bf_id").val();
							var data3=$("#data3").val();
							var slot=$("#slot").val();
							var roomtype=$("#roomtype").val();
							var avr=$("#avr").val();
							var user_id=$("#userid").val();
							$("#datepicker3").val(arrival);
							
							$.ajax({ 
								type: "POST",
								url: "widget_roomselection.php",
								data: {ppro_id:ppro_id, arrival:arrival,region:region,bf_id:bf_id,data3:data3,slot:slot,roomtype:roomtype,avr:avr,user_id:user_id},
								success: function(response){
								
							
							$("#search").replaceWith(response);
								
								}
								
							});      
							
							});
							
				});

  </script>

</head>

<body>
 <?php
 

if($gridsettings['flag']==1)
 {
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>
<div class="row-fluid widen">


<div class="span12 widen"><div class="container widen">



<div class="span11 widen" style="background:#1f5771;">
<form class="form-horizontal">  
        <fieldset>  
         <br>
          <div class="control-group">  
          <?php  $p=mysql_query("SELECT region_id,city_id FROM wp_properties where ppro_id='$ppro_id'");
          $m=mysql_fetch_array($p);?>
            <label class="control-label" for="input01" style="color:#FFF;">Region</label>  
            <div class="controls">
            
              <?php
               $result = mysql_query("SELECT * FROM wp_citys w_c LEFT JOIN wp_region w_r ON w_c.city_id = w_r.city_id")
	       or die(mysql_error());
              ?>
              <select id="select01" name="region" onChange="changePP('changeprpty.php?id='+this.value)">
               <option selected="selected">--Select destination--</option>
           <?php   while($row1 = mysql_fetch_array($result))
              { 
            
             if($last_c_id!=$row1['city_id'])
             { 
            // if(empty($three))
            // {
              ?>
             <option  <?php // if(empty($three))
           //{ 
           if($one==$row1 ['city_id'] || $m['city_id']==$row1 ['city_id'] ){ ?>selected="selected" <?php }?> value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1 ['city_name'];?></option>
             <?php } //} 
             ?>
             <option <?php //if(!empty($three)){
              if($one==$row1 ['region_id'] || $m['region_id']==$row1 ['region_id']){ ?>selected="selected" <?php }  ?> value="<?php echo $row1['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">....<?php echo $row1 ['region_name'];?></option>
         <?php 
          $last_c_id=$row1 ['city_id'];
       } ?>
     </select>
    
     
    </div> </div>
    <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Property</label>  
            <div class="controls">  
             <?php
             $vvvv=mysql_query("SELECT * FROM wp_properties");
     //  $row = mysql_fetch_array($vvvv);?>
            <select name="ppro_id"  id="select02" >
            <option>--Select Property--</option>
            <?php
            while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option <?php  if($ppro_id==$row2['ppro_id']){ ?>selected="selected" <?php }?> value="<?php echo $row2['ppro_id'];?>-<?php echo $user_id;?>"><?php echo $row2['Name'];?></option>
             
             <?php } ?>
  </select>
             
       
          </div>  
          </div>
           
          <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Arrival</label>  
            <div class="controls"> 
             <?php
           
             if($tmp) { ?>
              <input type="text" id="input-xlarge1"   name="arrival" value="<?php echo $tmp;?>"> 
              <?php } else if($prev){ ?>
               <input type="text" id="input-xlarge1"   name="arrival" value="<?php echo $prev;?>"> 
              <?php }else if($arrival){ ?>
               <input type="text" id="input-xlarge1"   name="arrival" value="<?php echo $arrival;?>"> 
            <?php  }else{ ?>
           
               <input type="text" id="input-xlarge"   name="arrival"> 
               <?php   } ?>
                <input type="hidden" id="bf_id"   name="bf_id" value="<?php echo $bf_id;?>"> 
                 <input type="hidden" id="data3"   name="data3" value="<?php echo $avr;?>"> 
                  <input type="hidden" id="solve"   name="solve" value="<?php echo solve;?>">
             
            </div>  
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="button" name="search" class="btn" value="Search" >  </div>  
          </div>
        </fieldset>  
</form> 








</div>



<div class="container widen">
   
</div>

<div class="span12 widen"><!--<div class="container">-->

<div class="widen">

<div class="span11 widen">


<ul>


<li class="green"><input type="text"  style="background-color:#<?php echo $bgcolor;?>;width:7px;height:10px;" />&nbsp;<strong>AVAILAIBILE</strong></li>

<li class="yellow"><strong>MAKE AN ENQUIRY</strong></li>

<li class="grey"><strong>SOLD</strong></li>


<?php
if($tmp){
?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="<?php echo $tmp;?>" >
<?php 
}else if($prev){
?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="<?php echo $prev;?>" >
<?php 
}else if($arrival){?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="<?php echo $arrival;?>" >
<?php }else{ ?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3"  >
<?php } ?>
<input type="hidden" id="userid" value="<?php echo $user_id;?>">

<input type="hidden" id="userid" value="<?php echo $bf_id;?>">

</strong></li>

  </ul>
 
    </div>
    <div id="search">
    <div id="main">
    <input type="hidden" id="avr" value="<?php echo $avr;?>">
    <input type="hidden" id="slot" value="slot">
<input type="hidden" id="ppro_id" value="<?php echo $ppro_id;?>">
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
if($ppro_id!='')
{
if($arrival){
				$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$arrival' and newgrid_date<='$enddat' and user_id='$user_id' and showroom='show'";
}else{
$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate' and newgrid_date<='$enddat' and user_id='$user_id'  and showroom='show'";

}
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
		
		@ mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
        <!-- <div style="float:left;">--><div>
         <?php
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		    $pre = (int)$page - 1;
          ?>
   
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <?php
	    }
	  }  ?>
	
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
			if($arrival){
			$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$arrival' and newgrid_date<='$enddat' and user_id='$user_id' and showroom='show'";
			}else{

$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate' and newgrid_date<='$enddat' and user_id='$user_id' and showroom='show'";
	
	}
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
	
<div class="row-fluid widen">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
       <td width="10%" height="139" align="left" valign="top">
		  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
			        <td width="50%" class="bigbox_blue" height="57"><strong>
					roomselection<?php echo $propertyname['Name'];?>
					Room Types</strong></td>
				    <td width="50%" class="bigbox_blue_small" height="57"><strong>FULL RATE</strong></td>
				</tr>
			
			
              
					
						<?php 
						if($user_id=='1'){
									$m="select firstname from wp_manage_user where id='1'";
									}else{
									 $m="select distinct roomid from wp_manage_mappings where user_id='$user_id' and ppro_id='$ppro_id'";
									 }
						 $map=mysql_query($m);
									while($row=mysql_fetch_array($map)){
									$rmd=$row['roomid'];
						
						if($user_id=='1'){
						$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
						}else{
						$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$rmd'";
						}
						if($roomid){
						$dquery=$dquery." and roomid='$roomid'";
						}
						$rproperties=mysql_query($dquery);
						while($details=mysql_fetch_array($rproperties))
						{ 
						$rquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
						if($user_id=='1'){
						$rquery=$rquery;
						}else{
						$rquery=$rquery." and $rquery=$rquery";
						
						}
						if($roomid){
						$rquery=$rquery." and roomid='$roomid'";
						}
						$rdetails=mysql_query($rquery);
								@$roomcount=mysql_num_rows($rdetails);
								@$roomdetails=mysql_fetch_array($rdetails);
								$room_id=$details['roomid'];
								$rdata=$details['name'];
								$roomdata=$roomdetails['defaultinclusion'];
								if($user_id=='1'){
								$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show' and user_id='$user_id'");
								}
								$rate=mysql_fetch_array($q1);
								$nights=$rate[0];
								$night=($nights*5);
								$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
								$popup_res=mysql_fetch_array($popup_query);
								$popup_des=$popup_res['ds'];
								$popup_featured=$popup_res['features'];
								if($user_id=='1'){
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}
								$rat=mysql_fetch_array($rack);
						
						?>
				<tr>
					<td class="bigbox_dark">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
									<?php 
									if($arrival)
									{
									?>
									<td colspan="1" align="center" height="51" class="property_name"><strong><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){ echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>'"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></b></td>
									<?php 
									}else
									{
									?>
									<td colspan="1" align="center" height="51" class="property_name"><strong><a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>'"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></b></td>
								
								
								   <?php
									}?>
									
									
								   
									<?php 
									if($arrival)
									{
									?>
									<td width="60" class="next_col"><a href='roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><img src="images/MORE.jpg" class="more_img"></a></td>
									<?php 
									}else
									{
									?>
									<td width="60" class="next_col" ><a href='roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>'"><img src="images/MORE.jpg" class="more_img"></a></td>
									<?php
									}?>
									
								    </tr>
								    </table>
					</td>
					<td class="doalr_section"> <strong> <strong><b><?php echo $currency;?> <?php echo $rat[0];?></b></font></strong></td>

			    </tr>
							<?php }	}?>
																
		</table>
   </td>
<?php
 $whichrow=0;
$flage=0;
while($inventoory_grid_data=mysql_fetch_array($sql1)){

								$whichrow=$whichrow + 1;
								?>	
	 <td  width="<?php echo $_td_width=(70/$griddays);?>%" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td height="57" colspan="1" align="center" valign="middle" bgcolor="#C5C5C5"  class="table_dates" >
												<?php
								$d=$inventoory_grid_data['newgrid_date'];
								$ch=Date('D d M',strtotime($d));
								echo $ch=strtoupper($ch);
								$edate=Date("Y-m-d",strtotime($d));
								if($flage==0){
											$prev1=Date("Y-m-d",strtotime($d."-".$griddays."day"));
													}
								?>
					</td>
					</tr>
								<?php
								if($user_id=='1'){
									$m="select firstname from wp_manage_user where id='1'";
									}else{
									 $m="select distinct roomid from wp_manage_mappings where user_id='$user_id' and ppro_id='$ppro_id'";
									 }
						 $map=mysql_query($m);
									while($row=mysql_fetch_array($map)){
									$rmd=$row['roomid'];
								if($user_id=='1'){
						$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
						}else{
						$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$rmd'";
						}
						if($roomid){
						$dquery=$dquery." and roomid='$roomid'";
						}
						$rproperties=mysql_query($dquery);
						while($details=mysql_fetch_array($rproperties))
						{ 
						$rquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
						if($user_id=='1'){
						$rquery=$rquery;
						}else{
						$rquery=$rquery." and $rquery=$rquery";
						
						}
						if($roomid){
						$rquery=$rquery." and roomid='$roomid'";
						}
						$rdetails=mysql_query($rquery);
								@$roomcount=mysql_num_rows($rdetails);
								@$roomdetails=mysql_fetch_array($rdetails);
								$room_id=$details['roomid'];
								$rdata=$details['name'];
								$roomdata=$roomdetails['defaultinclusion'];
								if($user_id=='1'){
								$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show' and user_id='$user_id'");
								}
								$rate=mysql_fetch_array($q1);
								$nights=$rate[0];
								$night=($nights*5);
								$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
								$popup_res=mysql_fetch_array($popup_query);
								$popup_des=$popup_res['ds'];
								$popup_featured=$popup_res['features'];
								if($user_id=='1'){
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}
								$rat=mysql_fetch_array($rack);
								?>
								
								<?php
								/*$bf_qry=mysql_query("SELECT  min(newroomrate),flag,newstop_sell FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id'  AND  newgrid_date='$edate' AND roomid='$room_id'");*/
								if($user_id=='1'){
							$bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
							}else{
							$bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and user_id='$user_id' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and user_id='$user_id' and flag !='sold' and newstop_sell !='sold' and showroom='show')");
							
							}
                                $bf_data=mysql_fetch_array($bf_qry);
								if($bf_data[1]=='availability')
								{
								?>
					<tr>
					<td height="53"  align="center" valign="middle" bgcolor="#<?php echo $bgcolor;?>" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">
					
					       <?php 
									if($arrival)
									{
									?>
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a>
<?php
}else{?>
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a>
<?php
}?>
</td>
					
								<?php }else if($bf_data[1]=='enquiry'){?>
								<tr>
					<td height="53"  align="center" valign="middle" bgcolor="#b7be00" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">
					
					       <?php 
									if($arrival)
									{
									?>
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a>
<?php
}else{?>
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&user_id=<?php echo $user_id;?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a>
<?php
}?>
</td>
								
								<?php }
								else 
								{
								?>
					<td height="53"  align="center" valign="middle" bgcolor="#e3e3e3" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;"><?php echo "SOLD";?>
					</td> 
								
								<?php
								}  ?>
					</tr> 
							
							<?php } }?>
				</table>
	</td>
<?php
								if($whichrow == $maxpage)
								{

								break; 
								}
								$flage=$flage+1;						  
		 }
		  $temp=Date("Y-m-d",strtotime($d."+ 1 day"));			

?>
 </tr>
</table><div>
<tr height="20"> 
   <?php
   $span=$griddays+1;
   ?>
 

 <div><?php if($arrival){
		if($totalpages>1)
		{ 
			if($page > 1)
			{
			   
			
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;  background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="RoomSelection.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&prev=<?php echo $prev1;?>&roomid=<?php echo $roomid;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;
		
				?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&temp=<?php echo $temp;?>&roomid=<?php echo $roomid;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			
			?>
			
			<?php	
			
		
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&temp=<?php echo $temp;?>&roomid=<?php echo $roomid;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				
<?php 
			
		} 
		
		
} }else{
if($totalpages>1)
		{ 
			if($page > 1)
			{
			   
			
				$pre = (int)$page - 1; ?>
				
				<td colspan="1"> <div style="width:120px;   background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="RoomSelection.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&prev=<?php echo $prev;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;
		
				?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			
			?>
			
			<?php	
			
		
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="RoomSelection.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				
<?php 
			
		} 
		
		
}



}
?>
</div>
 
 


</tr>
<?php

}
}
?>
</tr>
</tbody>
</table></table></div></div>

<div class="container widen">

<div class="span12 widen">

</div>

</div>

</div></div>

</div>

</div></div>
<script>
parent.iframeLoaded();
</script>
</body>
</html>