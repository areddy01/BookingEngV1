<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>
<html>
<head>
<script type="text/javascript" src="js/bookinggrid.js"></script>
</head>
<?php 
$booking=mysql_query("SELECT grid_id,selection FROM wp_booking_grid");
?>
<div id="bookinggrid">
<table>
<tr>
<input type="hidden" name="action" value="BookingGrid">
<td><center>
Selection:
		<select  id="selection" onChange="bookingGrid('wp_bookingselect.php?grid_id='+this.value)">
		<?php 
		while($selection=mysql_fetch_array($booking))
		{?>
		<option value="<?php echo $selection['grid_id'];?>"><?php echo $selection['selection'];?></option>
        <?php } ?>
        </select>
        </center></td>
</tr>
</table>
</div>