<?php 
require_once('functions.php');
require_once('connection.php');
error_reporting(0);
$user=new User(); 
 $bf_id=$_REQUEST['bf_id'];
 $nextid=$_REQUEST['nextid'];
 $property=$_REQUEST['property'];
 $tmp=$_REQUEST['temp'];
  $prev=$_REQUEST['prev'];
$roomtype=$_REQUEST['roomtype'];

 //$ppro_id=$_REQUEST['ppro_id'];
    $ppro_id1=$_REQUEST['ppro_id'];
  $arrival=$_REQUEST['arrival'];
$room=$_REQUEST['room'];
$prpty=$_REQUEST['ppro_id'];
     $region=$_REQUEST['region'];
 $user_id=$_REQUEST['user_id'];
  $page=$_REQUEST['page'];
  $count=$_REQUEST['count'];
  $solve=$_REQUEST['solve'];
  $bg=mysql_query("SELECT * FROM wp_color");
$bgclr=mysql_fetch_array($bg);
$bgcolor=$bgclr['color'];
  
 
 //$ppro_id=$_REQUEST['data2'];
  $avr=$_REQUEST['data3'];
 $slot=$_REQUEST['slot'];
  $avr1=$_REQUEST['avr'];
 
 
 
 
 
 

  if(empty($arrival) && !empty($property) ){
	        echo "<script>
	        	 alert('Please Enter Valid Date')
	        	 location.replace('PropertySelection.php?bf_id=$bf_id')
	        	</script> ";
	        	
	        
	        }else if(empty($arrival) && !empty($roomtype) ){
	      
	        
	         echo "<script>
	        	 alert('Please Enter Valid Date')
	        	 location.replace('RoomSelection.php?bf_id=$bf_id&ppro_id=$roomtype&arr=&avr=$avr1&user_id=$user_id')
	        	</script> ";
	    
	        
	        }else if(empty($arrival) && !empty($room) && !empty($prpty)){
	        
	         echo "<script>
	        	 alert('Please Enter Valid Date')
	        	 location.replace('roomnames_18_07_2013.php?bf_id=$bf_id&bfrid=$room&ppro_id=$prpty&arr=&avr=$avr1&rumid=$room&user_id=$user_id')
	        	</script> ";
	        
	        }
	        else{ 
 
 
 $parts = explode("-",$region);
            $one=$parts[0];
            $two=$parts[1];
            $three=$parts[2];
            
            if($one && $two && $three)
 {
  if($three == '1')
  {
 $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$two' and region_id='$one'");
   }
   else 
   {
   $vvvv=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$two' and wp_manage_mappings.region_id='$one' and wp_manage_mappings.user_id='$three'");
   }
 }
 else
 { 
 if ($two =='1')
 { 
  
  $vvvv=mysql_query("SELECT * FROM wp_properties where city_id='$one'");
  }
  else
  {
   $vvvv=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$one' and wp_manage_mappings.user_id='$two'");
  }
  } 
            
            
            
            
            
            
            if($one && $two && $three){
            
            $query="select * from wp_griddateselection where user_id='$three'";
            }else{
             $query="select * from wp_griddateselection where user_id='$two'";
            
            }
       $q1=mysql_query($query);
        $q2=mysql_fetch_array($q1);

      $to=$q2['todate'];
 

      $enddat = date('Y-m-d ', strtotime($to));
      
 
 //only Property
 ?>
 <?php
if($count or $solve)
{
$result = mysql_query("SELECT *  FROM wp_citys")
or die(mysql_error());
?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Grid</title>

<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
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
			$( "#input-xlarge" ).datepicker({
				showButtonPanel: true,
				minDate: dateToday,
				dateFormat:"yy-mm-dd"
				});
				//gotoCurrent: true}).datepicker('setDate',"0");
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
							 var avr=$("#data3").val();
							 var slot=$("#slot").val();
							 var userid=$("#user_id").val();
							 var region=$("#region").val();
							
							if(ppro_id =='--Located Properties--' )
							{
							$.ajax({ 
								type: "POST",
								url: "getresorts.php",
								data: {arrival:datepic, bf_id:bf_id,slot:slot,region:region,user_id:userid},
								success: function(response){
							
								$("#sdate1").replaceWith(response);  
								
								}
								
							});      
							
							
							
							}else{
							$.ajax({ 
								type: "POST",
								url: "getrooms.php",
								//data: "datepic_id="+ datepic,
								data: {arrival:datepic, ppro_id:ppro_id, avr:avr,slot:slot,user_id:userid,bf_id:bf_id,region:region},
								success: function(response){
									$("#sdate").replaceWith(response);  
							
								}
								
							});      
							
                                                }

							});
							
				});
	
		
  </script>

		
		</script>
</head>
<body>

<div id="search widen">




<div class="row-fluid widen">


<div class="span12 widen"><div class="container widen" >



<div class="span11 widen" style="background:#1f5771;">


<form class="form-horizontal" action="widget_roomselection.php" method="post" >  
        <fieldset>  
         <br>
          <div class="control-group">  
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
           
            ?>
          <option <?php  if(empty($three))
           { if($one==$row1 ['city_id']){ ?>selected="selected" <?php } }?> value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1 ['city_name'];?></option>
             <?php 
              }  ?>
             <option <?php if(!empty($three)){ if($one==$row1 ['region_id']){ ?>selected="selected" <?php } } ?> value="<?php echo $row1['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">....<?php echo $row1 ['region_name'];?></option>
         <?php 
          $last_c_id=$row1 ['city_id'];
       } ?>
     </select>
    
     
    </div> </div>
    <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Property</label>  
             <div class="controls">  
          
            <?php
            // $vvvv=mysql_query("SELECT * FROM wp_properties where ppro_id='$one'");
           // echo "sdfss,$prpty";
            if($prpty)
            {
           $explode_prpty= explode('-',$prpty);
          
         // echo $explode_prpty[0];
           
            }
            
            ?>
   
            <select name="ppro_id"  id="select02" >
           
             <option selected="selected">--Located Properties--</option>
    
         <?php   while($row2 = mysql_fetch_array($vvvv))
              { ?>
            <option <?php  if($explode_prpty[0]==$row2['ppro_id']){ ?>selected="selected" <?php }?> value="<?php echo $row2['ppro_id'];?>-<?php echo $user_id;?>"><?php echo $row2['Name'];?></option>
             <!--</select>-->
             <?php } ?>
  </select>
             
       
          </div>  
          </div>
           
          <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Arrival</label>  
            <div class="controls"> 
            <?php
            if($prev){ ?>
             <input type="text" id="input-xlarge"   name="arrival" value="<?php echo $prev;?>"> 
             <?php
            }else if($tmp){ ?>
             <input type="text" id="input-xlarge"   name="arrival" value="<?php echo $tmp;?>"> 
            <?php }else{ ?>
             <input type="text" id="input-xlarge"   name="arrival" value="<?php echo $arrival;?>"> 
             <?php } ?>
              
             <input type="hidden" id="user_id"   name="user_id" value="<?php echo $user_id;?>"> 
                <input type="hidden" id="bf_id"   name="bf_id" value="<?php echo $bf_id;?>"> 
                 <input type="hidden" id="data3"   name="data3" value="<?php echo $_REQUEST['data3'];?>"> 
                  <input type="hidden" id="solve"   name="solve" value="<?php echo solve;?>">
                    
                  <input type="hidden" id="ppro_id"   name="solve" value="<?php echo $_REQUEST['ppro_id'];?>">
             <input type="hidden" id="slot" value="slot">
              <input type="hidden" id="region" value="<?php echo $region;?>">
            </div>  
            
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="submit" name="search" class="btn" value="Search" >  </div>  
          </div>
        </fieldset>  
</form> 



</div>
</div>



<div class="container widen">
   
</div>

<div class="span12 widen"><div class="container widen">

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
}else if($arrival){?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="<?php echo $arrival;?>" >
<?php }else{ ?>
<li class="white"><strong>START DATE <input name="" type="text" id="datepicker3" value="" ><?php } ?>
</strong></li>

  </ul>
 
    </div>
    <?php
    echo $slot;
    }?>
<div id="sdate1">
<div id="search">










<?php 

  
 
  if($_REQUEST['ppro_id']=='--Located Properties--')
  
 {
  
 
      /*  $parts = explode("-",$region);
           $one=$parts[0];
           $two=$parts[1];
           $three=$parts[2];*/
          

           ?>
               <div id="search">

               <?php
               if($three){
                $grid=("SELECT * FROM wp_general_settings where user_id='$three'");
               }else{
                $grid=("SELECT * FROM wp_general_settings where user_id='$two'");
               } 
                $grid1=mysql_query($grid); 
                $gridsettings=mysql_fetch_array($grid1);
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
			
             if($one && $two && $three){
 		$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
		WHERE newgrid_date>='$arrival' and newgrid_date<='$enddat' and user_id='$three' and showroom='show'";
		
		}else{
		$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
		WHERE newgrid_date>='$arrival' and newgrid_date<='$enddat' and user_id='$two' and showroom='show'";
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
		mysql_data_seek($sql1,($page-1) * $maxpage);
		
		


          
     
	

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
										
			
           if($one && $two && $three)
          {
            if($three == '1')
            {
            $properties=mysql_query("SELECT * FROM wp_properties where city_id='$two' and region_id='$one'");
            }else{
             $properties=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$two' and wp_manage_mappings.region_id='$one' and wp_manage_mappings.user_id='$three'");
             }
            
       
          }
         else
         {  
          if($two == '1')
            {
  
          $properties=mysql_query("SELECT * FROM wp_properties where city_id='$one'");
           }else{
             $properties=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$one'and wp_manage_mappings.user_id='$two'");
           
           }
          
         
          } 
	               $r=mysql_num_rows($properties);
	               
	               if($r>0){
						
			
					while($properties_data=mysql_fetch_array($properties))
					{
					
					
					
					 $property_id= $properties_data['ppro_id'];
					
					 
					            if($one && $two && $three)
                                                  {
                                                     if($three == '1')
                                                     {
                                                     $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }else{
                                 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                       $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }
                                                     }else{
                                                      if($two == '1'){
                                                       $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                      
                                                      }else{
                                                        $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show' ");
                                       $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }
                                                      
                                                      }
                                                    
					
					
					
					
						
									$rat=mysql_fetch_array($rack);
									
									$roomcount=mysql_num_rows($rdetails);
									?>
								
				<tr>
												<td class="bigbox_dark">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td colspan="1" align="center" height="51" class="property_name"><strong>
															<b><a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>"><font color="#FFFFFF" size="2"><?php echo $properties_data['Name']; ?></a></font></strong></td>
<td width="60" class="next_col"><a href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><img src="images/MORE.jpg" class="more_img"></a></td>
														</tr> 
														
													</table>
												</td>
												<td class="doalr_section" height="50"> <strong> <strong>&nbsp;<b><?php echo $currency;?> <?php echo $rat[0];?></b></strong></a></strong></td>

			    </tr>
									<?php } ?>
									
									
									
									
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

								

        if($one && $two && $three)
          {
            if($three == '1')
            {
            $properties=mysql_query("SELECT * FROM wp_properties where city_id='$two' and region_id='$one'");
            }else{
             $properties=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$two' and wp_manage_mappings.region_id='$one' and wp_manage_mappings.user_id='$three'");
             }
            
       
          }
         else
         {  
          if($two == '1')
            {
  
           $properties=mysql_query("SELECT * FROM wp_properties where city_id='$one'");
           }else{
             $properties=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.city_id='$one'and wp_manage_mappings.user_id='$two'");
           
           }
          
         
          } 												
							
											while($properties_data=mysql_fetch_array($properties))
											{
											$property_id= $properties_data['ppro_id'];
											 if($one && $two && $three)
                                                  {
                                                     if($three == '1')
                                                     {
                                                     $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }else{
                                 $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                       $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }
                                                     }else{
                                                      if($two == '1'){
                                                       $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                      
                                                      }else{
                                                        $rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show' ");
                                       $rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$property_id' and showroom='show'");
                                                     }
                                                      
                                                      }
											$roomcount=mysql_num_rows($rdetails);
											$roomdetails=mysql_fetch_array($rdetails);
										
											$nights=$roomdetails['roomrate'];
											$night=($nights*5);
											$address=$properties_data['addr2'];
											$des=$properties_data['ds'];
											
											$rat=mysql_fetch_array($rack);?>

											<?php
											 if($one && $two && $three){
											  if($three == '1')
            {
											 
											
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
										}else{
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and user_id='$three' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and user_id='$three' and showroom='show')");
										
										}}else{
										 if($two == '1')
            {
											 
											
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
										}else{
										$low_rate=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate' and user_id='$two' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$property_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and user_id='$two' and showroom='show')");
										
										}
										
										
										
										}
										
											$bfdata=mysql_fetch_array($low_rate);
											if($bfdata['flag']=='availability')
											{
											?>
											<tr>
											<td height="53"  align="center" valign="middle" bgcolor="#<?php echo $bgcolor;?>" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">

												       <a href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'><font color="#FFFFFF"><?php echo $bfdata[0];?></a>

												</td>
											
												
												<?php }else if($bfdata['flag']=='enquiry'){ ?>
												<tr><td height="53"  align="center" valign="middle" bgcolor="#b7be00" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; ">

												       <a href="RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&user_id=<?php echo $user_id;?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><font color="#FFFFFF"><?php echo $bfdata[0];?></a>
												<?php }
												else 
												{
												?>
												<tr><td height="53"  align="center" valign="middle" bgcolor="#e3e3e3" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">
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
 if($one && $two && $three){
		if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
				<a href="widget_roomselection.php?page=<?php echo $pre;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&prev=<?php echo $prev1;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next<?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
		
			?>
			
			<?php	
			
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next<?php echo $griddays;?> Days</b></font></a></div>
				
<?php } } }else{

if($totalpages>1)

		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style=" background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
				<a href="widget_roomselection.php?page=<?php echo $pre;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&prev=<?php echo $prev1;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next<?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
		
			?>
			
			<?php	
			
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				<a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=--Located Properties--&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next<?php echo $griddays;?> Days</b></font></a></div>
				
<?php } }






}?>
</div>

</tr>   

</tr>

</tbody>
</table></div></div></div>

<div class="container">

<div class="span12">

</div>

</div>

</div></div></div>

</div>

</div>
<?php

}
else
{
echo "<h1>Information not available for your search</h1>";
}
}


//}
else
{
  ?>
  <div id="sdate">
  <div id="search">
  <?php

$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id1'");
$propertyname=mysql_fetch_array($property);
	$ppro_id=$propertyname['ppro_id']; 
	if($three){
                $grid=("SELECT * FROM wp_general_settings where user_id='$three'");
               }else{
                $grid=("SELECT * FROM wp_general_settings where user_id='$two'");
               } 
                $grid1=mysql_query($grid); 
//$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid1);
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
			

                  if($one && $two && $three){
 		$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
		WHERE newgrid_date>='$arrival' and newgrid_date<='$enddat' and user_id='$three' and showroom='show'";
		}else{
		$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
		WHERE newgrid_date>='$arrival'and newgrid_date<='$enddat' and user_id='$two' and showroom='show'";
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
		mysql_data_seek($sql1,($page-1) * $maxpage);
	?>
	
	
	<div class="row-fluid">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
       <td width="10%" height="139" align="left" valign="top">
		  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
			        <td width="50%" class="bigbox_blue" height="57"><strong>
					<?php echo $propertyname['Name'];?>
					Room Types</strong></td>
			<td width="50%" class="bigbox_blue_small" height="57"><strong>FULL RATE</strong></td>
				</tr>
			<?php 
			 if($one && $two && $three){
			  if($three == '1'){
			 
			$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
			}else{
			$dquery="SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$three'";
			}}else{
			if($two == '1'){
			 
			$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
			}else{
			$dquery="SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$two'";
			}
			
			}
			
		       $rproperties=mysql_query($dquery);
						while($details=mysql_fetch_array($rproperties))
						{ 
						 if($one && $two && $three){
			  if($three == '1'){
						
			$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
			}else{
			$rdetails=mysql_query("SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$three'");
			}}else{
			if($two == '1'){
			$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
			}else{
			$rdetails=mysql_query("SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$two'");
			}
			
			}
								$roomcount=mysql_num_rows($rdetails);
								$roomdetails=mysql_fetch_array($rdetails);
								$room_id=$details['roomid'];
								$rdata=$details['name'];
								$roomdata=$roomdetails['defaultinclusion'];
		$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								$rate=mysql_fetch_array($q1);
								$nights=$rate[0];
								$night=($nights*5);
		$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
						@$popup_res=mysql_fetch_array($popup_query);
								$popup_des=$popup_res['ds'];
								$popup_featured=$popup_res['features'];
								 if($one && $two && $three){
			  if($three == '1'){
								
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}}else{
								if($two == '1'){
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}
								
								}
								$rat=mysql_fetch_array($rack);
						
						//$d=$inventoory_grid_data['newgrid_date'];
						//$edate=Date("Y-m-d",strtotime($d));
						?>
							<td class="bigbox_dark">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
									
									<td colspan="1" align="center" height="51" class="property_name"><strong> <a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $ppro_id;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></td>
<td width="60" class="next_col"><a href='roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $ppro_id;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'" class="continue"><img src="images/MORE.jpg" class="more_img"> </a></td>
								</tr> 
									
								    </table>
					</td>
					<td class="doalr_section"> <strong> <strong><b><?php echo $currency;?> <?php echo $rat[0];?></b></font></strong></td>

			    </tr>
							<?php }	?>
																
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
					<td height="57" colspan="2" align="center" valign="middle" bgcolor="#C5C5C5" class="table_dates" >
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
								 if($one && $two && $three){
			  if($three == '1'){
			 
			$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
			}else{
			$dquery="SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$three'";
			}}else{
			if($two == '1'){
			 
			$dquery="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'";
			}else{
			$dquery="SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$two'";
			}
			
			}
								$rproperties=mysql_query($dquery);
								while($details=mysql_fetch_array($rproperties))
								{
								 if($one && $two && $three){
			  if($three == '1'){
						
			$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
			}else{
			$rdetails=mysql_query("SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$three'");
			}}else{
			if($two == '1'){
			$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id'");
			}else{
			$rdetails=mysql_query("SELECT distinct wp_room_type_details.roomid,wp_room_type_details.name,wp_manage_mappings.city_id,wp_manage_mappings.region_id FROM wp_room_type_details left join wp_manage_mappings on wp_room_type_details.roomid=wp_manage_mappings.roomid where wp_manage_mappings.ppro_id='$ppro_id' and wp_manage_mappings.user_id='$two'");
			}
			
			}
								$roomcount=mysql_num_rows($rdetails);
								$roomdetails=mysql_fetch_array($rdetails);
								$room_id=$details['roomid'];
								$rdata=$details['name'];
								$roomdata=$roomdetails['defaultinclusion'];
								$q1=mysql_query("SELECT min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								$rate=mysql_fetch_array($q1);
								$nights=$rate[0];
								$night=($nights*5);
								$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
								$popup_res=mysql_fetch_array($popup_query);
								$popup_des=$popup_res['ds'];
								$popup_featured=$popup_res['features'];
								
								 if($one && $two && $three){
			  if($three == '1'){
								
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}}else{
								if($two == '1'){
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}else{
								$rack=mysql_query("SELECT max(rackrate) FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$room_id' and showroom='show'");
								}
								
								}
								$rat=mysql_fetch_array($rack);
								?>
								
								<?php
								/*$bf_qry=mysql_query("SELECT  min(newroomrate),flag,newstop_sell FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id'  AND  newgrid_date='$edate' AND roomid='$room_id'");*/
								 if($one && $two && $three){
			  if($three == '1'){
								$bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
                               
                                }else{
                                $bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and user_id='$three' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and flag !='sold' and user_id='$three' and newstop_sell !='sold' and showroom='show')");
                                
                                }}else{
                                if($two == '1'){
                                $bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and flag !='sold' and newstop_sell !='sold' and showroom='show')");
                                
                                }else{
                                 $bf_qry=mysql_query("SELECT newroomrate,flag FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id' and newgrid_date='$edate' and user_id='$two' and newroomrate=(SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE `ppro_id`='$ppro_id' and roomid='$room_id'  and newgrid_date='$edate'and flag !='sold' and user_id='$two' and newstop_sell !='sold' and showroom='show')");
                                
                                }
                                
                                }
                                                $bf_data=mysql_fetch_array($bf_qry);
								if($bf_data['flag']=='availability')
								{
								?>
					<tr>
					<td height="53"  align="center" valign="middle" bgcolor="#<?php echo $bgcolor;?>" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $ppro_id;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a></td>
					
								<?php }else if($bf_data['flag']=='enquiry') { ?>
								<tr>
					<td height="53"  align="center" valign="middle" bgcolor="#b7be00" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF;">
<a href="roomnames_18_07_2013.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $ppro_id;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>&arrival=<?php if($tmp){echo $tmp;}else if($prev){ echo $prev;}else{ echo $arrival;}?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>'"><font color="#FFFFFF"><?php echo $bf_data[0];?></a></td>
								
								
								<?php }
								else 
								{
								?>
					<tr><td height="53"  align="center" valign="middle" bgcolor="#e3e3e3" style="color:#FFF; font-weight:bold; border-bottom:1px solid #FFF;border-right:1px solid #FFF; "><?php echo "SOLD";?>
					</td> 
								
								<?php
								}  ?>
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
		  $temp=Date("Y-m-d",strtotime($d."+ 1 day"));	
		  		

?>
 </tr>
</table>
<tr height="20"> 
   <?php
   $span=$griddays+1;
   ?>
 

 <div><?php
 if($one && $two && $three){
		if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;   background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="widget_roomselection.php?page=<?php echo $pre;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&prev=<?php echo $prev1;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo  $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else { ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			
			?>
			
			<?php	
			
		
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo  $three;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				
<?php 
			
		} 
		
		
} }else{
if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;  background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="widget_roomselection.php?page=<?php echo $pre;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&prev=<?php echo $prev1;?>&data3=<?php echo $avr;?>" style="margin:20px 0px 0px 15px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Previous <?php echo $griddays;?> Days</b></font></a>
				</div></td>
				
				
				
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo  $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>&data3=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			
			?>
			
			<?php	
			
		
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;" >
				 <a href="widget_roomselection.php?page=<?php echo $next;?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id1;?>&region=<?php echo $region;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo  $two;?>&count=<?php echo count;?>&prpty=<?php echo $prpty;?>&temp=<?php echo $temp;?>&data3=<?php echo $avr;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>Next <?php echo $griddays;?> Days</b></font></a></div>
				
<?php 
			
		} 
		
		
}



}?>
</div>
 
 

</tr>

</tr>
</tbody>
</table></table></div></div><div>
<?php
}
?>
</div></div></div>
<script>
parent.iframeLoaded();
</script>
</body>
</html>
<?php
}?>