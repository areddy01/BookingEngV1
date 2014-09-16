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
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}

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


 

<form action="" method="post">
 <?php 
 $uid=$_SESSION['id'];
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
$id=$_GET['id'];

$m=mysql_query("select * from wp_manage_mappings where user_id='$uid' and ppro_id='$id'");
  while($rr = mysql_fetch_array($m)) {
  $roomid=$rr['roomid'];
  $ppro_id=$rr['ppro_id'];
 
$query="select  * from wp_room_type_details where ppro_id='$ppro_id' and roomid='$roomid'";

$q=mysql_query($query) or die(mysql_error());?>
   	<?php
		$r=0;
	 $row = mysql_fetch_array($q);
        ?>
			
			 <?php
	
             $rid=$row['roomid'];
			 $id=$row['ppro_id'];?>
		
			<tr  onmouseover="rOn(this,'GBL');" onmouseout="rOff(this,'GBL');" class="poolslim" bgcolor="#ffffff">
          
            <td >
           <!-- <a href="javascript:lightbox(null, <?php echo $rid; ?> , <?php echo $id; ?> );">  <img src="images/icon.png" alt="Room Type Control Panel"></a> --> 
                
                  <input type="hidden" name="room" class="room" value="<?php echo $rid;?>" />
  <input type="hidden" name="roomid1[]" value="<?php echo $rid;?>" />
                  <input type="hidden" name="ppro_id1" value="<?php echo $id;?>">
			 <?php echo $row['name'];
           echo "<br>";?>
           <a href="javascript:void(0);" onClick="newRoom('inventory_newrooms.php?pid=<?php echo $id;?>&rid=<?php echo $rid;?>')">Rooms</a>
           
           <?php		   
		  echo "</td>";
		
    for($i=0;$i < $dates; $i++){?>
   
     <td>
      <div style="position: relative;">
   <?php
      $newdate = date("m-d-Y", mktime(12,0,0,date("m", strtotime($start)),
(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));

      $inventory_qry=mysql_query("SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE ppro_id='$id' AND roomid='$rid' and newgrid_date>='$newdate'")or die(mysql_error());
	
	  /* $inventory_qry1=mysql_query("SELECT min(newroomrate) FROM `wp_room_inventory_grid_details` WHERE ppro_id='$id' AND roomid='$rid'  AND  newgrid_date>='$curntdate'");
	  SELECT  min(newroomrate) FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id'  AND  newgrid_date>='$curntdate' AND roomid='$room_id'"*/
	$inventory_count=mysql_num_rows($inventory_qry);
	$inventory_data=mysql_fetch_array($inventory_qry);
	$qu="select * from wp_griddateselection";
	$sq=mysql_query($qu) or die(mysql_error());
	$fet=mysql_fetch_array($sq);
	echo '<input type="hidden" readonly="readonly" name="dt[]" value='.$newdate .' />';
	
   
	 echo '<input type="hidden" name="range" value='.$dates .' />';?>
     <input type="text" readonly="readonly" name="rate" style="width:25px;" value="<?php echo $inventory_data[0];?>" />
	<?php
	
	//echo $fet['min_stay'];
	//echo '<input type="text" name="range" value='.$inventory_data[0] .' />';
	?>   
     </div> 
   
     </td>
	 <?php
	  }
		
		}
		
		echo " </tr>";
			 ?>
    

</table>
</div>
</td>
</form>
	
 