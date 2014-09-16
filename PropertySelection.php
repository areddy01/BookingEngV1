<?php
ob_start();
require_once('functions.php');
require_once('connection.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$user=new User();
//echo "<pre>";
//print_r($_SERVER); 
$bf_id=$_REQUEST['bf_id'];
$tmp=$_REQUEST['temp'];
$prev=$_REQUEST['prev'];
$ppro_id=$_GET['ppro_id'];
$arrival=$_REQUEST['arrival'];
 $avr=$_REQUEST['avr'];
 if($bf_id=='17121432'){
$boookform=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
  $user_id=$boookformdata['user_id'];
  }else{
  $boookform=mysql_query("SELECT distinct user_id FROM wp_userforms WHERE book_id='$bf_id'");
$boookformdata=mysql_fetch_array($boookform);
  $user_id=$boookformdata['user_id'];
  }
 $query="select * from wp_griddateselection where user_id='$user_id'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);

 $to=$q2['todate'];
 

  $enddat = date('Y-m-d ', strtotime($to));
 
 
 $bg=mysql_query("SELECT * FROM wp_color");
$bgclr=mysql_fetch_array($bg);
$bgcolor=$bgclr['color'];
 
 
 
 
//exit;

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Grid</title>


<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/properties.js"></script>
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

 <script>
  var dateToday = new Date();
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
							var bfid=$("#bfd").val();
							var slot=$("#slot1").val();
							
							
							//var arrival=$("#input-xlarge").val();
							//var datepic=$arrival;
							$.ajax({ 
								type: "POST",
								url: "getdates.php",
								data: {datepic_id:datepic, bf_id:bfid,slot:slot},
								success: function(response){
							
								$("#search").replaceWith(response);  
								
								}
								
							});      
							
							});
							
				});

  </script>
 
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
	
	
    $( "#input-xlarge" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd",
   gotoCurrent: true}).datepicker('setDate',"0");
});


             $(function() {
							$(".btn").click(function(){ 
							          
							        
							var ppro_id=$("#select02").val();
							var arrival=$("#input-xlarge").val();
							var region=$("#select01").val();
							var bf_id=$("#bf_id").val();
							var data3=$("#data3").val();
							var user_id=$("#userid").val();
							var slot=$("#slot").val();
							var property=$("#property").val();
							$("#datepicker3").val(arrival);
							
							$.ajax({ 
								type: "POST",
								url: "widget_roomselection.php",
								data: {ppro_id:ppro_id, arrival:arrival,region:region,bf_id:bf_id,data3:data3,user_id:user_id,slot:slot,property:property},
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
$grid=mysql_query("SELECT * FROM wp_general_settings where user_id='$user_id'"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
 $currency=$gridsettings['DefaultCurrency'];

 $curntdate=Date("Y-m-d");
 $enddate=Date("Y-m-d", strtotime("+$griddays days"));?>
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
            <label class="control-label" for="input01" style="color:#FFF;">Region</label>  
            <div class="controls">  
              <select id="select01" name="region" onChange="changePP('changeprpty.php?id='+this.value)">
              <option selected="selected">--Select destination--</option>
              <?php
         while($row1 = mysql_fetch_array($result))
        {
         $city_id= $row1['city_id'];
          ?>
          <option value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1['city_name'];?></option>
  
          <?php
           $sqry=mysql_query("SELECT *  FROM wp_region where city_id=$city_id order by region_name")or die(mysql_error());
       
             while($row12 = mysql_fetch_array($sqry))
             {?>
             <option value="<?php echo $row12['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">.....<?php echo $row12['region_name'];?></option>
          <?php }

       } ?>
     </select>
    </div> </div>
    <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Property</label>  
            <div class="controls">  
            <select name="ppro_id"  id="select02" >
    <option selected="selected">--Select Property--</option>
  </select>
             
       
 
          </div>  
          </div>
           
          <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Arrival</label>  
            <div class="controls"> 
             
               <input type="text" id="input-xlarge"   name="arrival"> 
                <input type="hidden" id="bf_id"   name="bf_id" value="<?php echo $bf_id;?>"> 
                
                  <input type="hidden" id="userid" value="<?php echo $user_id;?>">
                   <input type="hidden" id="slot" value="slot">
                   <input type="hidden" id="property" value="property">
               
            </div>  
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="button" name="search" class="btn" value="Search">  </div>  
          </div>
         
        </fieldset>  
</form> 

</div>
<?php
}
?>

 

<div class="container widen">

   
</div>
<div class="span12 widen">
<!--<div class="container">-->
<div class="widen">



<div class="span11 widen">


<ul>


<li class="green"><input type="text"  style="background-color:#<?php echo $bgcolor;?>;width:10px;height:10px;" />&nbsp;<strong>AVAILABLE</strong></li>

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
}else{?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="<?php echo $arrival;?>" >
<?php } ?>




</strong></li>

<input type="hidden" id="bfd" value="<?php echo $bf_id;?>">
<input type="hidden" id="slot1" value="slot">

</li>	
	






  </ul>





</div>


<div id="main">

 <?php 
/*$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
 $currency=$gridsettings['DefaultCurrency'];

 $curntdate=Date("Y-m-d");
 $enddate=Date("Y-m-d", strtotime("+$griddays days"));*/
 ?>
 <?php
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
		
<?php 

$query="SELECT * FROM wp_properties WHERE ppro_id is not null";
if($user_id=='1')
{
$query=$query;
}
else
{
$query=$query." and ppro_id='$ppd'";
}
if($ppro_id)
{
$query=$query." and ppro_id='$ppro_id'";
}
$properties=mysql_query($query);
?>
<div id="search">
<div class="row-fluid">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" height="139" align="left" valign="top">
		<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
							<td  class="bigbox_blue" height="57"><strong>Properties</strong></td>
							<td  class="bigbox_blue_small" height="57"><strong>FULL RATE</strong></td>
				</tr>
			  
		 
									
									<?php
									if($user_id=='1'){
									$m="select firstname from wp_manage_user where id='1'";
									}else{
									 $m="select distinct ppro_id from wp_manage_mappings where user_id='$user_id'";
									 }
									 $map=mysql_query($m);
									while($row=mysql_fetch_array($map)){
									$ppd=$row['ppro_id'];
									//$roomid=$row['roomid'];
									//$room_id=$row['room_id'];
									
									 $query="SELECT * FROM wp_properties WHERE ppro_id is not null";
if($user_id=='1')
{
$query=$query;
}
else
{
$query=$query." and ppro_id='$ppd'";
}
if($ppro_id)
{
$query=$query." and ppro_id='$ppro_id'";
}

$properties=mysql_query($query);
									while($properties_data=mysql_fetch_array($properties))
									{
									$property_id= $properties_data['ppro_id'];
									 if($user_id=='1'){
									 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									 
									 }else{
									 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									 }
									
										
									$rat=mysql_fetch_array($rack);
									if($user_id=='1'){
									$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									}else{
									$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									}
									$roomcount=mysql_num_rows($rdetails);
									?>
								
				<tr>
				 <input type="hidden" id="data3"   name="data3" value="<?php echo $roomcount;?>"> 						<td class="bigbox_dark">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td colspan="1" align="center" height="51" class="property_name"><strong>
															<b><a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php echo $tmp;?>"><font color="#FFFFFF" size="2"><?php echo $properties_data['Name']; ?></a></font></strong></td>


															<td width="60" class="next_col">
															<a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php echo $tmp; ?>"><img src="images/MORE.jpg" class="more_img"></a></td>

														</tr> 
														<tr>

														</tr>
													</table>
												</td>
												<td class="doalr_section" height="50"> <strong> <strong>&nbsp;<b><?php echo $currency;?> <?php echo $rat[0];?></b></strong></a></strong></td>

			    </tr>
									<?php }} ?>
									
									
									
									
		</table>
   </td>




<?php
  
 $flage=0; 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
							  $whichrow=$whichrow + 1;
								 ?>	
								   <td  width="<?php echo $_td_width=(70/$griddays);?>%" valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td height="57" colspan="2" align="center" valign="middle" bgcolor="#C5C5C5"  class="table_dates">
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
									$map="select firstname from wp_manage_user where id='1'";
									}else{
											 $map="select distinct ppro_id from wp_manage_mappings where user_id='$user_id'";
											 }
											$m=mysql_query($map) ;
									while($row=mysql_fetch_array($m)){
									$ppd=$row['ppro_id'];
									//$roomid=$row['roomid'];
									//$room_id=$row['room_id'];

											$query="SELECT * FROM wp_properties WHERE ppro_id is not null";
if($user_id=='1')
{
$query=$query;
}
else
{
$query=$query." and ppro_id='$ppd'";
}
if($ppro_id)
{
$query=$query." and ppro_id='$ppro_id'";
}
$properties=mysql_query($query);
											while($properties_data=mysql_fetch_array($properties))
											{
											$property_id= $properties_data['ppro_id'];
											if($user_id=='1'){
									$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									}else{
									$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show' ");
									}
											$roomcount=mysql_num_rows($rdetails);
											$roomdetails=mysql_fetch_array($rdetails);
											
											$nights=$roomdetails['roomrate'];
											$night=($nights*5);
											$address=$properties_data['addr2'];
											$des=$properties_data['ds'];
											 if($user_id=='1'){
									 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									 
									 }else{
									 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
									 }
									
											$rat=mysql_fetch_array($rack);?>

											<?php
											/*$low_rate=mysql_query("SELECT  min(newroomrate),flag,newstop_sell FROM wp_room_inventory_grid_details WHERE ppro_id='$property_id' AND  newgrid_date='$edate'");*/
											if($user_id=='1')
{
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
										}else{
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and user_id='$user_id' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and user_id='$user_id' and newstop_sell !='sold' and showroom='show')");
										
										}
											$bfdata=mysql_fetch_array($low_rate);
											if($bfdata['flag']=='availability')
											{
											?>
											<tr>
			<td height="53"  align="center" valign="middle" bgcolor="#<?php echo $bgcolor;?>" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">

												       <a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else{ echo $prev;}?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></a>

												</td>
											
												
												<?php }else if($bfdata['flag']=='enquiry'){ ?>
												<tr>
												<td height="53"  align="center" valign="middle" bgcolor="#b7be00" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">

												       <a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else{ echo $prev;}?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></a>
												
												
											<?php	}
												else 
												{
												?>
												<tr><td height="53"  align="center" valign="middle" bgcolor="#e3e3e3" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">
													<?php echo "SOLD";?>
												</td> 
												
												<?php  } ?>  
											</tr> 
									   
							    
											<?php }} ?>
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
</table>
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
				<a href="PropertySelection.php?page=<?php echo $pre;?>&bf_id=<?php echo $bf_id;?>&prev=<?php echo $prev1;?>&ppro_id=<?php echo $ppro_id;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="PropertySelection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&temp=<?php echo $temp;?>&ppro_id=<?php echo $ppro_id;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
		
			?>
			
			<?php	
			
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="PropertySelection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&temp=<?php echo $temp;?>&ppro_id=<?php echo $ppro_id;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
			
<?php } } ?>
</div>

</tr>   

</tr>

</tbody>
</table></div></div></div>

<div class="container">

<div class="span12">

</div>

</div>

</div></div>

</div>

</div>

</body>
</html>