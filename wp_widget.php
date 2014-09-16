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
<div id="Propertish_page_css">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
 <a href="#" class="login_btn"><span><?php echo $_SESSION['role'] ?></span><div class="triangle"></div></a>
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
<div  style="  width:480px; height:40px; border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin: 10px 0px 0px 250px;">
You are here:&nbsp;&nbsp;<span><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" />&nbsp;&nbsp;
    <span><a href="settings.php"><img src="images/system.png"/>Settings</a></span>
    <span><a href="wp_widget.php"><img src="images/bookingform.png"/>Widget Configuration</a></span></div><br>
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>

<li>  <a href="propertymanager.php">Property Manager</a></li>

<!--<li>  <a href="inclusions.php">Inclusions</a></li>

<li>  <a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>
<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
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
<?php 
$uid=$_SESSION['id'];
$bookingform=mysql_query("SELECT * FROM wp_booking_forms where user_id='$uid'") or die(mysql_error());
$bookingformdata=mysql_fetch_array($bookingform);
?>
<div id="content">


<div class="configContent" style="border: 1px solid #ccc;
    margin: 20px 0 0;
    padding: 0 10px 10px 10px;
    z-index: 1;">
                        <ul class="nav" style="list-style-type: none;
    margin-top: -8px;
    margin-bottom: 10px;
    padding: 0;
    position: relative;
    text-align: center;
    z-index: 2;">
                            <li>
                                <a class="active" style=" background-color: #F7F7F7;
    border-left: solid 1px #777;
    border-right: solid 1px #777;
    border-top: solid 3px #777;
    border-bottom: solid 3px #777;
    color: #6F7476;
      background-color: #E5E5E5;
    border: 1px solid #CCC;
    color: #0069B6;
    font-weight: bold;
    text-decoration: none;
    padding: 3px 15px;
">Widget URL and Instructions</a></li></ul>
                        <div class="box">
                            <table>
                                <tbody><tr>
                                    <th>
                                        URL:
                                    </th>
                                    <td>
                                        <input name="ctl00$plcBody$urlTextBox" type="text" value="http://dev.wotusee.com.au/wp-content/plugins/BookingEng/PropertySelection.php?bf_id=<?php echo $bookingformdata['bookingform_id'];?>" id="ctl00_plcBody_urlTextBox"  readonly="readonly" style="width:100%;">
                                    </td>
                                </tr>
                                <tr><td></td></tr>
                                <tr>
                                    <th style="
            vertical-align: top;">
                                        Instructions:
                                    </th>
                                    <td>
                                        To use this widget you must have someone who can understand basic web development.<br>
                                        They can then either paste the following HTML code into the page(s) that you want
                                        the widget to appear on.<br>
                                        Or they can use the above URL to make the iframe however they wish to. 
                                        <code style="display: block;
            margin: 20px;
            font-size: 10pt;
            color: #0069B6;
            font-weight: bold;">&lt;iframe
                                            src="<span id="ctl00_plcBody_urlLabel">http://dev.wotusee.com.au/wp-content/plugins/BookingEng/PropertySelection.php?bf_id=<?php echo $bookingformdata['bookingform_id'];?></span>"   frameborder="0" width="<span id="ctl00_plcBody_iframeWidthLabel">1400px</span>" height="<span id="ctl00_plcBody_iframeHeightLabel">700px</span>"&gt;<br>
                                            &lt;p&gt;Your browser does not support iframes.&lt;/p&gt;<br>
                                            &lt;/iframe&gt; </code>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                        <div class="clear">
                        </div>
                    </div>


</div>





</body>
</body>
</html>