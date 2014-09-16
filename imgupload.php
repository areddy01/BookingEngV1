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
<html lang="en-us">
<head>

	<meta name="description" lang="en" content="Lightbox 2 is a simple, unobtrusive script used to overlay images on the current page. It's a snap to setup and works on all modern browsers." />
  <meta name="author" content="Lokesh Dhakar">

  <meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" type="image/ico" href="images/favicon.gif" />	
	<link rel="stylesheet" href="cssscreen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

  


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<meta name="description" lang="en" content="Lightbox 2 is a simple, unobtrusive script used to overlay images on the current page. It's a snap to setup and works on all modern browsers." />
  <meta name="author" content="Lokesh Dhakar">

  <meta name="viewport" content="width=device-width">

	

 <!-- <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>-->

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
	<link rel="stylesheet" href="css/pagination.css" type="text/css"/>

<!--  <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
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
  <link href="css/main.css" rel="stylesheet" type="text/css" />
  </head>

<body>
<div id="Propertish_page_css">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
 <a href="#" class="login_btn"><span><?php echo $_SESSION['role'];?></span><div class="triangle"></div></a>
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
$result = mysql_query("SELECT * FROM wp_properties where user_id='$uid'")
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

<!--<li>  <a href="inclusions.php">Inclusions</a></li>

<li>  <a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>
<li> <a href="logout.php"> Logout</a></li>-->



</ul>

</div>


<!--<div id="setting_page_buttion">
<ul>
<li> <a href="channels.html">Channels</a></li>
<li> <a href="pms.html">Pms</a></li>
<li class="active"> <a href="#">Booking Forms</a></li>
<li> <a href="account controls.html">Account Controls</a></li>
<li> <a href="account.html">Account</a></li>
<li><a href="users.html"> Users</a></li>

</ul>
</div>-->
<div id="content">
<div id="booking_forms_page_buttion">
<ul>
<!--<li> <a href="bookformstaypay.php">Stay Pays</a></li>-->
<li> <a href="#">Stay Pays</a></li>
<li> <a href="#">Promotions</a></li>
<li> <a href="#">Extra</a></li>
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
    align:center;"> Configuring - All Images</div>
</div>
<div id="all_images_mainborder" style="width:710px;
	height:500px;
	margin:30px 0px 0px 10px;
	padding:0px 0px 0px 0px;
	float:left;
	border: #999 1px double;"
>
<div id="all_images_button"> </div>
<div id="all_images_roundborder" style=" width:690px;
	height:280px;
	margin:0px 0px 0px 10px;
	padding:0px 0px 0px 0px;
	float:left;
	-webkit-border-radius:14px;
	moz border radius:14px;
	border-radius:14px;
	-0-border-radius:14px;
	color:#03F;
	border:#9fa1a1 double 1px;" >
<?php

$perpage = 3;
@$t=$_REQUEST['title'];
if(isset($_GET["page"]))
{
$page = intval($_GET["page"]);
}
else
{
$page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$f="select * from wp_images ";
   $d=mysql_query($f) or die(mysql_error());
   $no=mysql_num_rows($d);?>
         <div id="all_images_button" style="width:130px;
	height:25px;
	margin:0px 200px 0px 300px;
	padding:0px 0px 0px 0px;
	float:left;
	background:#565554;
	font-family:Tahoma, Geneva, sans-serif;
	color:#FFF;
	font-weight:300;
	font-size:14px;
	text-align:center;
	border:#c79b47 double 1px;
	direction:none;
	text-decoration:none;
	list-style:none;
	display:block;">All Images (<?php echo $no?>)</div>
            
             <?php
             $result = mysql_query("select * from wp_images Limit $start, $perpage");
$rows = mysql_num_rows($result);
if($rows)
{
$i = 0;?>
 <div class="imageRow"  >
  	<div class="set"  style="margin:0px 0px 0px 0px;">
    
  	  <div class="single first"" style="margin:0px 0px 0px 0px;">
      
     
      <?php
     
			while($rows=mysql_fetch_array($result))
			{
				 $img_id=$rows['img_id'];
				 $title=$rows['img_name'];
				?>    <table align="left">      
  <tr><td><a href="<?php echo $rows['actual_img'];?>" rel="lightbox[plants]" title="Click on the right side of the image to move forward."><img src="<?php echo $rows['thumb_img'];?>"alt="Plants: image 1 0f 4 thumb"/></a></td></tr>
  <tr><td>
  <a href="edit_image1.php?imgid=<?php echo $img_id;?>&title=<?php echo $title;?>">[edit]</a><a href="img_delete.php?imgid=<?php echo $img_id;?>">[delete]</a></td></tr>
 </table>
 <?php
}}?>


</div></div></div>


<table width="400" cellspacing="2" cellpadding="2" align="center" >
<tr>
<td align="center">
<?php
if(isset($page))
{
$result = mysql_query("select Count(*) As Total from wp_images");
$rows = mysql_num_rows($result);
if($rows)
{
$rs = mysql_fetch_array($result);
$total = $rs["Total"];
}
$totalPages = ceil($total / $perpage);
if($page <=1 )
{?>
<center>
<?php 
echo "<span id='page_links' style='font-weight:bold;'>Prev</span>";
}
else
{
$j = $page - 1;
echo "<span><a id='page_a_link' href='imgupload.php?page=$j'>< Prev</a></span>";
}
for($i=1; $i <= $totalPages; $i++)
{
if($i<>$page)
{
echo "<span><a href='imgupload.php?page=$i' id='page_a_link'>$i</a></span>";
}
else
{
echo "<span id='page_links' style='font-weight:bold;'>$i</span>";
}
}
if($page == $totalPages )
{
echo "<span id='page_links' style='font-weight:bold;'>Next ></span>";
}
else
{
$j = $page + 1;
echo "<span><a href='imgupload.php?page=$j' id='page_a_link'>Next</a></span>";
}
}
?>
</center>
<td>
</tr>
</table>
<div id="all_images_border_retiangle" style="width:690px;
	height:150px;
	margin:10px 0px 0px 0px;
	padding:0px 0px 0px 0px;
	float:left;
	border: #999 1px double;">
<div id="all_images_uppdate" style="margin:0px 0px 0px 300px;">Image Uploader</div>
<form enctype="multipart/form-data" action="" method="POST" >
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
	Pick an Image from your computer: <input name="user_image[]" type="file" multiple="multiple" />
	<br />
    <input type="submit" value="Upload" name="Submit" style="margin:0px 0px 0px 20px;" />
</form>
<div class="section" id="example" align="center">
<?php
 if(@$_POST ['Submit'])
{
	 $file=$_FILES['user_image']['tmp_name'];
	 $cnt=count($file);
	 for($i=0;$i<$cnt;$i++)
	{
	if($_FILES['user_image']['size'][$i] < 3000000)
	{	
	$target_folder = 'upload/roomimages/'; // This is the folder to which the images will be saved
	$upload_image = $target_folder.basename($_FILES['user_image']['name'][$i]); // The new file location

	if(move_uploaded_file($_FILES['user_image']['tmp_name'][$i], $upload_image)) 
	{
	//	include("config.php");  Include the mysql file so that we can strip SQL from the variables (And we need the SQL connection later...)
		$newname=$_FILES['user_image']['name'][$i]; // Set the thumbnail name
		$actual = $target_folder.$newname; // Set the actual image name
		$thumbnail = $target_folder."thumbnail_".$newname;
		
	 	list($width, $height) = getimagesize($upload_image);
		$newwidth = 200; // This can be a set value or a percentage of original size ($width)
		$newheight = 200; // This can be a set value or a percentage of original size ($height)
			
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		@$source = imagecreatefromjpeg($upload_image);
		
		@imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		
		@imagejpeg($thumb, $thumbnail, 100);
				
		rename($upload_image, $actual);
		
		if(mysql_query("INSERT INTO wp_images (img_id,img_name,actual_img,thumb_img) VALUES('','$newname','$actual', '$thumbnail')"))
		{
			header('location:imgupload.php');
			 }
		else
		{
			unlink($actual);
			unlink($thumbnail);
			?>
			<p>There was an error storing your image in the database.  All traces of it on the server have been deleted.</p>
			<?php
		}
	}
	else
	{
	    ?>
		<p>Error processing file.  It may be too large.</p>
		<?php
	}
}
else
{
		?>
		<p>Error processing file.  It is the wrong format (.jpeg only) or too big.</p>
		<?php
}}}
?></center>
<td>
</tr>
</table>
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