<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();
$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
} 
$gird_id=$_REQUEST['grid_id'];
$select1=mysql_query("SELECT * FROM wp_booking_grid WHERE grid_id='$grid_id'");

?>
<html>
<head>
</head>
<body>
<table>
<tr>
<input type="hidden" name="action" value="BookingGrid">
<td><center>
Section:
		<select  id="selection" onChange="bookinggrid('wp_bookingselect.php?grid_id='+this.value)">
		<?php 
		while($select2=mysql_fetch_array($select1))
		{
			$grid=$sele2['grid_id'];
			$select3="";
			if($grid==$gird_id)
			{
				$select3="selected='selected'";
			}
			?>
		<option value="<?php echo $selection['grid_id'];?>" <?php echo $select3;?>><?php echo $selection['selection'];?></option>
        <?php } ?>
        </select>
        </center></td>
</tr>
<tr>
Table - The overall booking form grid.
</tr>
<tr><th>Color</th>
<th>Font Styles</th>
<th>Sizes</th>
</tr>
<tr>
<td>
	<table>
    <tr><td>Text Color:</td><td>colorpicker</td> </tr>
    <tr><td>Background Color:</td><td>colorpicker</td> </tr>
    <tr><td>Border Color:</td><td>colorpicker</td> </tr>
    <tr><td>Background Gradient Linear(from top to bottom):	</td><td>colorpicker</td> </tr>
    </table>
</td>
<td>
	<table>
    <tr><td>Font name</td><td>selectbox</td></tr>
    <tr><td>&nbsp;</td><td>Clear Text Decorations</td></tr>
    <tr><td>&nbsp;</td><td>Bold</td></tr>
    <tr><td>Text decorations</td><td>Italic</td></tr>
    <tr><td>&nbsp;</td><td>Underline</td></tr>
    <tr><td>&nbsp;</td><td>Overline</td></tr>
    <tr><td>&nbsp;</td><td>Strikeout</td></tr>
    </table>
</td>
<td>
	<table>
    <tr><td>Width</td><td></td></tr>
    <tr><td>Height</td><td></td></tr>
    <tr><td>Font size</td><td></td></tr>
    <tr><td>Border width</td><td></td></tr>
    <tr><td>Border Radius	</td><td></td></tr>
    </table>
</td>
</tr>
</table>
</body>
</html>
