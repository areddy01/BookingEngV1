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
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css" /></head>

<body>
<div id="Propertish_page_css">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
 <a href="#" class="login_btn"><span><?php echo $_SESSION['user'] ?></span><div class="triangle"></div></a>
                <div id="login_box">
                    <div id="tab"></div>
                    <div id="login_box_content"></div>
                    <div id="login_box_content">
                        <form id="login_form" action="logout.php">
                         <input  type="submit" name="logout" value="LOGOUT" />
                        </form>
                    </div>
                </div>

<form id="selfrm" name="frm" action="" method="post" >
<?php

$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">

<select id="ddlViewBy" name="sele" onChange="this.form.submit();" class="select_1" >

<?php

while($row = mysql_fetch_array($result))
{
$r1=$row['ppro_id'];
	$select="";
if($sele==$r1)
{

   $select="selected='selected'";	
	}
?>
   <option value="<?php echo $row['ppro_id'];?>" <?php echo $select; ?> > <?php echo $row['Name'];?> </option>
  
<?php
 }
 ?>


</select>

</div></div></form></div>
<div id="main_content">

<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="#"> Inventory</a></li>

<li>  <a href="propertymanager.php">Property Manager</a></li>

<!--<li>  <a href="inclusions.php">Inclusions</a></li>

<li>  <a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>
<li> <a href="logout.php"> Logout</a></li>-->



</ul>

</div>

<div id="reporting_buttion">
<ul>
<li class="active"> <a href="settings.php">Booking Forms</a></li>
<!--<li > <a href="#">Channels</a></li>
<li> <a href="#">Pms</a></li>
<li><a href="#"> Account Controls</a></li>
<li><a href="#"> Account</a></li>
<li><a href="#">Users</a></li>-->
</ul>

</div>
<div id="content">

<div id="apprtments_1">
<form name="" action="bookingform_settings.php" method="post">
<table width="500" border="1">
<tr  bgcolor="#666666" style="color:#CCC"><td colspan="4"><b>Editing Booking Form</b></td></tr>
<?php
$bf_id=$_REQUEST['bf_id'];
$bookformdata=mysql_query("SELECT * FROM wp_booking_forms WHERE bookingform_id='$bf_id'");
$bf_data=mysql_fetch_array($bookformdata);

if($bf_data['bookingform_mode']==Account)
{?>
<tr><td><input type="hidden" name="bookingform_id" value="<?php echo $bf_id;?>" />
Name:</td><td><input type="text" name="bookingformname" value="<?php echo $bf_data['bookingform_name'];?>" /></td></tr><tr><td>
Mode:</td><td><select name="bookingformmode" disabled="disabled">
				<option value="property" r>Account Mode</option>
</select></td></tr>
<tr><td>Property Selection: </td><td><input type="checkbox" value="yes" disabled="disabled" <?php 
if($bf_data['propertyselection']==yes)
{
	echo "checked='checked'";
	}
?> /></td></tr>
<tr><td>Region Selection: </td><td><input type="checkbox" value="yes" disabled="disabled" <?php 
if($bf_data['regionselection']==yes)
{
	echo "checked='checked'";
	}?> />	</td></tr>
<?php } 
else{?>
	<tr><td>
Name:</td><td><input type="text"  name="bookingformname" value="<?php echo $bf_data['bookingform_name'];?>"  /></td></tr><tr><td>
Mode:</td><td><select name="bookingformmode">
				<option value="">Select mode</option>
				<option value="property">Single Property Mode</option>
</select></td></tr>
<?php }?>
<tr><td colspan="2">&nbsp;</td><td><input type="submit" name="SUBMIT" value="SAVE" /></td>
<td><input type=button onClick="location.href='settings.php'" value='cancel'></td></tr>
</table>
</form></div></div></div></body></html>
<?php
 if(isset($_POST['SUBMIT']))
 {
	 
	 $bf_id=$_POST['bookingform_id'];
	 	 $bookingformname=$_POST['bookingformname'];
	 $bookingformmode=$_POST['bookingformmode'];

	 $bfd_update=mysql_query("UPDATE wp_booking_forms SET bookingform_name='$bookingformname' WHERE bookingform_id='$bf_id'");
	
	  header("Location: bookingform_settings.php?bf_id=$bf_id");

  }
 ?>