<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 $bf_id=$_REQUEST['bf_id']."<br>";
$bfrid=$_REQUEST['bfrid']."<br>";
$ppro_id=$_REQUEST['ppro_id']."<br>";
 $arr=$_REQUEST['arr'];
$avr=$_REQUEST['avr'];
$room_id=$_REQUEST['room_id']."<br>";

$timezone1 = date_default_timezone_get();
$m= date("m");
$de= date("d");
$y= date("Y");
$date = date('Y-m-d');
$property=mysql_query("SELECT Name FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);
$property1=mysql_query("SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$bfrid'");
$propertyname1=mysql_fetch_array($property1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
 .underline {
    text-decoration:line-through;
}
 </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/design.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="shortcut icon" href="../favicon.ico"> 
       <link href="css/main.css" rel="stylesheet" type="text/css" /> <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style_img.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<link href="css/style-room.css" rel="stylesheet" type="text/css">
<link href="css/normalize.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
/*$(document).ready(function()
{
	
	$('.imgs:gt(0)').hide();
	setInterval(function() {
		$(".imgs:first-child").fadeOut(3000).next(".imgs").fadeIn(3000).end().appendTo("#show-case")
}, 4000);
      
});*/
</script>
<script>
$(document).ready(function()
{
	
	$('.imgs:gt(0)').hide();
	setInterval(function() {
		$(".imgs:first-child").fadeOut(0).next(".imgs").fadeIn(3000).end().appendTo("#show-case")
}, 4000);
     
});
</script>
<style>
#show-case
{
	box-shadow:1px 1px 5px 2px #0d456d;
	border-raduius:10px;
	height:100px;
	margin:10px auto;
	width:980px;
}
imgs
{
       position:absolute;
       width:980px;
       height:100px;
}
</style><script src="js/modernizr-2.0.6.min.js"></script>
<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				 
				<div class="rg-image">
				</div>
				<div class="rg-loading">
				</div>
				<div class="rg-caption-wrapper">
					
   
 

		<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
        <link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/bokkingform1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function log1(str)
{
       
   var xmlhttp;
   if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
   }
   else
   {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange=function()
   {
       if (xmlhttp.readyState == 4 )
           {
               if(xmlhttp.status == 200)
   {
   document.getElementById("content1").innerHTML=xmlhttp.responseText;
   }
   else
       {
           alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
       }
           }
   }
   xmlhttp.open("GET",str,true);
   xmlhttp.send();

}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}


</script>
 
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Index</title>


  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/bokkingform1.css" rel="stylesheet" type="text/css" />
 <script>
 var jq = $.noConflict();
  var dateToday = new Date();

jQuery(function($){
	
    $( "#picker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});
jQuery(function($) {
    $( "#picker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"yy-mm-dd"
    });
});
  </script>
<script type="text/javascript" language="javascript">
function log1(str)
{
       
   var xmlhttp;
   if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
   }
   else
   {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange=function()
   {
       if (xmlhttp.readyState == 4 )
           {
               if(xmlhttp.status == 200)
   {
   document.getElementById("content1").innerHTML=xmlhttp.responseText;
   }
   else
       {
           alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
       }
           }
   }
   xmlhttp.open("GET",str,true);
   xmlhttp.send();

}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}


</script>
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

<?php 

require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$bf_id=$_REQUEST['bf_id'];
$ppro_id=$_GET['ppro_id'];
$rum_id=$_GET['rumid'];
$property=mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'");
 
$roomname=mysql_query("select name from wp_room_type_details WHERE ppro_id='$ppro_id' and roomid='$rum_id'");
$r=mysql_fetch_array($roomname);
?>      
<div id="main">
<div id="logo_main">
<div id="logo_image"></div>
<div id="text_image"></div>
</div>
 <?php $data="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$room_id'";
 $rdetails=mysql_query($data);
$room_details=mysql_fetch_array($rdetails);?>

<div id="menu_bar">
<div id="menu_text"><font face="Arial, Helvetica, sans-serif" color="#eceff1" size="-1"><b>HOME >><?php echo $propertyname['Name'];?> >> <?php echo $r['name'];?> >> <?php echo $room_details['roomname'];?></font> </b></div>
</div> 
 
  <!--<div id="banner">
  
<div id="bunny_buttion"><font color="#FFFFFF" face="Verdana, Geneva, sans-serif" size="+2"><center><?php echo $room_details['roomname'];?></center></font></div>
<br />
<div id="plam_buttion"></div>-->
</div>
<!--<div id="slider">
  <div id="caption">  
    <div id="caption-top"><?php echo $rr['roomname'];?></div>
    <div id="caption-bottom"><?php echo $r['name'];?>,<?php echo $propertyname['Name'];?></div>
  </div>
</div>-->
<div id="show-case">
		<!--<img class="imgs" src="images/8.jpg">
	<img class="imgs" src="images/3.jpg">
    <img class="imgs" src="images/11.jpg">-->
  <?php $q11="select img_id,video_id from  wp_imginfo  where  ppro_id='$ppro_id' and roomid='$rum_id'";
  
  $r11=mysql_query($q11);
 $n1=mysql_num_rows($r11);
  while($res1=mysql_fetch_array($r11))
  {
  
   $imgid1=$res1['img_id'];
  
  
  $q21="select * from  wp_images where img_id='$imgid1'";
    $r21=mysql_query($q21);
  $res11 = mysql_num_rows($r21);
  while($res11=mysql_fetch_array($r21))
  {?>
  
	   
	  <img class="imgs" src="<?php echo $res11['actual_img'];?>" width="980px" height="300px"/>
    
      <?php }
  }
  ?>
 
	  
 
 
 
 
 
 
 
 
 
</div>




<div id="content">
  <div id="main2" style="width:560px;">
    <div id="see-the-room">
      <h1>see the room</h1>
      <div id="gallery">
      
  <?php $q1="select img_id,video_id from  wp_imginfo  where  ppro_id='$ppro_id' and roomid='$rum_id'";
  
  $r1=mysql_query($q1);
 $n=mysql_num_rows($r1);?>
  <div class="container">
			<div class="header">
			    <div class="clr"></div>
			</div>
			<div class="content">
				<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
                            
     <div class="es-carousel">
								<ul>
 <?php  while($res=mysql_fetch_array($r1))
  {
  
   $imgid=$res['img_id'];
  
  $vid=$res['video_id'];
  $q2="select * from  wp_images where img_id='$imgid'";
    $r2=mysql_query($q2);
  $res1 = mysql_num_rows($r2);?>
 
 <!--<div class="imageRow"  >
  	<div class="set"  style="margin:0px 0px 0px 0px;">
    
  	  <div class="single first" style="margin:0px 0px 0px 0px;">-->
     
      <?php
while($res1=mysql_fetch_array($r2))
  {
	   ?>
	      
	 <?php $img_id=$res1['img_id'];
				 $title=$res1['img_name'];
				?>    
                <!--<table align="left">      
  <tr><td><a href="<?php echo $res1['actual_img'];?>" rel="lightbox[plants]" title="Click on the right side of the image to move forward."><img src="<?php echo $res1['thumb_img'];?>"alt="Plants: image 1 0f 4 thumb"/></a></td></tr>
 
 </table>-->
<li><a href="#"><img src="<?php echo $res1['thumb_img'];?>" data-large="<?php echo $res1['actual_img'];?>" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>
 	
 <?php
}?>
	
 <?php } 
  ?>
  
			</ul>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>

  <!--</div></div></div>-->
 
  <div class="main-box">
  <?php while($row=mysql_fetch_array($property))
{
//$popup_des=$row['ds'];
$popup_des=$room_details['roomdes'];
$popup_featured=$row['features'];
?>
      <h1>description</h1>
      <p class="bold-cursive"><?php echo $popup_des;?></p>
     </div>
    <div class="main-box">
      <h1>features</h1>
      <p class="bold-cursive"><?php echo $popup_featured;?></p>
     </div><?php 
$cdate=Date("D M d Y");
?>
 <?php 
}?>   
   <form method="post" name="book" action="wp_enquirynow.php">
  <div class="main-box">
      <h1>prices</h1>
      <p class="bold-cursive">
   <div id="buttion_main">
<div class="green_button"></div>
<div class="available_text">AVAILABLE</div>
<div class="yellow_button"></div>
<div class="makeanenquirry_text">MAKE AN ENQUIRY </div>
<div class="white_button"></div>
<div class="sold_text">SOLD</div>
<div class="start_date_text">START DATE</div>
<div class="start_button"><h6 style="margin-top:10px; margin-left:20px;"><?php echo $cdate;?></h6></div>
</div>
     <table  border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr height="70"> 
 <td width="270" bgcolor="#21678b">&nbsp; <font color="#FFFFFF" face="Verdana, Geneva, sans-serif" ><?php echo $propertyname['Name'];?>>></font><br /> <font color="#eaf3f7"> &nbsp;&nbsp;<?php echo $propertyname1['name'];?></font></td>
<td bgcolor="#c5c5c5" width="50"><font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" > FULL RATE</font></td>
<?php

$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
//$curntdate=Date("Y-m-d");
//$enddate=Date("Y-m-d", strtotime("+$griddays days"));
$curntdate=Date("Y-m-d");
$enddate=Date("Y-m-d", strtotime("+$griddays days"));
/*$inventoory_qry=mysql_query("SELECT Distinct str_to_date(grid_date, '%d-%m-%Y') FROM `wp_inventory_grid_details` 
WHERE str_to_date(grid_date, '%d-%m-%Y')>='$curntdate' AND str_to_date(grid_date, '%d-%m-%Y')<'$enddate'");*/
 $inventoory_qry=mysql_query("SELECT Distinct newgrid_date FROM `wp_room_inventory_grid_details` 
WHERE newgrid_date>='$curntdate' AND newgrid_date<'$enddate'");

//for($i=0; $i<=$griddays; $i++){ 
while($inventoory_grid_data=mysql_fetch_array($inventoory_qry))
{?>
 <td bgcolor="#c5c5c5" width="50">&nbsp;<font color="#446f85" face="Tahoma, Geneva, sans-serif" size="-1" >
<?php
	//$d=$inventoory_grid_data["str_to_date(grid_date, '%d-%m-%Y')"];
	//echo $ch=Date('D-d-M',strtotime($d));
$d=$inventoory_grid_data['newgrid_date'];
	echo $ch=Date('D d M',strtotime($d));
?>
</font></td>
<?php }
//}?>
</tr>
<?php
//$data="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'";
 $data="SELECT * FROM wp_rooms WHERE ppro_id='$ppro_id' AND roomid='$bfrid' and room_id='$room_id'";
//echo "SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'  and room_id='$roomid1' Limit 0,$griddays";
 $bf_qry=mysql_query("SELECT * FROM wp_room_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'  and room_id='$room_id' and newgrid_date >='$curntdate' AND newgrid_date<'$enddate'");
$rdetails=mysql_query($data);
$room_details=mysql_fetch_array($rdetails);

?>

<input type="hidden" name="pid" value="<?php echo $room_details['ppro_id'];?>">
<input type="hidden" name="rid" value="<?php echo $room_details['roomid'];?>">
<input type="hidden" name="room_id" value="<?php echo $room_details['room_id'];?>"></td>
<input name="bf_id" type="hidden"   id="phone" style="width:200px;"  value="<?php echo $bf_id;?>"/>
<input name="avr" type="hidden"   id="phone" style="width:200px;"  value="<?php echo $avr;?>"/>
<tr align="center">
<td>
<table border="1" bordercolor="#fff" cellpadding="0" cellspacing="0">
<tr>
  <td width="250" bgcolor="#1c3f52">&nbsp;
    <div id="nbmber"><div id="nbmber_text"> <font color="#FFFFFF"> <?php echo $room_details['roomname'];?> </font></div></div>
     <div>
  <div>
  </div>
  <div>
  <div></div>
    </div>
  </div>
  </td>
</tr>

</table>
</td>
<td width="83"  bgcolor="#c5c5c5">&nbsp;AUS $ <?php echo $room_details['rackrate'];?></font></td>
<?php

for($i=0; $i<=$griddays; $i++){
while($bf_data=mysql_fetch_array($bf_qry))
{
	

if($bf_data['flag']=='sold')
{?>
	 <td bgcolor="#e3e3e3">
	<font  color="#FFFFFF"><?php echo "SOLD";?></font>
    </td>
    <?php }
	else if($bf_data['newstop_sell']=='sold')
	 {?>
		 <td bgcolor="#e3e3e3"><center>
	<font  color="#FFFFFF"  size="-1"><?php echo "SOLD";?></font></center>
    </td> 
	 <?php } 
	  	
	else if($bf_data['flag']=='enquiry')
	{?>
    
   <td bgcolor="#b7be00">
	<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];?></font>
    </td>
    <?php }
	else{?>    
    
	<td bgcolor="#15a42e">
	<font  color="#FFFFFF"><?php  echo $bf_data['newroomrate'];	?></font>
	<?php 	}
    ?>  </td>
  
	<?php
}
 }?>
</tr></table>
      
    
      
      </p>
</div>   




  <div class="main-box">
      <h1>make a booking or an enquiry</h1>
      <p class="bold-cursive">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue magna, adipiscing id feugiat quis, hendrerit sit amet turpis. Fusce scelerisque mollis consectetur.</p>
      <p>&nbsp;</p>
      <p>
      <div>Proposed Stay Details:<hr /><br />
      <table width="290" border="0" align="left" cellpadding="10px" cellspacing="10px" style="margin:15px 500px 0px 20px;">
      
  <tr  style="margin:0px 0px 30px 0px">
    <td scope="row" width="50px">&nbsp;Rooms:</td>
    <td><b> <?php echo $room_details['roomname'];?></b>
<?php
$maxpersons=$room_details['maxpersons'];?></td>
 </tr>
 
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>&nbsp;<?php
$query="select * from wp_griddateselection";
	 $q1=mysql_query($query);
	  $q2=mysql_fetch_array($q1);?>
      <div>
      <input id="picker3" name="arrival"  type="text" required=" "></div>
    </td>
  </tr>
  <tr>
 
   <!-- <td scope="row">Nights:</td>
    <td>&nbsp;<select name="nights" id="night_select" required=" ">
<?php
$room_minstay=$room_details['defaultmin_stay'];
echo $room_minstay;
 $night=mysql_query("SELECT * FROM wp_nights");
while($night_data=mysql_fetch_array($night))
{
	$select1="";
	if($night_data['night']==$room_minstay)
	{
		$select1='selected';
	}
	?>
<option value="<?php echo $night_data['night'];?>" <?php echo $select1;?>><?php echo $night_data['night'];?></option>
<?php
}
?>
</select></td>-->
  </tr>
  
  <tr>
    <td scope="row">&nbsp;Departure:</td>
    <td>&nbsp;<div><input id="picker1"  name="depature" value="" type="text" required=" "></div></td>
  </tr>
  
</table>




<table width="200px" border="0" align="left" style="margin:15px 100px 0px 50px;">
  <tr>
    <td scope="row">&nbsp;Adults:</td>
    <td> <select id="adult" name="adult" >
<?php 
for($i=1;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?>
</select></td>
 
    <td scope="row">&nbsp;Children:</td>
    <td><select id="child" name="child" ><?php 
for($i=0;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?></select>
    </td>
  </tr>
  </table></div><br /><br />
 <div style="width:400px;"> Personal Details:<hr /></div>


<table width="400px" border="0"style="margin:0px 0px 0px 20px">
  
<tr>
</tr>

  <tr style="width:150px;">
  
    <td scope="row" width="60px">&nbsp;First Name:</td>
    <td width="220px">&nbsp;<input name="first" type="text"  id="first" style="width:200px;"></td>
    <td scope="row" width="60px">&nbsp;Last Name:</td>
    <td>&nbsp;<input name="last" type="text" id="last"   style="width:200px;" /></td></tr>
  
   <tr style="width:150px;">
    <td scope="row">&nbsp;Email Adress:</td>
    <td>&nbsp;<input name="email" type="text"  id="email" style="width:200px;" /></td>
  <td scope="row">&nbsp;Conform Email Adress:</td>
    <td>&nbsp;<input name="cemail" type="text"  id="email" style="width:200px;" /></td></tr>
 
 <tr style="width:150px;">
    <td scope="row">&nbsp;Phone:</td>
    <td>&nbsp;<input name="phone" type="text"   id="phone" style="width:200px;" /></td>
  <td scope="row">&nbsp;Postcode:</td>
    <td>&nbsp;<input name="postal" type="text"   id="postal" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Country:</td>
    <td>&nbsp;<input name="country" type="text"   id="country" style="width:200px;" /></td>
  <td scope="row">&nbsp;Your Age</td>
    <td>&nbsp;<input name="age" type="text"   id="age" style="width:200px;" /></td></tr>
  
  
  
 
  <tr style="width:150px;">
    <td scope="row">&nbsp;City:</td>
    <td>&nbsp;<input name="city" type="text"  id="city" style="width:200px;" /></td>
    <td scope="row">&nbsp;State:</td>
    <td>&nbsp;<input name="state" type="text"  id="state" style="width:200px;" /></td>
  </tr>
   
 </table>

Message:
<hr />
Include any questions or additional information you have for the property owner
<br /><br />
&nbsp;<textarea name="request" rows="6"   cols="20" id="request" style="width:200px;">
</textarea>
<br /><br />
Terms & Conditions
<hr />
 <div>
<input id="ctl00_plcBody_ConfirmBFGTACCheckBox"   type="checkbox" name="ctl00$plcBody$ConfirmBFGTACCheckBox"><label for="ctl00_plcBody_ConfirmBFGTACCheckBox">I have read and agree to be bounded by  </label>
<a id="ctl00_plcBody_ConfirmationViewBFGTACHyperLink" href="javascript:DisplayDetailsPanel('BFGTAC','auto')">Fairfax General Conditions of Use</a> and the <a id="ctl00_plcBody_ConfirmationViewBFGTACHyperLink" href="javascript:DisplayDetailsPanel('BFGTAC','auto')">Stayz Conditions of Use</a> and the <a id="ctl00_plcBody_ConfirmationViewBFGTACHyperLink" href="javascript:DisplayDetailsPanel('BFGTAC','auto')">Holiday Rental Code of Conduct</a>
<input id="ctl00_plcBody_ConfirmBFGTACCheckBox"   type="checkbox" name="ctl00$plcBody$ConfirmBFGTACCheckBox"><label for="ctl00_plcBody_ConfirmBFGTACCheckBox">I would like to be notifiedabout the latest holiday deals via the Stayz newsletter</label></div>

</p>
<p>&nbsp;</p>
<p><input type="image"  name="enquirynow" src="images/make-an-enuiry.png" width="160" height="60" alt="book now" /></p>
</div></form>
  </div>  </div></div></div>
    
   <div id="sidebar">
    <div class="sidebar-box">
      <h1>watch the room</h1>
    <?php $q=mysql_query("select * from wp_video_url where video_id='$vid'") or die(mysql_error());?>

		<?php while($row=mysql_fetch_array($q))
		{
	
		?>
		 <iframe width="320" height="180"  src="<?php echo $row['url'];?>" frameborder="0" allowfullscreen></iframe>
		<?php
  		}
		?>
      </div>
    <div class="sidebar-box">
      <h1>hear the room</h1>
      <p>Let us tell you about this room via the phone!</p>
      <p>&nbsp; </p>
      <h2>Call toll free: 1800 577 854*</h2>
<p class="cursive">*use  extension 21 for this room</p>
    </div>
    <div class="sidebar-box">
      <h1>find the room</h1>
     <!-- <iframe width="320" height="180" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.nl/maps?q=sea+tmeple+palm+cove&amp;ie=UTF8&amp;hl=nl&amp;hq=sea+tmeple+palm+cove&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=-16.747578,145.668746&amp;spn=0.010367,0.006295&amp;output=embed"></iframe>-->
     <iframe width="320" height="180" src="https://maps.google.nl/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=sea+temple+palm+cove&amp;sll=52.469397,5.509644&amp;sspn=2.188608,6.696167&amp;ie=UTF8&amp;hq=sea+temple&amp;hnear=Palm+Cove+Queensland,+Australi%C3%AB&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=8956497438197678828&amp;ll=-16.752748,145.67003&amp;output=embed" frameborder="0" allowfullscreen=""></iframe>      
    </div>
    <div class="sidebar-box">
      <h1>recommend the room</h1>
      <p class="cursive">"Sed eu nisi lorem. Fusce fermentum, ipsum nec hendrerit cursus, erat nulla commodo quam, at feugiat metus metus eu purus. Vivamus consequat, neque mollis <span class="cursive">adipiscing pulvinar, lorem tellus ultricies lorem, eu tincidunt neque risus at felis."</span><br />
      <span class="bold-cursive">- Mike and Tina, 17th june 2013 -</span></p>
      <p class="cursive">&nbsp;</p>
      <p class="cursive">"Sed eu nisi lorem. Fusce fermentum, ipsum nec hendrerit cursus, erat nulla commodo quam, at feugiat metus metus eu purus. Vivamus consequat, neque mollis adipiscing pulvinar, lorem tellus ultricies lorem, eu tincidunt neque risus at felis."<br />
      <span class="bold-cursive">- Mike and Tina, 17th june 2013 -</span></p>
    </div>
  </div>
</div>
<div id="footer">
  <div id="footer-columns">
    <div class="footer-column">
      <h1>footer</h1>
      <p class="bold-cursive">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue magna, adipiscing id feugiat quis, hendrerit sit amet turpis. Fusce scelerisque mollis consectetur. Duis pulvinar, neque aliquet luctus mollis, magna arcu laoreet lacus, et elementum libero leo ut quam.</p>
      <p>&nbsp;</p>
      <p>Aliquam sit amet felis a turpis tempor ornare nec sed metus. Praesent eu fringilla nisl, at luctus urna. Ut ultrices odio eu scelerisque luctus. Duis gravida velit ac odio auctor tempor. Maecenas quis felis elit. </p>
    </div>
    <div class="footer-column">
      <h1>footer</h1>
      <p class="bold-cursive">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue magna, adipiscing id feugiat quis, hendrerit sit amet turpis. Fusce scelerisque mollis consectetur. Duis pulvinar, neque aliquet luctus mollis, magna arcu laoreet lacus, et elementum libero leo ut quam.</p>
      <p>&nbsp;</p>
      <p>Aliquam sit amet felis a turpis tempor ornare nec sed metus. Praesent eu fringilla nisl, at luctus urna. Ut ultrices odio eu scelerisque luctus. Duis gravida velit ac odio auctor tempor. Maecenas quis felis elit. </p>
    </div>
    <div class="footer-column last">
      <h1>footer</h1>
      <p class="bold-cursive">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue magna, adipiscing id feugiat quis, hendrerit sit amet turpis. Fusce scelerisque mollis consectetur. Duis pulvinar, neque aliquet luctus mollis, magna arcu laoreet lacus, et elementum libero leo ut quam.</p>
      <p>&nbsp;</p>
      <p>Aliquam sit amet felis a turpis tempor ornare nec sed metus. Praesent eu fringilla nisl, at luctus urna. Ut ultrices odio eu scelerisque luctus. Duis gravida velit ac odio auctor tempor. Maecenas quis felis elit. </p>
    </div>
  </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
	<script>window.jQuery || document.write("<script src='room/js/jquery.min.js'>\x3C/script>")</script>
	<script src="room/js/responsivethumbnailgallery.js"></script>
	<script>
		$(document).ready(function() {
			
			var gallery = new $.ThumbnailGallery($('#gallery'));
			
		});
	</script>     
      
      
      
      
   


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>






<!--changes------
    <div id="booking_detiles_main_backgroung">
<div id="main">
<div id="booking_detiles_image" style="background:url(images/booooooo.png);">
<div class="booking_detiles_heading">&nbsp;&nbsp;<b>BOOKING DETAILS:</b></div>
</div>
<div id="booking_detiles_content">
<table width="290" border="0" align="left" style="margin:15px 0px 0px 20px;">
  <tr>
    <td scope="row" width="50px">&nbsp;Rooms:</td>
    <td><b> <?php echo $room_details['roomname'];?></b>
<?php
$maxpersons=$room_details['maxpersons'];?></td>
 </tr>
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>&nbsp;<?php
$query="select * from wp_griddateselection";
	 $q1=mysql_query($query);
	  $q2=mysql_fetch_array($q1);?>
      <input id="picker3" name="arrival"  type="text" required=" ">
    </td>
  </tr>
  <tr>
  ---------changes-->
   <!-- <td scope="row">Nights:</td>
    <td>&nbsp;<select name="nights" id="night_select" required=" ">
<?php
$room_minstay=$room_details['defaultmin_stay'];
echo $room_minstay;
 $night=mysql_query("SELECT * FROM wp_nights");
while($night_data=mysql_fetch_array($night))
{
	$select1="";
	if($night_data['night']==$room_minstay)
	{
		$select1='selected';
	}
	?>
<option value="<?php echo $night_data['night'];?>" <?php echo $select1;?>><?php echo $night_data['night'];?></option>
<?php
}
?>
</select></td>-->
  </tr>
  <!--  changes--------
  <tr>
    <td scope="row">&nbsp;Departure:</td>
    <td>&nbsp;<input id="picker1"  name="depature" value="" type="text" required=" "></td>
  </tr>
  
</table>


<table width="110px" border="0" align="left" style="margin:15px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Adults:</td>
    <td> <select id="adult" name="adult" >
<?php 
for($i=1;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?>
</select></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Children:</td>
    <td><select id="child" name="child" ><?php 
for($i=0;$i<=$maxpersons;$i++)
{
	?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php
}
?></select>
    </td>
  </tr>
  </table>
 <table width="370" border="0" align="left" style="margin:15px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Estimated Arrival/Departure Times</td>
    
  </tr>
  </table>
  <table width="200" border="0" align="left" style="margin:0px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>
    <select style="width:40px;">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    
    </select>
    <select style="width:40px;">
    <option>00</option>
    <option>01</option>
    <option>02</option>
    
    </select>
    <select style="width:40px;">
    <option>AM</option>
    <option>PM</option>
    
    </select>
    
    </td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>
    <select style="width:40px;">
    <option>10</option>
    <option>10</option>
    <option>10</option>
    
    </select>
    <select style="width:40px;">
    <option>00</option>
    <option>00</option>
    <option>00</option>
    
    </select>
    <select style="width:40px;">
    <option>AM</option>
    <option>PM</option>
   
    
    </select>
    
    
    
    
    
    </td>
  </tr>
  
</table>




</div>

<div id="gustdetiles_pomentdetiles_main">
<div id="gustdetiles" style="background:url(images/gustdetiles-img.png);">
<div class="gustdetiles_heading"><strong>GUEST DETAILS:</strong></div>

</div>
<div id="pomentdetiles" style="background:url(images/gustdetiles-img.png);">
<div class="pomentdetiles_heading"><strong>PAYMENT DETAILS:</strong></div>
</div>
</div>

<div id="gustdetiles_content">
<table width="400px" border="0"style="margin:0px 0px 0px 20px">
  <tr style="width:150px;">
    <td scope="row" width="60px">&nbsp;First Name:</td>
    <td width="220px">&nbsp;<input name="first" type="text"  id="first" style="width:200px;"></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row" width="60px">&nbsp;Last Name:</td>
    <td>&nbsp;<input name="last" type="text" id="last"   style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Address:</td>
    <td>&nbsp;<input name="addr" type="text"   id="addr" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;City:</td>
    <td>&nbsp;<input name="city" type="text"  id="city" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;State:</td>
    <td>&nbsp;<input name="state" type="text"  id="state" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Postcode:</td>
    <td>&nbsp;<input name="postal" type="text"   id="postal" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Country:</td>
    <td>&nbsp;<input name="country" type="text"   id="country" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Phone:</td>
    <td>&nbsp;<input name="phone" type="text"   id="phone" style="width:200px;" /></td>
  </tr>
  
  <tr style="width:150px;">
    <td scope="row">&nbsp;Email:</td>
    <td>&nbsp;<input name="email" type="text"  id="email" style="width:200px;" /></td>
  </tr>
  <tr style="width:150px;">
    <td scope="row">&nbsp;Special
Requests:</td>
    <td>&nbsp;<textarea name="request" rows="5"   cols="20" id="request" style="width:200px;">
</textarea></td>
  </tr>
  
  
  
  
  
  
  
</table>




</div>
<div id="pomentdetiles_content">








<table width="400px" border="0"style="margin:0px 0px 0px 20px">  <tr>
    <td scope="row">&nbsp;Room Total:</td>
    <td>&nbsp;$4,075.00</td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Booking Total:</td>
    <td>&nbsp;$4,075.00</td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Type:</td>
    <td>&nbsp;<select name="card" id="card"  style="width: 150px; visibility: visible;">
			<option selected="selected" value="-Select-">-Select-</option>
			<?php 
			$card=mysql_query("SELECT Mastercard,Visa,AmericanExpress FROM wp_general_settings");
			$fd=mysql_fetch_array($card);?>
			<option value="<?php echo $fd['Mastercard'];?>"><?php echo $fd['Mastercard'];?></option>
			<option value="<?php echo $fd['Visa'];?>"><?php echo $fd['Visa'];?></option>
            <option value="<?php echo $fd['AmericanExpress'];?>"><?php echo $fd['AmericanExpress'];?></option>

		</select></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Holder:</td>
    <td>&nbsp;<input name="card_holder"  type="text" id="card_holder"  style="width:200px;"></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Number:</td>
    <td>&nbsp;<input name="card_num" type="text" id="card_num" style="width:200px;" /></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Card Expiry:</td>
    <td>&nbsp;<select name="ctl00$plcBody$CardExpiryMonthDropDownList" id="ctl00_plcBody_CardExpiryMonthDropDownList"   style="width: 50px; visibility: visible;">
			<option value="MM">MM</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>

		</select>
        <select name="ctl00$plcBody$CardExpiryYearDropDownList" id="ctl00_plcBody_CardExpiryYearDropDownList" style="width: 70px; visibility: visible;">
			<option value="YYYY">YYYY</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>

		</select>
        
        </td>
  </tr>
  <tr>
    <td scope="row">&nbsp;CCV:</td>
    <td>&nbsp;<input name="ccv"  type="text" id="ccv" /></td>
  </tr>
</table>
</div>

</div>

<div class="onmouse_booknow">
<div id="ctl00_plcBody_BFGTACAgreePanel">
		
			<br>
			<div style="padding-left: 25px;">
				<input id="ctl00_plcBody_ConfirmBFGTACCheckBox"   type="checkbox" name="ctl00$plcBody$ConfirmBFGTACCheckBox"><label for="ctl00_plcBody_ConfirmBFGTACCheckBox">I have read and agree to the </label>
				<a id="ctl00_plcBody_ConfirmationViewBFGTACHyperLink" href="javascript:DisplayDetailsPanel('BFGTAC','auto')">The terms and conditions</a>.
				<span id="ctl00_plcBody_ConfirmBFGTACCustomValidator" style="color:Red;visibility:hidden;">*</span>
			</div>
			<div style="margin-left: 18px;">
			</div>
		
	</div>
    <div style="padding-left: 25px;">
			<br>
		<input type="image"  name="enquirynow" src="images/make-an-enuiry.png">
        
			<div id="bookingtext">
<font size="3" color="#FFFFFF">Please note that a 25% deposit will be processed to your card if booking outside 14 days (30 days for houses), the full amount will be processed if booking inside these time frames.</font>
</div><br>
			<br>
            changes----------->
            <!--onclick="if (!Page_ClientValidate()){ return false; } this.disabled = true; this.value = 'Processing...';WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$plcBody$MakeBookingButton&quot;, &quot;&quot;, true, &quot;BookingDetails&quot;, &quot;&quot;, false, true))" id="ctl00_plcBody_MakeBookingButton"-->
		<!-- changes-------</div></div>
</div>-->





 


</body>
</html>
