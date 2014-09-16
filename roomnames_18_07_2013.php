<?php 
require_once('functions.php');
require_once('connection.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$user=new User(); 
 $prpty=$_REQUEST['prpty'];
 $tmp=$_REQUEST['temp'];
 $prev=$_REQUEST['prev'];
 $region=$_REQUEST['region'];
  $room_id=$_REQUEST['room_id'];
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_REQUEST['ppro_id'];
$bfrid=$_REQUEST['bfrid'];
 $avr=$_REQUEST['avr'];
$user_id=$_REQUEST['user_id'];
$arrival=$_REQUEST['arrival'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$grid=mysql_query("SELECT * FROM wp_general_settings where user_id='$user_id'"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$currency=$gridsettings['DefaultCurrency'];
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);
$query="select * from wp_griddateselection where user_id='$user_id'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);

 $to=$q2['todate'];
 $bg=mysql_query("SELECT * FROM wp_color");
$bgclr=mysql_fetch_array($bg);
$bgcolor=$bgclr['color'];

 $enddat = date('Y-m-d ', strtotime($to));
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
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
<!--<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>-->
<script src="js1/bootstrap.js"></script>
<script type="text/javascript" src="js/properties.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!--<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">-->
<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<link href="css/bootstrap1.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive1.css" rel="stylesheet" type="text/css">
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
							var bfrid=$("#bfrid").val(); 
							var avr=$("#avr").val();  
							var userid=$("#userid").val();
							var bf_id=$("#bf_id").val();
							var region=$("#select01").val();
							
							
							
							
							$.ajax({ 
								type: "POST",
								url: "getdates2.php",
								//data: "datepic_id="+ datepic,
							data: {data1:datepic,data2:ppro_id,data3:bfrid, data4:avr,data5:userid,bf_id:bf_id,region:region},
								success: function(response){
									
								$("#main_tbody2").replaceWith(response); 
								 
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
							var room=$("#bfrid").val();
							var prpty=$("#ppro_id").val();
							var avr=$("#avr").val();
							var user_id=$("#userid").val();
							
							$("#datepicker3").val(arrival);
							
							$.ajax({ 
								type: "POST",
								url: "widget_roomselection.php",
								data: {ppro_id:ppro_id, arrival:arrival,region:region,bf_id:bf_id,data3:data3,slot:slot,room:room,prpty:prpty,avr:avr,user_id:user_id},
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
	       if($one || $two || $three){
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
             <option <?php  if(empty($three))
           { if($one==$row1 ['city_id']){ ?>selected="selected" <?php } }?> value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1 ['city_name'];?></option>
             <?php }// }
              ?>
             <option  <?php if(!empty($three)){ if($one==$row1 ['region_id']){ ?>selected="selected" <?php } } ?> value="<?php echo $row1['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">....<?php echo $row1 ['region_name'];?></option>
         <?php 
          $last_c_id=$row1 ['city_id'];
       }}else{?>
        <select id="select01" name="region" onChange="changePP('changeprpty.php?id='+this.value)">
               <option selected="selected">--Select destination--</option>
           <?php   while($row1 = mysql_fetch_array($result))
              { 
            
             if($last_c_id!=$row1['city_id'])
             { 
            // if(empty($three))
            // {
              ?>
             <option <?php 
            if($one==$row1 ['city_id'] ||$m['city_id']==$row1 ['city_id']){ ?>selected="selected" <?php } ?> value="<?php echo $row1['city_id'];?>-<?php echo $user_id;?>"><?php echo $row1 ['city_name'];?></option>
             <?php }// }
              ?>
             <option  <?php  if($one==$row1 ['region_id'] ||$m['region_id']==$row1 ['region_id']){ ?>selected="selected" <?php }  ?> value="<?php echo $row1['region_id'];?>-<?php echo $row1['city_id'];?>-<?php echo $user_id;?>">....<?php echo $row1 ['region_name'];?></option>
         <?php 
          $last_c_id=$row1 ['city_id'];
       }
       
       } ?>
     </select>
    
     
    </div> </div>
    <div class="control-group">  
            <label class="control-label" for="select01" style="color:#FFF;">Property</label>  
            <div class="controls">  
             <?php
             $vvvv=mysql_query("SELECT * FROM wp_properties");
             ?>
   
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
               
             
            </div>  
          </div> 
          <div class="control-group">
            <div class="controls"> <input type="button" name="search" class="btn" value="Search" >  </div>  
          </div>
        </fieldset>  
</form> 




</div>
<?php
}

?>


<input type="hidden" id="ppro_id" value="<?php echo $ppro_id;?>">
<input type="hidden" id="bfrid" value="<?php echo $bfrid;?>">
<input type="hidden" id="avr" value="<?php echo $avr;?>">
<div class="container widen">
     <!--<div class="row-fluid ">
       <div class="span5"><div class="brand"><img src="images/logo.jpg"/></div></div>
       <div class="span7"><article><h5>Top rated holiday homes and apartments-What you see is what u get<br>"Thats our guarantee to                               you"</h5></article></span></div>

</div>-->
</div>

<div class="row-fluid widen">
      

<div class="span12 widen">
  <div class="container widen">
    <div class="clearfix"></div>


 
  <div class="container widen">
 
 
 <span class="span11 widen" style="float:right;">
 
 
<ul>


<li class="green"><input type="text"  style="background-color:#<?php echo $bgcolor;?>;width:10px;height:10px;" />&nbsp;<strong>AVAILABLE</strong></li>

<li class="yellow"><strong>MAKE AN ENQUIRY</strong></li>

<li class="grey"><strong>SOLD</strong></li>


 <?php
if($tmp){
?>
   <li class="white"><strong>START DATE </strong><input name="" type="text" id="datepicker3" value="<?php echo $tmp;?>">
   <?php 
}else if($prev){
?>
 <li class="white"><strong>START DATE </strong><input name="" type="text" id="datepicker3" value="<?php echo $prev;?>">
   <?php 
}else if($arrival){?>
 <li class="white"><strong>START DATE </strong><input name="" type="text" id="datepicker3" value="<?php echo $arrival;?>">
  
<?php }else{ ?>
 <li class="white" class="inline"><strong>START DATE </strong><input name="" type="text" id="datepicker3" >
 <?php } ?>
   <input name="" type="hidden" id="userid" value="<?php echo $user_id;?>" >
    <input name="" type="hidden" id="bf_id" value="<?php echo $bf_id;?>" >
   
   </li>
 
  </ul>
 
  </span>
    </div><?php 
$cdate=Date("D M d Y");
?>
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
	if($arrival)
	{
	$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$arrival'  and newgrid_date<='$enddat' and user_id='$user_id' and showroom='show'";
}else{
$inventoory_qry="SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate' and newgrid_date<='$enddat' and user_id='$user_id' and showroom='show'";

}
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
			@$page=1; 
		}
		}
		
		@ mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
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
</div>


<div class="row-fluid widen">


<div class="span12 widen"><div class="container widen">



<div class="span11 widen" >
		
  
 
 <div id="search"> 
  

<table  id="main_tbody2" width="" height="70px"   border="1" bordercolor="#ffffff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" colspan="2" bgcolor="#21678b" style="border:1px solid #ffffff;">&nbsp;<b> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></b></td>
<!--<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>--><?php
 $whichrow=0;
 $flage=0;
//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	$whichrow=$whichrow + 1;
         ?>	

 <td bgcolor="#c5c5c5" width="50" style="border:1px solid #ffffff; text-align:center;" class="table_dates">
<!--<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > -->
<?php
//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//$d=$inventoory_grid_data["newgrid_date"]; 
	//echo $ch=Date('D-d-M',strtotime($d));
	$d=$inventoory_grid_data['newgrid_date'];
	$ch=Date('D d M',strtotime($d));
echo $ch=strtoupper($ch);
if($flage==0){
											$prev1=Date("Y-m-d",strtotime($d."-".$griddays."day"));
											$book=Date("Y-m-d",strtotime($d));
													}
	
?>
</font></td>
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
<tr height="20" style="border:1px solid #ffffff;"> 
   <?php
   $span=$griddays+1;
   ?>
 

 <div>
 <?php
           if($arrival){
		if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;  float:right; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="roomnames_18_07_2013.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&prev=<?php echo $prev1;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a>
    
   
				</div></td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				  <a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			//$pre = (int)$page - 1;
			?>
			<td colspan="1"></td>
			<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
			<?php	
			
			//if($page < $totalpages)
			//{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				<a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>&user_id=<?php echo $user_id;?>&prpty=<?php echo $prpty;?>&region=<?php echo $region;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
}}else{
if($totalpages>1)
		{ 
			if($page > 1)
			{
				$pre = (int)$page - 1; ?>
				<td colspan="1"> <div style="width:120px;  float:right; background:#21678b; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; margin:0px 0px 0px 30px; ">
    <a href="roomnames_18_07_2013.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&prev=<?php echo $prev1;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Previous <?php echo $griddays;?> Days</b></font></a></div>
    
   
				</td>
				
				
				<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
				<?php	
				
				if($page < $totalpages)
				{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				  <a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				<?php			
			}else{ ?>
			<div style=" background:#21678b; width:170px; height:40px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:0px 0px 0px 0px;margin:20px 0px 0px 30px; color:#FFF;"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"><b>No Further Information Available Yet</b></font></div>
		<?php	}
			
		}else{
			
			//$pre = (int)$page - 1;
			?>
			<td colspan="1"></td>
			<td width="50" bgcolor="#21678b" colspan="<?php echo  $span;?>">&nbsp; <font  color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1" style="padding:0px 0px 0px 12px"><b>FULL RATE</b></font>
			<?php	
			
			//if($page < $totalpages)
			//{
				$next = (int)$page + 1;?>
				<div style=" background:#21678b; width:120px; height:20px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:0px; float:right; margin:5px 0px 0px 0px;" >
				<a href="roomnames_18_07_2013.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&user_id=<?php echo $user_id;?>&temp=<?php echo $temp;?>" style="margin:20px 0px 0px 30px; color:#FFF;" ><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="1"> <b>Next <?php echo $griddays;?> Days</b></font></a></div></td>
				
<?php 
			//}
		} 
		
		
}





} ?>
</div>
 
 

</tr>
<?php
if($user_id=='1'){
									$m="select firstname from wp_manage_user where id='1'";
									}else{
						  $m="select room_id from wp_manage_mappings where user_id='$user_id' and ppro_id='$ppro_id' and roomid='$bfrid'";
									 }
						 $map=mysql_query($m);
									while($row=mysql_fetch_array($map)){
									 $rrmd=$row['room_id'];
$query="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and roomid='$bfrid' and showroom='show'";
if($user_id=='1'){
 $dquery=$query;
 }else{
 $dquery=$query." and room_id='$rrmd'";
 }
 if($room_id){
 $dquery=$query." and room_id='$room_id'";
 }
 
$rproperties=mysql_query($dquery);
$outindex=0;
while($details=mysql_fetch_array($rproperties))
{
//$rdetails=mysql_query("SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' and and roomid='$bfrid'");
//$roomcount=mysql_num_rows($rdetails);
//$roomdetails=mysql_fetch_array($rdetails);
$room_id=$details['roomid'];
$roomid1=$details['room_id'];
$rdata=$details['roomname'];
$des=$details['roomdes'];
$fullrate=$details['rackrate'];
//$url=$details['link'];
$url='/palm-cove/amphora/2-bedroom-apartments/poinciana/';
$rackrate=$details['roomrate'];
$roomdata=$roomdetails['defaultinclusion'];
$q1=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and showroom='show'");
$rate=mysql_fetch_array($q1);
$nights=$rate['newroomrate'];
$night=($nights*5);
$img_q1="select img_id from  wp_imginfo  where  ppro_id='$ppro_id' and roomid='$room_id' and room_id='$roomid1'";
$r1=mysql_query($img_q1);
$res=mysql_fetch_array($r1);


 $imgid=$res['img_id'];

			    

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
if($arrival)
{
$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>='$arrival' and newgrid_date<='$enddat' and showroom='show'";
}else{
$bf_qry="SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$roomid1' and newgrid_date>='$curntdate' and newgrid_date<='$enddat' and showroom='show'";
}
$sql1= mysql_query($bf_qry) or die(mysql_error());
				
				 $no_of_row = mysql_num_rows($sql1);
				if($no_of_row)		
	        {	
			
		$maxpage=$griddays;
		
		
		$totalpages=ceil($no_of_row / (float)$maxpage);
		
		if($page > $totalpages)
		{
			@$page=1; 
		}
		}
		
		@ mysql_data_seek($sql1,($page-1) * $maxpage);
		?>
         <?php
         if($arrival){
		if($totalpages>1)
		{?>	
		<?php
	     if($page > 1)
	     {
		   $pre = (int)$page - 1;
          ?>
    <!--  <div style="width:120px; float:left; background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; margin:0px 0px 0px 30px; ">
    <a href="roomnames.php?page=<?php echo $pre?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> </b></a>
    </div>-->
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
           <!-- <div style=" background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; float:right;" >
            <a href="roomnames.php?page=<?php echo $next?>&bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $ppro_id;?>&bfrid=<?php echo $bfrid;?>&avr=<?php echo $avr;?>&arrival=<?php echo $arrival;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> </b></a></div>-->
       <?php
	    }
	  } }else{
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
	  } 
	  
	  } ?>
</div>



</div></div></div></div>










<?php 
$popup_query=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
$popup_res=mysql_fetch_array($popup_query);
$popup_des=$popup_res['ds'];
$popup_featured=$popup_res['features'];?>
<tr align="center">
<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
  <td width="250" bgcolor="#1c3f52" style="border:1px solid #ffffff;">&nbsp;
  <div id="nbmber"><div id="nbmber_text">

<!--<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"  class="trigger"> <font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a>-->
<a href='<?php echo $url;?>' target="_blank"><font color="#FFFFFF" size="2"><?php echo $rdata;?></font></a></div></div>
  
  <div id="book_now_buttion" style="margin:0px 0px 0px 95px">
  <div id="viewroom_text">
  <?php
  if($arrival){
   $days=mysql_query("SELECT newstop_sell,flag FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date='$book' and  ppro_id='$ppro_id' and roomid='$bfrid' and room_id='$roomid1' and showroom='show'");
  
  }else{ $days=mysql_query("SELECT newstop_sell,flag FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date = '$book' and  ppro_id='$ppro_id' and roomid='$bfrid' and room_id='$roomid1' and showroom='show'");
}
$no_stopsell=mysql_num_rows($days);

$bb=mysql_fetch_array($days);
 //print_r($bb);
/*if($no_stopsell)
{ 
echo "<b>Not Avilable</b>";}
else{*/?>
<!--
	<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_blank">VIEW ROOM1</a>nnnnnnnnnnnnnnnnn-->
    <script type="text/javascript">
// Popup window code

/*function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}*/
function newPopup(url )
{
  var win=window.open(url, '_blank');
  win.focus();
}
</script>

<!--<script type="text/javascript">
    if (top.location!= self.location){
        top.location = self.location
    }
</script>-->
    <!--<a href="JavaScript:newPopup('RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>');">VIEW ROOM2</a>-->

<!--
<a href='RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&room_id=<?php echo $details['room_id'];?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>' target="_parent">VIEW ROOM3</a>-->

<a href='<?php echo $url;?>'>VIEW ROOM4</a>
    </div>
  <div id="booh_buttion_11">
<?php 
//echo"baskar". $bb['flag'];
if($bb['newstop_sell']=='sold'||$bb['flag']=='enquiry'||$bb['flag']=='sold'){ ?>
<div id="booknow_text"><a href='' target="_blank"><img src="images/book-now-bu.png"></a></div>
<?php }else{ ?>
  <div id="booknow_text"><a href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $details['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $avr;?>&minstay=<?php echo $details['minstay'];?>&book=<?php echo $book;?>&user_id=<?php echo $user_id;?>&region=<?php echo $region;?>'"><img src="images/book-now-bu.png"></a></div>
  <?php } ?>
  </div>
  </div>
  <?php // }?></td>
</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5" style="border:1px solid #ffffff;">&nbsp;<b><?php echo $currency;?><?php echo $fullrate;?></b></td>
<?php
$which=0;
$index=0;
while($bf_data=mysql_fetch_array($sql1))
{
	
 $q2="select * from  wp_images where img_id='$imgid'";
 $r2=mysql_query($q2);
$res1=mysql_fetch_array($r2);
	      // $img_id=$res1['img_id'];
				 //$title=$res1['img_name'];
			 $img=$res1['thumb_img'];
	
	
	$which=$which + 1;
	
	?>
<!--<td width="30" bgcolor="#80E693"><?php echo $bf_data['newroomrate'];?></td>-->
<?php 
if($bf_data['flag']=='sold')
{?>
	 <td bgcolor="#e3e3e3" width="40px" height="50" style="border:1px solid #ffffff;"><center>
	<font  color="#FFFFFF"  size="-2" font-weight"bold"><?php echo "SOLD";?></font></center>
    </td>
    <?php }
	 else if($bf_data['newstop_sell']=='sold')
	 {?>
		<td bgcolor="#e3e3e3" width="40px" height="50" style="border:1px solid #ffffff;"><center>
	<font  color="#FFFFFF"  size="-2"><?php echo "SOLD";?></font></center>
    </td> 
	 <?php } 
	else if($bf_data['flag']=='enquiry')
	{?>
    
   <td bgcolor="#b7be00" width="40px" height="50" style="border:1px solid #ffffff;" >
	<!--<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>"><font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font></a>-->
 <font  color="#FFFFFF"><strong><?php  echo $bf_data['newroomrate'];?></strong></font></td>
    <?php }
	else{?>    
    
		<td bgcolor="#<?php echo $bgcolor;?>" width="40px" height="50" style="border:1px solid #ffffff;" >
	<!--<a href="RoomDetails_dump.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo $details['roomid'];?>&ppro_id=<?php echo $popup_res['ppro_id'];?>&room_id=<?php echo $roomid1;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>&rumid=<?php echo $details['roomid'];?>" class="trigger<?php echo $outindex.$index; ?>" onMouseOver="doSomething(this,'<?php echo $rdata;?>','<?php echo $img;?>')"><font  color="#FFFFFF" ><?php  echo $bf_data['newroomrate'];?></font></a>-->	
	<font  color="#FFFFFF" ><strong><?php  echo $bf_data['newroomrate'];?></strong></font>
<?php 	}
    ?> 
    </td>
    
	<?php

		 if($which == $maxpage)
		  {
			
			
			break; 
		  }						  
		  $index++;
		 }			
$outindex++;
}

}}

}
?>
</tr></table>



<div class="container widen">

<div class="span12 widen">






</div>







</div>




</div></div>











</div>




</div>




</div>



<script>
parent.iframeLoaded();
</script>
</body>
</html>