<?php 
ob_start();
@session_start();
 $img_id=$_REQUEST['imgid'];
$title=$_REQUEST['title'];
//echo $img_id;
require_once('functions.php');
require_once('connection.php');
@session_start();
$user=new User();
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}
?>
<html>
<head>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/edit.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

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
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body data-spy="scroll" data-target=".navbar">
<div id="Propertish_page_css">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
<div id="menu_bar">
<div id="menu_text"></div>
</div> 
 <a href="#" class="login_btn"><span><?php echo $_SESSION['role']; ?></span><div class="triangle"></div></a>
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
$result = mysql_query("SELECT * FROM wp_properties  where user_id='$uid'")
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
<div id="booking_images_state_content">
<div id="Configuring_All_Images_background">
<div id="Configuring_All_Images_heading">Configuring - All Images</div>
</div>
<div id="all_images_mainborder">
<div id="all_images_button"> 
<?php $f="select * from wp_images ";
   $d=mysql_query($f) or die(mysql_error());
   $no=mysql_num_rows($d);?>
    <center><h4>All Images (<?php echo $no?>)</h4></center></div>
<div id="all_images_roundborder_edit_delete">
<div id="edit_image_main_div">
<div id="edit_images_edit_delete">Edit Image</div>
<div id="image_edit_delete">
<?php
             $result = mysql_query("select * from wp_images where img_id=$img_id");?>
          
      <?php
			$rows=mysql_fetch_array($result)
			
				 /*$img_id=$rows['id'];
				 $title=$rows['img_name'];*/
				 
				?>
                <div class="section" id="example">
                 <div class="imageRow">
  	<div class="single">
                 		
    <a href="<?php echo $rows['actual_img'];?>" rel="lightbox[plants]" title="Click on the right side of the image to move forward."><img src="<?php echo $rows['thumb_img'];?>"alt="Plants: image 1 0f 4 thumb"/></a>
  	
	</div></div></div>		
</div>
</div>
<form name="form" action="" method="post" >
<input type="hidden" value="<?php echo $img_id;?>" name="img_id">

<div id="table_edit_delete">
<div id="123_murphyst_heading"><h2><?php echo $title;?></h2></div>
<table width="250" border="0" style="margin:20px 0px 0px 0px;">
  <tr>
    <td scope="row" style="margin:0px 0px 0px 0px; height:20px">Title:</td>
    <td><input name="img_name" type="text" value="<?php echo $title;?>" style="width:350px; "></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Description: </td>
    <td><textarea style="width:350px;" rows="4" cols="20" name="des"><?php echo $_REQUEST['des'];?></textarea></td>
      </tr>
      <div id="Dimensions"></div>
</table>
</div>

</div>
<div id="emty_div_edit_delete"></div>
&nbsp;&nbsp;
&nbsp;
&nbsp;
</div>
Video Mapping:
<select id="video" name="video">
<option value="" selected="selected">--select--</option>
<?php $q=mysql_query("select * from wp_video_url");
//echo $q;
while($row=mysql_fetch_array($q))
{?>
	
  <option value="<?php echo $row['video_id'];?>"><?php echo $row['url'];?></option>
 


<?php }?></select>
<div id="all_images_border_retiangle_2">
<br>Room Type Mappings</div>
 <div id="select_box_edit">
 <?php 
$q1=mysql_query("select * from wp_img_config_mapping");
$r1=mysql_fetch_array($q1);

$query=mysql_query("select * from wp_properties where user_id='$uid'");?>
<table border=1>
<tr>
<td>
Booking Form:</td>
 <td><select  name="mySelect1" id="mySelect1" onChange="propertyChange('changeproperty.php?id='+this.value)">
      <option value="" selected="selected"></option>
	  <?php
       while( $result=mysql_fetch_array($query)) // Fetch Array in $row
       {
		   $select="";
		   if($_POST['mySelect1'] == $result['ppro_id'])
		   {
			   $select="selected";
		   }
         ?>
       
       <option value="<?php echo $result['ppro_id'];?>" <?php echo $select;?>><?php echo $result['Name'];?>
           
       </option>          
          <?php 
		  
                } 
                ?>  

</select></td></tr>
<tr>
<td>Property:</td>
<?php 
$postpro=$_POST['mySelect1'];
//echo $postpro;
$query=mysql_query("select ppro_id,Name from wp_properties where ppro_id ='$postpro'");?>
<td><select id="append1" name="last_name" onChange="changeRoom('changeproperty.php?id1='+this.value)"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
	 $select2="";
		   if($_POST['last_name'] == $result['ppro_id'])
		   {
			   $select2="selected";
		   }?>
<option value="<?php echo $result['ppro_id'];?>"<?php echo $select2;?>><?php echo $result['Name']; ?></option>
<?php }?>
</select></td></tr>
<tr>
<td> Room Type:</td>
<?php 

$query=mysql_query("select roomid,name from wp_room_type_details where ppro_id='$postpro'");?>
<td><select id="append2" name="room" onChange="changeRoom1('changeproperty.php?roomid='+this.value)"> 
<option value="" selected="selected">--select--</option><?php
       while( $result=mysql_fetch_array($query))
{
	 $select3="";
		   if($_POST['room'] == $result['roomid'])
		   {
			   $select3="selected";
		   }?>
<option value="<?php echo $result['roomid'];?>" <?php echo $select3;?>><?php echo $result['name']; ?></option>
<?php }?>
</select></td></tr>
<tr><td>Select Room</td>
<td> 

<select id="append3" name="room_name"> 
<option value="" selected="selected">--select--</option>
       
</select>
</td></tr>
<tr><td></td><td><input type="submit" name="SUBMIT2" value="Add Mapping"></td>
</div>
</form>
<form action="img_data_insert.php" method="post" name="saveform">

<?php 
if($_POST['SUBMIT2'] == "Add Mapping") 
{
	 $imgid=$_POST['img_id'];
	 $img_name=$_POST['img_name'];
	 $des=$_POST['des'];
	$video_id=$_POST['video'];
	
	 $pname=$_POST['mySelect1'];
	 $name=$_POST['last_name'];
	 $rname=$_POST['room'];
	 
	$room=$_POST['room_name'];
	
	$query=mysql_query("select Name from wp_properties where ppro_id='$pname'");
	$r=mysql_fetch_array($query);
	$query1=mysql_query("select name from wp_room_type_details where roomid='$rname'");
	$r1=mysql_fetch_array($query1);
	$pn=$r['Name'];
	$na=$r['Name'];
	$rn=$r1['name'];
	$inq=mysql_query("insert into wp_img_config_mapping values('','$pn','$na','$rn')");?>
    <input type="hidden" value="<?php echo $imgid;?>" name="imid">
    <input type="hidden" value="<?php echo $img_name;?>" name="imname">
    <input type="hidden" value="<?php echo $des;?>" name="des">
    <input type="hidden" value="<?php echo $pname;?>" name="pid">
    <input type="hidden" value="<?php echo $name;?>" name="ppid">
    <input type="hidden" value="<?php echo $rname;?>" name="rid">
    <input type="hidden" value="<?php echo $video_id;?>" name="video_id">
     <input type="hidden" value="<?php echo $room;?>" name="room">
<?php }?>
<table width="670px" border="1" style="margin:10px 0px 100px 10px;">
  <tr bgcolor="#CCCCCC">
    <td scope="row">&nbsp;Booking Form</td>
    <td>&nbsp;Property</td>
    <td>Room type</td>
    <td>&nbsp;Options</td>
   </tr>
<tr>
<?php 
$q=mysql_query("select * from wp_img_config_mapping");?>

<?php while($row=mysql_fetch_array($q))
{?>
	<td>
	<?php echo $row['Name']."<br>";?></td>
	<td><?php echo $row['Pname']."<br>";?></td>
	<td><?php echo $row['rname']."<br>";?></td>
    <td><a href="deletemap.php?id=<?php echo $row['mapid'];?>&id1=<?php echo $img_id;?>&tit=<?php echo $title;?>">Delete Mapping</a></td>
</tr><?php }
?>
</tr></table>
<div></div>

<input type="hidden" name="title" value="<?php echo $title;?>">
<input type="submit" name="SUBMIT" value="SAVE">


</form>





<div id="edit_fotter_bottom_img"></div>

</div>
<div id="emty_div">
</div>

</div>

