<?php
@session_start();
require_once('functions.php');
require_once('connection.php');
$user=new User(); 

if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}

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
<title>Wotusee</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<script type="test/javascript">
function redirect_softClose(service_order_id)
 {
 alert('hi');
  if(confirm("Are you sure Inventory for this SO is added proper?"))
  {
   window.location.href = "wp_deleteuserform.php?eraseCache=true&$book_id="+service_order_id;
  }
  else
  {
   return false;
  }
  
 }
 </script>
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
 <a href="#" class="login_btn"><span>Welcome <?php echo $_SESSION['firstname']?></span><div class="triangle"></div></a>
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
$uid=$_SESSION['id'];
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">

<select id="ddlViewBy" name="sele" onChange="this.form.submit();" class="select_1" >
<option>Please Select</option>
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
    <span><a href="settings.php"><img src="images/system.png"/>Forms</a></span></div><br>
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>

<?php
if($_SESSION['role']=='Super Admin'){ ?>

<li><a href="propertymanager.php">Property Manager</a></li>



<li class="active"> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>

<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<?php } else{?>
<li><a href="propertysettings.php">Properties</a></li>
<li class="active"> <a href="settings.php"> Forms</a></li>
<li> <a href="user.php">Profile</a></li>
<?php } ?>



</ul>

</div>
<?php
if($_SESSION['role']=='Super Admin'){ ?>
<div id="reporting_buttion">
<ul>
<li class="active"> <a href="#">Step 1</a></li>
<!--<li > <a href="#">Channels</a></li>
<li> <a href="#">Pms</a></li>
<li><a href="#"> Account Controls</a></li>
<li><a href="#"> Account</a></li>
<li><a href="#">Users</a></li>-->
</ul>

</div>
<!--<div id="content">
<div id="booking_forms_page_buttion">
<ul>

<li> <a href="video_mapping.php">Videos</a></li>
<li> <a href="imgupload.php">Images</a></li>
</ul>

</div>

</div>

<div id="frm"><a href="javascript:void(0);" onClick="newForm('wp_bookform.php')">Set BookingForm</a>-->
<?php 
$bookingform=mysql_query("SELECT * FROM wp_booking_forms where user_id='$uid'") or die(mysql_error());
$c=mysql_num_rows($bookingform);
if($c==''){
?>
<div id="frm"><a href="javascript:void(0);" onClick="newForm('wp_bookform.php')">Create Newform</a>
<?php
}
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
<li><a href="BookingFormContentConfiguration.php">Content</a></li>
<li> <a href="wp_widget.php">Widget</a></li>
<?php if($_SESSION['role']=='Super Admin'){?>
<li><a href="colorscheme.php">Change Color Schema</a></li>
<?php
}?>
<!--<li> <a href="#">Properties</a></li>
<li> <a href="#">Rooms</a></li>-->
</ul>
</div></div></div>
<?php }?><br /></div>
</div>
</div></div>
<?php } else{ ?>
<div id="reporting_buttion">
<ul>
<li > <a href="wp_createuserforms.php">Create Newform</a></li></ul></div>
<?php
$v=mysql_query("select distinct book_id,Name from wp_userforms where user_id='$uid'");?>

<div id="booking_form_content">
<table border="1">
<tr><th>Name</th><th>Embeded Code</th><th>Options</th></tr>


<?php
while($m=mysql_fetch_array($v)){
?>
<tr><td>
<?php  echo $m['Name'];?></td>
<td>
<code style="display: block;
            margin: 20px;
            font-size: 10pt;
            color: #0069B6;
            font-weight: bold;">&lt;iframe
                                            src="<span id="ctl00_plcBody_urlLabel">http://dev.wotusee.com.au/wp-content/plugins/BookingEng/PropertySelection.php?bf_id=<?php echo $m['book_id'];?></span>"   frameborder="0" width="<span id="ctl00_plcBody_iframeWidthLabel">1400px</span>" height="<span id="ctl00_plcBody_iframeHeightLabel">700px</span>"&gt;<br>
                                            &lt;p&gt;Your browser does not support iframes.&lt;/p&gt;<br>
                                            &lt;/iframe&gt; </code>
</td>
 <td><table><tr><td><a href="wp_edituserform.php?bookid=<?php echo $m['book_id'];?>">Edit</a></td></tr><tr><td><a href="wp_previewuserform.php?bookid=<?php echo $m['book_id'];?>">Preview</a></td></tr><tr><td><a href="wp_deleteuserform.php?bookid=<?php echo $m['book_id'];?>" onclick="return confirm('Are you sure you want to Delete this Form??')">Delete</a></td></tr><tr><td>Color</td></tr></table></td></tr>


<?php }
?>
</table></div><?php } ?>
</body>
</body>
</html>