<?php 
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 $bf_id=$_REQUEST['bf_id'];
 $bfrid=$_REQUEST['bfrid'];
 $ppro_id=$_REQUEST['ppro_id'];
 $arr=$_REQUEST['arr'];
	 $avr=$_REQUEST['avr'];

$timezone1 = date_default_timezone_get();
$m= date("m");
$de= date("d");
$y= date("Y");
$date = date('Y-m-d');
$property=mysql_query("SELECT Name FROM wp_properties WHERE ppro_id='$ppro_id'");
$propertyname=mysql_fetch_array($property);?>
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
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style_img.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
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
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>
  <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"d-M-yy"
    });
});
  </script>
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
<div id="Propertish_page_css">
<div id="header_propertish">
<div id="proprotish_logo">   </div></div></div>
<div style="height:100px; width:1024px	; background:#FFF; float:left;">
<h2><b><?php echo $propertyname['Name'];?></b></h2><br/>
<h3><b><?php echo $r['name'];?></b></h3>
   <div style="background-color:#C96"><h2>Images</h2></div>
</div>

<div>
  <?php $q1="select img_id,video_id from  wp_imginfo  where  ppro_id='$ppro_id' and roomid='$rum_id'";
 
  $r1=mysql_query($q1);?>
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
 
<!-- <div class="imageRow"  >
  	<div class="set"  style="margin:0px 0px 0px 0px;">
    
  	  <div class="single first"" style="margin:0px 0px 0px 0px;">-->
      
     
      <?php
 
while($res1=mysql_fetch_array($r2))
  {
	  $img_id=$res1['img_id'];
				 $title=$res1['img_name'];
				?>   <!-- <table align="left">      
  <tr><td><a href="<?php echo $res1['actual_img'];?>" rel="lightbox[plants]" title="Click on the right side of the image to move forward."><img src="<?php echo $res1['thumb_img'];?>"alt="Plants: image 1 0f 4 thumb"/></a></td></tr>
 
 </table>-->
 <li><a href="#"><img src="<?php echo $res1['thumb_img'];?>" data-large="<?php echo $res1['actual_img'];?>" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>
 	
 <?php
}

 } 
  ?><!--</div></div></div>-->	
  
			</ul>
							</div>				
						</div>
					</div>
				</div>
			</div>
		</div>
  <div style="float:left; width:1024px;">
  <h3 id="myModalLabel" style="background-color:#C96"> video:</h3><hr><br />
  <?php $q=mysql_query("select * from wp_video_url where video_id=$vid");?>

<?php while($row=mysql_fetch_array($q))
{
	
?>
<iframe  width="320" height="200" allowtransparency="" src="<?php echo $row['url'];?>" allowfullscreen >
</iframe>

<?php
  }
?></div></div>
 <br />
 
  
 
 
<?php while($row=mysql_fetch_array($property))
{
$popup_des=$row['ds'];
$popup_featured=$row['features'];
?>
<div style="float:left; width:1024px;">
  <div class="modal-header">
    
    <h3 id="myModalLabel" style="background-color:#C96"><?php echo $rdata;?></h3>
  </div>
  <div class="modal-body">
 	<h3 id="myModalLabel" style="background-color:#C96"> Description:</h3><hr><br />
    <p><?php echo $popup_des;?></p><br />
    <h3 id="myModalLabel" style="background-color:#C96">Features:</h3><hr> <br />
    <p><?php echo $popup_featured;?></p><br />
   
    
  </div>
  
  <div class="modal-footer">
   <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>-->
  </div>
</div>
<?php 
}?>

<?php

$grid=mysql_query("SELECT * FROM wp_general_settings"); 
$gridsettings=mysql_fetch_array($grid);
$griddays=$gridsettings['Griddaystoshow'];
$curntdate=Date("Y-M-d");
$enddate=Date("Y-M-d", strtotime("+$griddays days"));
$inventoory_qry=mysql_query("SELECT DISTINCT grid_date FROM wp_inventory_grid_details where grid_date >= '$curntdate' and grid_date < '$enddate'");



$data="SELECT * FROM wp_room_type_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid'";
$bf_qry=mysql_query("SELECT * FROM wp_inventory_grid_details WHERE ppro_id='$ppro_id' AND roomid='$bfrid' Limit 0,$griddays");
$rdetails=mysql_query($data);
$room_details=mysql_fetch_array($rdetails);
?>

<input type="hidden" name="pid" value="<?php echo $room_details['ppro_id'];?>">
<input type="hidden" name="rid" value="<?php echo $room_details['roomid'];?>"></td>



<div id="booking_detiles_main_backgroung">
<div id="main">
<div id="booking_detiles_image" style="background:url(images/booooooo.png);">
<div class="booking_detiles_heading">&nbsp;&nbsp;<b>BOOKING DETAILS:</b></div>
</div>
<div id="booking_detiles_content">
<table width="290" border="0" align="left" style="margin:15px 0px 0px 20px;">
  <tr>
    <td scope="row" width="50px">&nbsp;Rooms:</td>
    <td><b> <?php echo $room_details['name'];?></b>
<?php
$maxpersons=$room_details['maxpersons'];?></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Arrival:</td>
    <td>&nbsp;<?php
$query="select * from wp_griddateselection";
	 $q1=mysql_query($query);
	  $q2=mysql_fetch_array($q1);?>
      <input id="datepicker1" name="arrival"  type="text" required=" ">
    </td>
  </tr>
  <tr>
    <td scope="row">Nights:</td>
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
</select></td>
  </tr>
  <tr>
    <td scope="row">&nbsp;Departure:</td>
    <td>&nbsp;<input id="datepicker2"  name="depature" value="" type="text" required=" "></td>
  </tr>
  
</table>


<table width="110px" border="0" align="left" style="margin:15px 0px 0px 250px;">
  <tr>
    <td scope="row">&nbsp;Adults:</td>
    <td> <select id="adult" name="adult" required=" ">
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





</div>

<div class="onmouse_booknow">
<div id="ctl00_plcBody_BFGTACAgreePanel">
		
			<br>
			
			<div style="margin-left: 18px;">
			</div>
		
	</div>
    <div style="padding-left: 25px;">
			<br>
            <?php echo  $bfrid;?>
            <input type="image" onClick="location.href='DetailsPanel1.php?bf_id=<?php echo $bf_id;?>&bfrid=<?php echo  $bfrid;?>&ppro_id=<?php echo $ppro_id;?>&arr=<?php echo $date;?>&avr=<?php echo $roomcount;?>'"src="images/booknow-onmouse.png" >
		<!--<input type="image"  name="booknow" src="images/booknow-onmouse.png">-->
			
            <!--onclick="if (!Page_ClientValidate()){ return false; } this.disabled = true; this.value = 'Processing...';WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$plcBody$MakeBookingButton&quot;, &quot;&quot;, true, &quot;BookingDetails&quot;, &quot;&quot;, false, true))" id="ctl00_plcBody_MakeBookingButton"-->
		</div></div>

</div>
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
 
 </table>
 <?php
}}?>
 

</div></div></div>


<script>
$("#night_select").bind('change', function(event){
	var days = $(this).val() * 1;
   var endDate = new Date($('#datepicker1').val());
   endDate.setDate(endDate.getDate() + days);
   
   var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
     $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	  
	});
</script>
<script>
$("#child").bind('change', function(event){
	 child = $(this).val();
	//alert(child);
	    adult = $('#adult').val();
	   //alert(adult);

	  maxavilabilty=parseFloat(child) + parseFloat(adult);
	   maxchild=parseFloat(maxavilabilty);
	   alert(maxchild);
	});
	</script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
<script>
parent.iframeLoaded();
</script>
</body>
</html>