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

<!doctype html>
<html lang="en-us"><head>

	<meta name="description" lang="en" content="Lightbox 2 is a simple, unobtrusive script used to overlay images on the current page. It's a snap to setup and works on all modern browsers." />
  <meta name="author" content="Lokesh Dhakar">

  <meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />	
	<link rel="stylesheet" href="cssscreen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

  <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<meta name="description" lang="en" content="Lightbox 2 is a simple, unobtrusive script used to overlay images on the current page. It's a snap to setup and works on all modern browsers." />
  <meta name="author" content="Lokesh Dhakar">

  <meta name="viewport" content="width=device-width">

	

  <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>

<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/upload.css" rel="stylesheet" type="text/css" />
<link href="css/img.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />	
	<link rel="stylesheet" href="cssscreen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

  <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo"></div>
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
<li> <a href="inventorygrid.php"> Inventory</a></li>

<li>  <a href="propertymanager.php">Property Manager</a></li>

<li>  <a href="inclusions.php">Inclusions</a></li>

<!--<li>  <a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>-->
<li> <a href="logout.php"> Logout</a></li>



</ul>

</div>


<div id="setting_page_buttion">
<ul>
<li> <a href="channels.html">Channels</a></li>
<li> <a href="pms.html">Pms</a></li>
<li class="active"> <a href="#">Booking Forms</a></li>
<li> <a href="account controls.html">Account Controls</a></li>
<li> <a href="account.html">Account</a></li>
<li><a href="users.html"> Users</a></li>

</ul>
</div>
<div id="content">
<div id="booking_forms_page_buttion">
<ul>
<li> <a href="bookformstaypay.php">Stay Pays</a></li>
<li> <a href="wp_promotions.php">Promotions</a></li>
<li> <a href="video_mapping.php">videos</a></li>
<li> <a href="imgupload.php">Images</a></li>
</ul>

</div>

</div>

<div id="booking_images_state_content" style="width:730px;
	height:600px;
	margin:0px 0px 0px 3px;
	padding:0px 0px 0px 0px;
	float:left;
	-webkit-border-radius:18px;
	moz border radius:18px;
	border-radius:18px;
	-0-border-radius:18px;
	color:#03F;
	border:#9fa1a1 double 1px;">
<div id="Configuring_All_Images_background" style="width:730px;
	height:58px;
	margin:0px 0px 0px 0px;
	padding:0px 0px 0px 0px;
	float:left;
	background:url(images/inclusons%20images/img111111.png) no-repeat;">

<div id="Configuring_All_Images_heading" style="width:200px;
	height:20px;
	margin:15px 0px 0px 10px;
	padding:0px 0px 0px 0px;
	float:left;
	font-family:Tahoma, Geneva, sans-serif;
	color:#FFF;
	size:18px;
    align:center;"> Configuring - All Videos</div>
</div>
<div id="all_images_mainborder">
<div id="all_images_button"> </div>
<div id="all_images_roundborder">
 



<div id="all_images_border_retiangle" >
<div id="all_images_uppdate"><center>Add Videos</center><br></div>
<form enctype="multipart/form-data" action="" method="POST" >
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
	<center>Type URL: <input type="text" name="video"></center>
	<br />
   <center> <input type="submit" value="Add URL" name="Submit" style="margin:0px 0px 0px 20px;" /></center>
</form>
<div class="section" id="example" align="center">
<?php
 if(@$_POST ['Submit'])
{
	$url=$_POST['video'];
	$query=mysql_query("insert into wp_video_url values('','$url')");
	echo "<script>alert('sucessfully Add Video');</script>";
}?>

</div>
</div>
<div id="all_images_border_retiangle">
<div id="all_images_uppdate"></div>
<div id="all_images_text">
</div>
<div id="all_images_selectan_upplede_text">
</div>


</div>
<div id="emty_div">
</div>
</div>
<div id="emty_div"></div>
</div>
</div>
</div>
</body>
</body>
</html>
