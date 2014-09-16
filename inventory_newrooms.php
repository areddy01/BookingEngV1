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
$uid= $_SESSION['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}
 $ppro_id=$_GET['pid'];
$roomid=$_GET['rid'];
?><head> 
 <!--<script type="text/javascript" src="js/savepopup.js"></script>-->
 <style>
.lightbox {
	position: absolute;
	border:4px solid #39F;
	top: 0;
	height:auto;
	left: 50%;
	width: 500px;
	margin-left: -250px;
	background: #fff;
	z-index: 1001;
	display: none;
}
.lightbox-shadow {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 1500px;
	background: #000;
	filter: alpha(opacity=75);
	-moz-opacity: 0.75;
	-khtml-opacity: 0.75;
	opacity: 0.75;
	z-index: 1000;
	display: none;
}
.light {
	position: absolute;
	top: 0;
	height:auto;
	left: 50%;
	width: 500px;
	margin-left: -250px;
	background: #fff;
	z-index: 1001;
	display: none;
}
.light-shadow {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 1500px;
	background: #000;
	filter: alpha(opacity=75);
	-moz-opacity: 0.75;
	-khtml-opacity: 0.75;
	opacity: 0.75;
	z-index: 1000;
	display: none;
}
</style>

	

</head>


<form action="room_grid_data.php" method="post" onsubmit="return ray.ajax()">
 <?php 
 $query="select * from wp_griddateselection where user_id='$uid'";
 $q1=mysql_query($query);
 $q2=mysql_fetch_array($q1);
 $from=$q2['fromdate']; 
 $to=$q2['todate'];
 $ran=$q2['date_range'];
$start = date('Y-m-d ', strtotime($from));
 $end = date('Y-m-d ', strtotime($to));
$m= date("m");
$de= date("d");
$y= date("Y");
?>
<div id="inventer_scrool"><table border="1" id="mytable">
<tr>
   <th>
        Room <br>
Rate Package(s)
    </th> 
<?php
$init_date = strtotime($start);
$dst_date = strtotime($end);
$offset = $dst_date-$init_date;
 $dates = floor($offset/60/60/24) + 1;
for ($i = 0; $i < $dates; $i++)
{
	echo "<th>";
$newdate = date("D d M", mktime(12,0,0,date("m", strtotime($start)),
(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));
echo $newdate ."<br>";
//echo '<input type="hidden" name="dt[]" value='.$newdate .' />';
echo "</th>";
}
?>


<?php
 ?>

</tr>


<?php 

$m=mysql_query("select * from wp_manage_mappings where user_id='$uid' and roomid='$roomid' and ppro_id='$ppro_id'");
 while($rr = mysql_fetch_array($m)) {
 $room_id1=$rr['room_id'];
  $ppro_id1=$rr['ppro_id'];
   $roomid1=$rr['roomid'];
 
$query="select  * from wp_rooms where ppro_id='$ppro_id1' and roomid='$roomid1' and room_id='$room_id1'";

$q=mysql_query($query) or die(mysql_error());?>
   	<?php
		$r=0;
	 $row = mysql_fetch_array($q); 
       ?>
			
			 <?php
			$i=0;
             $rid=$row['roomid'];
			 $id=$row['ppro_id'];
			 $id1=$row['room_id'];
			 ?>
		
			<tr id="r<?php echo $r;?>" onmouseover="rOn(this,'GBL');" onmouseout="rOff(this,'GBL');" class="poolslim" bgcolor="#ffffff">
            <td >
            <a href="javascript:roomlightbox(null, <?php echo $rid; ?> , <?php echo $id; ?>, <?php echo $id1; ?> );">  <img src="images/icon.png" alt="Room Type Control Panel"></a>  
                 
                   <input type="hidden" name="room" class="room" value="<?php echo $rid;?>" />
  <input type="hidden" name="roomid1" value="<?php echo $rid;?>" />
  
                   <input type="hidden" name="newroom" class="room" value="<?php echo $id1;?>" />
  <input type="hidden" name="newroomid1[]" value="<?php echo $id1;?>" />
                  <input type="hidden" name="ppro_id1" value="<?php echo $id;?>">
                  <input type="hidden" name="uid" class="room" value="<?php echo $uid;?>" />
			 <?php echo $row['roomname'];
           echo "<br>";
                     
         		   
		  echo "</td>";
		 
    for($i=0;$i < $dates; $i++){?>
   
     <td  id="r<?php echo $r;?>c<?php echo $i;?>" onmouseover="cOn(this, 'GTR');" onmouseout="cOff(this, 'GTR');"  class="top" 
     <?php if($inventory_data['stop_sell'])
	 {
		 echo '';
	 }?>>
      <div style="position: relative;">
   <?php
      $newdate = date("Y-m-d", mktime(12,0,0,date("m", strtotime($start)),
(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));

      $inventory_qry=mysql_query("SELECT * FROM `wp_room_inventory_grid_details` WHERE ppro_id='$id' AND roomid='$rid' AND newgrid_date='$newdate' and room_id='$id1'");
	$inventory_count=mysql_num_rows($inventory_qry);
	$inventory_data=mysql_fetch_array($inventory_qry);
	$qu="select * from wp_griddateselection";
	$sq=mysql_query($qu) or die(mysql_error());
	
	$fet=mysql_fetch_array($sq);
	echo '<input type="hidden" readonly="readonly" name="dt[]" value='.$newdate .' />';
	if($inventory_data['newstop_sell']=='sold')
	{?>
    
	<img src="images/cpanel.png" alt="Room Type Control Panel">
    <?php }
    else
    {?>
    <a href="javascript:roomlight(null, <?php echo $rid; ?> , <?php echo $id; ?> ,'<?php echo $newdate;?>',<?php echo $id1;?>)"> <img src="images/cpanel.png" alt="Room Type Control Panel"></a>
    <?php }?>
	<?php echo '<input type="hidden" name="range" value='.$dates .' />';
	
	//echo $fet['min_stay'];
	if($inventory_count!=0)
	{
		if($fet['rates']=='rates')
		{
			if($inventory_data['newstop_sell']=='sold')
	{
	?><input type="text" readonly name="rate[]" style="width:25px;" value="<?php echo $inventory_data['newroomrate'];?>" tabindex="90" title="Minimum $30" onfocus="doF(this)" onchange="doR(this,'815','30')" onkeypress="return numOnly(event,this,4)" class="f" id="PooledListView_ctrl0_PoolRoomCells_ctrl0_prc_ctrl0_r">
    <?php } 
	else
	{?>
    
        <input type="text" name="rate[]" style="width:25px;" value="<?php echo $inventory_data['newroomrate'];?>" tabindex="90" title="Minimum $30" onfocus="doF(this)" onchange="doR(this,'815','30')" onkeypress="return numOnly(event,this,4)" class="f" id="PooledListView_ctrl0_PoolRoomCells_ctrl0_prc_ctrl0_r">
		<?php
	}}
		 if($fet['availability']=='Availability')
		{?>
          <input type="text" name="avil[]" style="width:25px;" value="<?php echo $inventory_data['newroomavilability'];?>" />
         <?php
		  }
		?>
       <!--   <input type="text"  name="room[]" style="width:25px;" value="<?php echo $inventory_data['newstop_sell'];?>">-->
  <?php 
  	if($fet['min_stay']=='minstay')
 	{
	  ?>
      				<input type="text" name="min[]" style="width:25px;" value="<?php echo $inventory_data['newmin_room_stay'];?>">
        <?php 
	}
	if($fet['stop_sell']=='stopsell')
	{
			if($inventory_data['newstop_sell']){?>
       <img src="images/alert.jpg" id="PooledListView_ctrl0_PoolRoomCells_ctrl0_prc_ctrl0_si" title="Toggle Stop Sell" alt="Toggle Stop Sell" class="cbimg" onclick="doSS(this,'javascriptOutPut<?php echo $i.$r;?>')">
      <input type="hidden" name="stopsell[]" id="javascriptOutPut<?php echo $i.$r;?>" value="<?php echo $inventory_data['newstop_sell'];?>"/>
      <?php }
	  else{?>     
       <img src="images/ok.png" id="PooledListView_ctrl0_PoolRoomCells_ctrl0_prc_ctrl0_si" title="Toggle Stop Sell" alt="Toggle Stop Sell" class="cbimg" onclick="doSS(this,'javascriptOutPut<?php echo $i.$r;?>')">
      <input type="hidden" name="stopsell[]" id="javascriptOutPut<?php echo $i.$r;?>" value="<?php echo $inventory_data['newstop_sell'];?>"/>
<?php
	}?>
	
 <?php }
	}
	else
   {
	
	
      if($fet['rates']=='rates')
	  {?>
    
        <input type="text" name="rate[]" style="width:25px;" value="<?php echo $row['roomrate'];?>">
		<?php
	  }
      if($fet['availability']=='Availability')
	  {?>
         <input type="text" name="avil[]" style="width:25px;" value="<?php echo $row['newdefaultallocation'];?>"/><?php } ?>
   <!--  <input type="text" name="room[]"   style="width:25px;"  value="<?php echo $row['newsetstop'];?>" />
       --> 
    <?php if($fet['min_stay']=='minstay')
 	{?>
      	<input type="text" name="min[]" style="width:25px;" value="<?php echo $row['minstay'];?>">
     <?php 
	 } 
     if($fet['stop_sell']=='stopsell')
	{?>
      <img src="images/ok.png" id="PooledListView_ctrl0_PoolRoomCells_ctrl0_prc_ctrl0_si" title="Toggle Stop Sell" alt="Toggle Stop Sell" class="cbimg" onclick="doSS(this,'javascriptOutPut<?php echo $i.$r;?>')">
       <input type="hidden" name="stopsell[]" id="javascriptOutPut<?php echo $i.$r;?>"/>
	<?php }?>
     <?php 
	 } ?>
     
     </div> 
   
     </td>
	 <?php
	  }
		$r=$r+1;
		}
		
		echo " </tr>";
		$r=$r+1;	 ?>
    

</table>
</div></td>
<div id="load" style="display:none; "><img src="images/ajax-loader3.gif" alt="please wait"/></div>

<input type="submit" name="SUBMIT" value="Save Changes" style="margin:0px 0px 0px 200px;" />
<input type="submit" name="cancel" value="Cancel" style="margin:0px 0px 0px 0px;"/></form>
	
 