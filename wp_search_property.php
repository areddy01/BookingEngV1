<?php

ob_start();
@session_start();

require_once('functions.php');
require_once('connection.php');
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
if(isset($_POST['submit']))
{
	 $country=$_POST['country'];
     $city=$_POST['city'];
	$picker=$_POST['picker'];
     $child=$_POST['child'];
}

$country=$_REQUEST['country'];
$city=$_REQUEST['city'];?>
<?php
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
//$bf_id=$_REQUEST['bf_id'];
// $ppro_id=$_GET['ppro_id'];
  //echo $ppro_id;
 //$avr=$_REQUEST['avr'];
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
<div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo">   </div>
<div style="height:100px; width:1024px	; background:#FFF; float:left;">
<?php
$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];

//echo $curntdate=Date("Y-M-d",strtotime("-1 days"))."<br>";
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
 if($gridsettings['ShowTitle']!='')
 {
	 $frm_qry=mysql_query("SELECT * FROM wp_booking_forms");
$frm_data=mysql_fetch_array($frm_qry);
	 echo "<h1 style='color:#BCA36B'>".$frm_data['bookingform_name']."</h1>";
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
				 //$h="select * from country_table WHERE ".$src;
				$inventoory_qry="SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate'";

	
					 
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

	
 $properties=mysql_query("SELECT * FROM wp_properties where cid='$country' and city_id='$city'") or die(mysql_error());
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
    <a href="wp_search_property.php?page=<?php echo $pre;?> &country=<?php echo $country;?> &city=<?php echo $city;?>" style="margin:20px 0px 0px 15px; color:#FFF;"> <b>Previous <?php echo $griddays;?> Days</b></a>
    </div>
          <?php	
	     } 
	     if($page < $totalpages)
	    {
		    $next = (int)$page + 1;?>
            <div style=" background:#960; width:130px; height:30px; -webkit-border-radius:15px; -moz border-radius:15px; -0-border-radius:15px; border-radius:15px; float:right;" >
            <a href="wp_search_property.php?page=<?php echo $next?> &country=<?php echo $country;?> &city=<?php echo $city;?>" style="margin:20px 0px 0px 30px; color:#FFF;" > <b>Next <?php echo $griddays;?> Days</b></a></div>
       <?php
	    }
	  }  ?>
</div>
<table border="0.5" align="left" width="100%" >
<tr><td></td></tr>
<tr bgcolor="#968862"  style="font-color:#FFFFFF">
<td align="center"><font color="#FFFFFF" size="+2"><b>Properties</b></font></td>
<td width="25"><font color="#FFFFFF" size="+1">FULL RATE</font></td>


<?php

//for($i=1; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($sql1))
{
	 $whichrow=$whichrow + 1;
         ?>	
<td width="30" > <font color="#FFFFFF">
<?php
	$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//echo $d;
	echo $ch=Date('D-d-M',strtotime($d));
	//echo $inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	
	
?>
</font></td>
  <?php
		 if($whichrow == $maxpage)
		  {
			break; 
		  }						  
		 }			
  //echo $whichrow;       
?>
</tr>
       
<?php
while($properties_data=mysql_fetch_array($properties))
{

$property_id= $properties_data['ppro_id'];
$rdetails=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$property_id'");
$roomcount=mysql_num_rows($rdetails);
$roomdetails=mysql_fetch_array($rdetails);
$bfqry=mysql_query("SELECT * FROM wp_inventory_grid_details WHERE ppro_id='$property_id' LIMIT 0,$whichrow");
$nights=$roomdetails['rackrate'];
$night=($nights*5);
$address=$properties_data['addr2'];
$des=$properties_data['ds'];
//echo $night;?>
<tr>
<td bordercolor="#006699">
<table border="0">
<tr>
<td width="250">

<b><a href=""><?php echo $properties_data['Name']; ?></a></b> 
  
   
    
   
</td>
<td><b>5 nights for $<?php echo $night;?></b><br>
<center>
<input type="image"  onClick="location.href='RoomSelection.php?bf_id=<?php echo $bf_id;?>&ppro_id=<?php echo $properties_data['ppro_id'];?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'" src="images/roliover-img.2.png" ></center>
</td></tr>
</table>
</td>
<td class="underline" bgcolor="#FF9966" align="center" width="50"><?php echo $roomdetails['rackrate'];?></td>
<?php
for($i=0; $i<=$griddays; $i++){ 
while($bfdata=mysql_fetch_array($bfqry))
{?>
<td width="40" bgcolor="#80E693" align="center"> 
<?php
	echo $bfdata['roomrate'];
?>
</td>
<?php } }
}

?>

</tr>


</table>
<table>
<td><div id="foot"> </div></td></table>
</div></div>

  <div id="foot"> </div>
  
  
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
