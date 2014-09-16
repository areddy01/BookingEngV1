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

?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Accordion - Customize icons</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
 
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
   <script>
 var dateToday = new Date();

/*$(function() {
    $( "#fromDate" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm-dd-yy"
    }).datepicker('setDate',"0");
});*/
$(function() {
    $( "#toDate" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    }).datepicker('setDate',"0");
});
  </script>
  <script>
  /*$(function() {
        var dates = $( "#fromDate, #toDate" ).datepicker({
            defaultDate: "+1w",
				gotoCurrent: true,
            changeMonth: true,
            numberOfMonths: 1,
            onSelect: function( selectedDate ) {
                var option = this.id == "fromDate" ? "minDate" : "maxDate",
                    instance = $( this ).data( "datepicker" ),
                    date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings );
			        dates.not( this ).datepicker( "option", option, date );
            }
        }).datepicker('setDate',"0");
    });*/
    </script>
  </head>
<body>
<?php $id=$_GET['ppd'];
$id1=$_GET['rid'];
$newdate=$_GET['newdate'];
$id2=$_GET['room_id'];
?>
<form action="roomupdatecontrolpanel.php" method="post">
<input type="hidden" name="rid" value="<?php echo $id1;?>">
<input type="hidden" name="pid" value="<?php echo $id;?>">
<input type="hidden" name="room_id" value="<?php echo $id2;?>">
<div><center>Control Panel</center></div><br><br>
<?php $query="select roomname,newdefaultallocation,roomrate,minstay from wp_rooms where 
ppro_id=$id and roomid=$id1 and room_id=$id2";
$q=mysql_query($query);
$row1=mysql_fetch_array($q);?>
<div>
Room Type:<?php echo $row1['roomname'];?>
&nbsp;&nbsp;Date:<?php echo $newdate;?>
</div><hr>

<?php $qry="select * from wp_room_inventory_grid_details where 
ppro_id=$id and roomid=$id1 and newgrid_date='$newdate' and room_id=$id2";
$q1=mysql_query($qry);
$row=mysql_fetch_array($q1);?>
<table border="1" align="left">
<tr><td>Select the data you would like to copy:</td></tr>

<tr>
<td>Inventory Part</td>
<td>Use?</td>
<td>Value</td>
</tr>

<tr>
<td>Rate</td>
<td><input type="checkbox" name="check" value="check"></td>
<td>$<?php echo $row['newroomrate'];?> 
<input type="hidden" name="roomrate" value="<?php echo $row['newroomrate'];?>"></td>
</tr>
<tr>
<td>Stop Sell</td>
<td><input type="checkbox" name="check" value="sold" <?php if($row['newstop_sell']=='sold'){;?>checked="checked"<?php }else{?><?php }?>>
<td><?php if($row['newstop_sell']){;?>Yes<?php }else{?>No</td><?php }?></td>
</tr>
<tr>
<td>Enquiry</td>
<td><input type="checkbox" name="enquiry" value="enquiry" <?php if($row['flag']=='enquiry'){;?>checked="checked"<?php }else{?><?php }?> >
<td><?php if($row['flag']=='enquiry'){;?>Yes<?php }else{?>No</td><?php }?></td>
</tr>
<tr>
<td>Min Stay</td>
<td><input type="checkbox" name="check" value="check"></td>
<td><?php echo $row['newmin_room_stay'];?></td>
</tr>

<!--<tr><td>Select the Room Types you want this update applied to:</td></tr>
<tr>
<td>All</td><td><input type="checkbox" name="check" value="check"></td></tr>
<?php $room="select name from wp_room_type_details where ppro_id=$id";
$q11=mysql_query($room) or die(mysql_error());;
while($rr=mysql_fetch_array($q11))
{?>
	<tr><td>
    <?php echo $rr['name'];?>
    <td><input type="checkbox" name="check" value="check">
	
<?php }?>
</td></td></td>
</tr>--></table>
<br><br><br><br><br><br>
<div style="width:500px; height:20px; float:left">

<label for="form" style="align:left;">From:</label></div>
<input type="text" id="fromDate" name="fromDate" value="<?php echo $newdate;?>"/>
<label for="to">To:</label>
<input type="text" id="toDate" name="toDate"/>


<div>
<input type="submit" name="save" value="save">
<input type="submit" name="cancel" value="cancel">
</div>
</form>