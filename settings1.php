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
<div  style="  width:400px; height:40px; border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin: 10px 0px 0px 250px;">
You are here:&nbsp;&nbsp;<span><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" />&nbsp;&nbsp;
    <span><a href="settings.php"><img src="images/system.png"/>Settings</a></span></div><br>
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php"> Inventory</a></li>

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
<li class="active"> <a href="#">Booking Forms</a></li>
<!--<li > <a href="#">Channels</a></li>
<li> <a href="#">Pms</a></li>
<li><a href="#"> Account Controls</a></li>
<li><a href="#"> Account</a></li>
<li><a href="#">Users</a></li>-->
</ul>

</div>
<div id="content">
<div id="booking_forms_page_buttion">
<ul>
<li> <a href="bookformstaypay.php">Stay Pays</a></li>
<li> <a href="wp_promotions.php">Promotions</a></li>
<li> <a href="video_mapping.php">Videos</a></li>
<li> <a href="imgupload.php">Images</a></li>
</ul>

</div>

</div>
<?php 
$bookingform=mysql_query("SELECT * FROM wp_booking_forms") or die(mysql_error());
while($bookingformdata=mysql_fetch_array($bookingform))
{
?>
<div id="booking_form_content">

<div id="booking_form_content_left">
<div id="booking_form_content_left_heading_background">
<div class="name_heading_left">Name</div>

<div class="left_text">
<?php echo $bookingformdata['bookingform_name'];?>
</div>

</div>
</div>
<div id="booking_form_content_middle">
<div id="booking_form_content_middle_heading_background">
<div class="mode_heading_middle">Mode</div>
<div class="middle_1_text"><?php echo $bookingformdata['bookingform_mode'];?></div>

</div>

</div>
<div id="booking_form_content_middle_2">
<div id="booking_form_content_middle_2_heading_background">
<div class="hyperlink_heading_middle_2"> Hyperlink</div>

<div class="textare_middle_2">
<textarea name="textarea" style=" width:200px; ">
<?php 
if($bookingformdata['bookingform_mode']==Account){
	echo "PropertySelection.php?bf_id=".$bookingformdata['bookingform_id'];
}
else{
	
	echo "RoomTypeSelection.php?bf_id=".$bookingformdata['bookingform_id'];
}?></textarea>

</div>

<div id="go_to_form_link_page"> <a href="<?php if($bookingformdata['bookingform_mode']==Account){
	echo "PropertySelection.php?bf_id=".$bookingformdata['bookingform_id'];
}
else{
	
	echo "RoomTypeSelection.php?bf_id=".$bookingformdata['bookingform_id'];
}?>">Go to form <br></a>



</div>

</div>

</div>
<div id="booking_form_content_right">

<div id="booking_form_content_right_heading_background">
<div class="options_heading_right">Options</div>
<div id="options_navigation">
<ul>
<!--<li> <a href="bookingform_settings.php?bf_id=<?php echo $bookingformdata['bookingform_id'];?>">Settings</a></li>-->
<!--<li><a href="allmappings.php"> Mappings</a></li>
<li><a href="#"> White Label</a></li>-->
<li><a href="BookingFormContentConfiguration.php"> Content</a></li>
<li> <a href="wp_widget.php">Widget</a></li>
<!--<li> <a href="#">Properties</a></li>
<li> <a href="#">Rooms</a></li>-->
</ul>
</div></div></div>
<?php }?><br /></div>
</div>
</div>
</body>
</body>
</html>
