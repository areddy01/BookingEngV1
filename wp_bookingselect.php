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
<script src="js/jquery/jquery.js" type="text/javascript"></script>
	<script src="js/jquery/ifx.js" type="text/javascript"></script>
	<script src="js/jquery/idrop.js" type="text/javascript"></script>
	<script src="js/jquery/idrag.js" type="text/javascript"></script>
	<script src="js/jquery/iutil.js" type="text/javascript"></script>
	<script src="js/jquery/islider.js" type="text/javascript"></script>

	<script src="js/jquery/color_picker/color_picker.js" type="text/javascript"></script>


	<link href="js/jquery/color_picker/color_picker.css" rel="stylesheet" type="text/css">
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
    <tr><td>Text Color:</td><td><FORM name="fcp"><div style="float:left">
					<a href="javascript:void(0);" rel="colorpicker&objcode=myhexcode&objshow=myshowcolor&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" ><div id="myshowcolor" style="width:15px;height:15px;border:1px solid black;">&nbsp;</div></a></div></FORM> </td></tr>
    <tr><td>Background Color:</td><td><FORM name="fcp"><div style="float:left">
					<a href="javascript:void(0);" rel="colorpicker&objcode=myhexcode&objshow=myshowcolor&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" ><div id="myshowcolor" style="width:15px;height:15px;border:1px solid black;">&nbsp;</div></a></div></FORM></td> </tr>
    <tr><td>Border Color:</td><td><FORM name="fcp"><div style="float:left">
					<a href="javascript:void(0);" rel="colorpicker&objcode=myhexcode&objshow=myshowcolor&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" ><div id="myshowcolor" style="width:15px;height:15px;border:1px solid black;">&nbsp;</div></a></div></FORM></td> </tr>
    <tr><td>Background Gradient Linear(from top to bottom):	</td><td><FORM name="fcp"><div style="float:left">
					<a href="javascript:void(0);" rel="colorpicker&objcode=myhexcode&objshow=myshowcolor&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" ><div id="myshowcolor" style="width:15px;height:15px;border:1px solid black;">&nbsp;</div></a></div></FORM></td> </tr>
    </table>
</td>
<td>
	<table>
    <tr><td>Font name</td>
    <td><select >
     <option selected="selected">Not Selected</option>
     <option>Arial</option></select></td></tr>
    <tr><td>&nbsp;</td><td><input type="checkbox">Clear Text Decorations</td></tr>
    <tr><td>&nbsp;</td><td><input type="checkbox">Bold</td></tr>
    <tr><td>Text decorations</td><td><input type="checkbox">Italic</td></tr>
    <tr><td>&nbsp;</td><td><input type="checkbox">Underline</td></tr>
    <tr><td>&nbsp;</td><td><input type="checkbox">Overline</td></tr>
    <tr><td>&nbsp;</td><td><input type="checkbox">Strikeout</td></tr>
    </table>
</td>
<td>
	<table>
    <tr><td>Width</td><td><input type="text" style="width:45px;"><select >
     <option>pixel</option>
     <option>pica</option>
     <option>point</option>
     <option>percentage</option></select></td></tr>
    <tr><td>Height</td><td><input type="text" style="width:45px;"><select >
     <option>pixel</option>
     <option>pica</option>
     <option>point</option>
     <option>percentage</option></select></td></tr>
    <tr><td>Font size</td><td><input type="text" style="width:45px;"><select >
     <option>pixel</option>
     <option>pica</option>
     <option>point</option>
     <option>percentage</option></select></td></tr>
    <tr><td>Border width</td><td><input type="text" style="width:45px;"><select >
     <option>pixel</option>
     <option>pica</option>
     <option>point</option>
     <option>percentage</option></select></td></tr>
    <tr><td>Border Radius	</td><td><input type="text" style="width:45px;"><select >
     <option>pixel</option>
     <option>pica</option>
     <option>point</option>
     <option>percentage</option></select></td></tr>
    </table>
</td>
</tr>
</table>
<script language="Javascript">

			function myokfunc(){
				alert("This is my custom function which is launched after setting the color");
			}

			//init colorpicker:
			$(document).ready(
				function()
				{
					$.ColorPicker.init();
				}
			);

		</script>
        
</body>
</html>
