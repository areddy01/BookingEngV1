<?php 
ob_start();
@session_start();
require_once('functions.php');
require_once('connection.php');
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
$user=new User();

	
$sele=$_SESSION['sele'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['sele']!='') 
{
	$sele=$_POST['sele'];
	$_SESSION['sele']=$sele;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wotusee</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
 
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
var ray={
ajax:function(st)
	{
		
		this.show('load');
		
	},
show:function(el)
	{
		this.getID(el).style.display='';
		
	},
getID:function(el)
	{
		
		return document.getElementById(el);
	}
}
</script>
<style type="text/css">
#load{
	
	position:absolute;
    z-index:1;
   width:400px;
   height:80px;
margin-top:-0px;
margin-left:-20px;
margin-right:-350px;
top:50%;
left:50%;

}
</style>
 
 
 
 
   
   
   <link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
		<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
		<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
        <style>
.lightbox {
	position: absolute;
	border:4px solid #39F;
	top: 0;
	height:auto;
	left: 50%;
	width: 500px;
	margin-left: -250px;
	background: #fff;
	z-index: 1001;
	/*display: none;*/
	visibile:false;
	
}
.lightbox-shadow {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 1500px;
	background: #000;
	filter: alpha(opacity=75);
	-moz-opacity: 0.75;
	-khtml-opacity: 0.75;
	opacity: 0.75;
	z-index: 1000;
	display: none;
}
.light{
	position: absolute;
	border:4px solid #39F;
	top: 0;
	height:auto;
	left: 50%;
	width: 500px;
	margin-left: -250px;
	background: #fff;
	z-index: 1001;
	display: none;
}
.light-shadow {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 1500px;
	background: #000;
	filter: alpha(opacity=75);
	-moz-opacity: 0.75;
	-khtml-opacity: 0.75;
	opacity: 0.75;
	z-index: 1000;
	display: none;
}
</style>

	<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.6.2.min.js"></script>
    
    <script type="text/javascript"> 
	  function doSS(img,id) {
		 
    var cell = $("#" + img.parentNode.parentNode.id);
    var hiddenFld = $("[id$=\"_s\"]", img.parentNode);
    parent.changed = true;
	
    if (img.src.indexOf("images/ok.png") > -1) {
         
		img.src = "images/alert.jpg";
        //cell.css("background-color", "salmon");
        cell.addClass("stopped");
        hiddenFld.val("X");
		document.getElementById(id).value="sold";
		
    }
    else {
        img.src = "images/ok.png";
        cell.css("background-color", "");
        //cell.removeClass("stopped");
		document.getElementById(id).value="";
		cell.removeClass("stopped");
        hiddenFld.val(" ");
    }
	
	
}

 </script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
      <script type="text/jscript">

/****************************************
	Barebones Lightbox Template
	by Kyle Schaeffer
	http://www.kyleschaeffer.com
	* requires jQuery
****************************************/

// display the lightbox
function lightbox(insertContent, roomId , propId){

	//alert(roomId +","+propId);
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
	
		// add lightbox/shadow <div/>'s if not previously added
		if($('.lightbox').size() == 0){
			var theLightbox = $('<div class="lightbox"/>');
			var theShadow = $('<div class="lightbox-shadow"/>');
			$(theShadow).click(function(e){
				closeLightbox();
			});
			$('body').append(theShadow);
			$('body').append(theLightbox);
		}
		
		// remove any previously added content
		$('.lightbox').empty();
		
		// insert HTML content
		if(insertContent != null){
			$('.lightbox').append(insertContent);
		}
		
		// insert AJAX content
		if(roomId != null && propId !=null){
			//var rid=$(".room").val();
			//var ppd=$(".ppd").val();
			
			///alert(ppd);
			/*var values = [];
$('input[name="roomid1[]"]').each(function() {
   values.push($(this).val());
});*/
			//var v=$('input[type="text"][name="roomid1[]"]');
			//alert(values);// temporarily add a "Loading..." message in the lightbox
			$('.lightbox').append('<p class="loading">Loading...</p>');
			
			// request AJAX content
			$.ajax({
				type: 'GET',
				url: 'popup.php',
				data: {ppd:propId, rid:roomId},
				success:function(data){
					// remove "Loading..." message and append AJAX content
					$('.lightbox').empty();
					$('.lightbox').append(data);
				},
				error:function(){
					alert('AJAX Failure!');
				}
			});
			
		}
		
		// move the lightbox to the current window top + 100px
		$('.lightbox').css('top', $(window).scrollTop() + 100 + 'px');
		
		// display the lightbox
		$('.lightbox').show();
		$('.lightbox-shadow').show();
	
	})(jQuery); // end jQuery wrapper
	
}

// close the lightbox
function closeLightbox(){
	
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
		
		// hide lightbox/shadow <div/>'s
		$('.lightbox').hide();
		$('.lightbox-shadow').hide();
		
		// remove contents of lightbox in case a video or other content is actively playing
		$('.lightbox').empty();
	
	})(jQuery); // end jQuery wrapper
	
}
</script>
     <script type="text/jscript">

/****************************************
	Barebones Lightbox Template
	by Kyle Schaeffer
	http://www.kyleschaeffer.com
	* requires jQuery
****************************************/

// display the lightbox
function roomlightbox(insertContent, roomId , propId,room_id){

	//alert(roomId +","+propId);
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
	
		// add lightbox/shadow <div/>'s if not previously added
		if($('.lightbox').size() == 0){
			var theLightbox = $('<div class="lightbox"/>');
			var theShadow = $('<div class="lightbox-shadow"/>');
			$(theShadow).click(function(e){
				closeLightbox();
			});
			$('body').append(theShadow);
			$('body').append(theLightbox);
		}
		
		// remove any previously added content
		$('.lightbox').empty();
		
		// insert HTML content
		if(insertContent != null){
			$('.lightbox').append(insertContent);
		}
		
		// insert AJAX content
		if(roomId != null && propId !=null){
			//var rid=$(".room").val();
			//var ppd=$(".ppd").val();
			
			///alert(ppd);
			/*var values = [];
$('input[name="roomid1[]"]').each(function() {
   values.push($(this).val());
});*/
			//var v=$('input[type="text"][name="roomid1[]"]');
			//alert(values);// temporarily add a "Loading..." message in the lightbox
			$('.lightbox').append('<p class="loading">Loading...</p>');
			
			// request AJAX content
			$.ajax({
				type: 'GET',
				url: 'roompopup.php',
				data: {ppd:propId, rid:roomId, room_id:room_id},
				success:function(data){
					// remove "Loading..." message and append AJAX content
					$('.lightbox').empty();
					$('.lightbox').append(data);
				},
				error:function(){
					alert('AJAX Failure!');
				}
			});
			
		}
		
		// move the lightbox to the current window top + 100px
		$('.lightbox').css('top', $(window).scrollTop() + 100 + 'px');
		
		// display the lightbox
		$('.lightbox').show();
		$('.lightbox-shadow').show();
	
	})(jQuery); // end jQuery wrapper
	
}

// close the lightbox
function closeLightbox(){
	
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
		
		// hide lightbox/shadow <div/>'s
		$('.lightbox').hide();
		$('.lightbox-shadow').hide();
		
		// remove contents of lightbox in case a video or other content is actively playing
		$('.lightbox').empty();
	
	})(jQuery); // end jQuery wrapper
	
}
</script>
  <script type="text/javascript">
/*function changeColor(elem)
{

elem.style.backgroundColor = "red";
//cell.style.color = black;
}*/
</script>
<script type="text/javascript" src="jquery-1.9.0.js" ></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
         <style>
 .underline {
    text-decoration:line-through;
}
 </style>
 <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker3" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"d-M-yy",
		gotoCurrent: true}).datepicker('setDate',"0");
    
});
  </script>
 
    <script type="text/jscript">

/****************************************
	Barebones Lightbox Template
	by Kyle Schaeffer
	http://www.kyleschaeffer.com
	* requires jQuery
****************************************/

// display the lightbox
function light(insertContent, roomId , propId , newdate){
var date=new Date();
//alert(newdate);
	//alert(roomId +","+propId);
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
	
		// add lightbox/shadow <div/>'s if not previously added
		if($('.light').size() == 0){
			var theLightbox = $('<div class="light"/>');
			var theShadow = $('<div class="light-shadow"/>');
			$(theShadow).click(function(e){
				closeLightbox();
			});
			$('body').append(theShadow);
			$('body').append(theLightbox);
		}
		
		// remove any previously added content
		$('.light').empty();
		
		// insert HTML content
		if(insertContent != null){
			$('.light').append(insertContent);
		}
		
		// insert AJAX content
		if(roomId != null && propId !=null && newdate !=null){
			//var rid=$(".room").val();
			//var ppd=$(".ppd").val();
			
			///alert(ppd);
			/*var values = [];
$('input[name="roomid1[]"]').each(function() {
   values.push($(this).val());
});*/   
			//var v=$('input[type="text"][name="roomid1[]"]');
			//alert(values);// temporarily add a "Loading..." message in the lightbox
			$('.light').append('<p class="loading">Loading...</p>');
			
			// request AJAX content
			$.ajax({
				type: 'GET',
				url: 'controlpanel.php',
				data: {ppd:propId, rid:roomId, newdate:newdate},
				success:function(data){
					// remove "Loading..." message and append AJAX content
					$('.light').empty();
					$('.light').append(data);
				},
				error:function(){
					alert('AJAX Failure!');
				}
			});
			
		}
		
		// move the lightbox to the current window top + 100px
		$('.light').css('top', $(window).scrollTop() + 100 + 'px');
		
		// display the lightbox
		$('.light').show();
		$('.light-shadow').show();
	
	})(jQuery); // end jQuery wrapper
	
}

// close the lightbox
function closeLightbox(){
	
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
		
		// hide lightbox/shadow <div/>'s
		$('.light').hide();
		$('.light-shadow').hide();
		
		// remove contents of lightbox in case a video or other content is actively playing
		$('.light').empty();
	
	})(jQuery); // end jQuery wrapper
	
}
</script>
 
 
  <script type="text/jscript">

/****************************************
	Barebones Lightbox Template
	by Kyle Schaeffer
	http://www.kyleschaeffer.com
	* requires jQuery
****************************************/

// display the lightbox
function roomlight(insertContent, roomId , propId , newdate,room_id){
var date=new Date();
//alert(newdate);
	//alert(roomId +","+propId);
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
	
		// add lightbox/shadow <div/>'s if not previously added
		if($('.light').size() == 0){
			var theLightbox = $('<div class="light"/>');
			var theShadow = $('<div class="light-shadow"/>');
			$(theShadow).click(function(e){
				closeLightbox();
			});
			$('body').append(theShadow);
			$('body').append(theLightbox);
		}
		
		// remove any previously added content
		$('.light').empty();
		
		// insert HTML content
		if(insertContent != null){
			$('.light').append(insertContent);
		}
		
		// insert AJAX content
		if(roomId != null && propId !=null && newdate !=null && room_id !=null){
			//var rid=$(".room").val();
			//var ppd=$(".ppd").val();
			
			///alert(ppd);
			/*var values = [];
$('input[name="roomid1[]"]').each(function() {
   values.push($(this).val());
});*/   
			//var v=$('input[type="text"][name="roomid1[]"]');
			//alert(values);// temporarily add a "Loading..." message in the lightbox
			$('.light').append('<p class="loading">Loading...</p>');
			
			// request AJAX content
			$.ajax({
				type: 'GET',
				url: 'roomcontrolpanel.php',
				data: {ppd:propId, rid:roomId, newdate:newdate, room_id:room_id},
				success:function(data){
					// remove "Loading..." message and append AJAX content
					$('.light').empty();
					$('.light').append(data);
				},
				error:function(){
					alert('AJAX Failure!');
				}
			});
			
		}
		
		// move the lightbox to the current window top + 100px
		$('.light').css('top', $(window).scrollTop() + 100 + 'px');
		
		// display the lightbox
		$('.light').show();
		$('.light-shadow').show();
	
	})(jQuery); // end jQuery wrapper
	
}

// close the lightbox
function closeLightbox(){
	
	// jQuery wrapper (optional, for compatibility only)
	(function($) {
		
		// hide lightbox/shadow <div/>'s
		$('.light').hide();
		$('.light-shadow').hide();
		
		// remove contents of lightbox in case a video or other content is actively playing
		$('.light').empty();
	
	})(jQuery); // end jQuery wrapper
	
}
</script>
 
 
 
 
     
 

<script type="text/javascript">
function getRooms(str)
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
    document.getElementById("room").innerHTML=xmlhttp.responseText;
    }
    else
        {
           // alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
            }
    }
    xmlhttp.open("GET",str,true);
    xmlhttp.send();

}
function newRoom(str)
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
    document.getElementById("room").innerHTML=xmlhttp.responseText;
    }
	 }
    else
        {
            //alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
       
            }
    }
    xmlhttp.open("GET",str,true);
    xmlhttp.send();
}	
</script>
<script type="text/javascript">
function load()
{
		
var e=document.getElementById("ddlViewBy");
var strUser = e.options[e.selectedIndex].value;
getRooms("inventoryrooms_dump.php?id="+strUser);

}
function propertychange()
{	
var e1=document.getElementById("ddlViewBy");
var strUser1 = e1.options[e1.selectedIndex].value;
getRooms('inventoryrooms_dump.php?id='+strUser1);
document.frm.submit();
}
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link href="css/main.css" rel="stylesheet" type="text/css" />
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!--<script type="text/javascript" src="js/savepopup.js"></script>-->

  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm/dd/yy",
		gotoCurrent: true}).datepicker('setDate',"0");
    
});
  </script>
   <script>
  var dateToday = new Date();

$(function() {
    $( "#datepicker2" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"mm/dd/yy"
	});
    
	
});
  </script>
  
   <script>


  var dateToday = new Date();

$(function() {
    $( "#dpicker1" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"d-M-yy",
		gotoCurrent: true}).datepicker('setDate',"0");
    
});
  </script>
     <script>
  var dateToday = new Date();

$(function() {
    $( "#dpicker2" ).datepicker({
        showButtonPanel: true,
        minDate: dateToday,
		dateFormat:"d-M-yy"
    });
});
  </script>
</head>

<body onload=load()>
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


<form id="selfrm" name="frm" action="" method="post">
<?php
$uid=$_SESSION['id'];
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="ddlViewBy" name="sele" onChange="propertychange()" class="select_1">
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
   <option value="<?php echo $row['ppro_id'];?>" <?php echo $select; ?> ><?php echo $row['Name'];?> </option>
  
<?php } ?>
</select>



</div></div></form></div>


<br />
<div style="width:450px; height:50px; margin:0px 0px 0px 300px; float:left;">

<div style=" width:400px; height:40px; border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin-bottom: 10px;">
You are here:&nbsp;&nbsp;<span style="font-size: 3;margin-top:10px; height:50px;
    padding-left: 20px;padding-left: 30px;
    padding-right: 20px;"><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" />&nbsp;&nbsp;
    <span style="
    font-size: 3;margin-top:10px; height:50px;
    padding-left: 20px;padding-left: 30px;
    padding-right: 20px;"><a href="inventorygrid.php"><img src="images/Calendar.png" />Inventory</a></span></div>

</div>




<div id="currenty_managing">
<div id="main_content">

<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li  class="active"><a href="inventorygrid.php"> Inventary</a></li>

<?php
if($_SESSION['role']=='Super Admin'){ ?>

<li><a href="propertymanager.php">Property Manager</a></li>



<li> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>

<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<?php } else{?>
<li><a href="propertysettings.php">Properties</a></li>
<li> <a href="settings.php"> Forms</a></li>
<li> <a href="user.php">Profile</a></li>
<?php } ?>
</ul>
</div>

<div id="content">
<?php
$query="select * from wp_griddateselection where user_id='$uid'";
	 $q1=mysql_query($query);
	  $q2=mysql_fetch_array($q1);
	 
	  
	 ?>
   	 <form name="update" method="post" action="filter_insert.php" onsubmit="return ray.ajax()">
     
 <div id="webkit_borders_55">
    
      
<!--<div id="content" style="background-color:#fff;width:730px;height:200; background:#0CF;">
<div id="gride_options_hh">
<!--<div id="heading" style=" width:730px; height:58px;background:url(images/header.png)  no-repeat; margin:0px 0px 0px 0px; float:left; " >
</b></font>>
</div></div>
 <br><br></div>-->
  <div id="back_color"><div id="gride_opttions"> GRID OPTIONS</div></div>
<div>
&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>From:</strong><input id="datepicker1" name="from" value="<?php  echo $q2['fromdate'];?>" type="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>To:</strong><input id="datepicker2"  name="to" value="<?php echo $q2['todate'];?>" type="text"></div>
<br><br>
<div><div id="invetry_GridOptions_checkbox">
  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Show:</strong><input type="checkbox" name="check1"  value="Availability" style="margin: 0px 0px 0px 3px"
  <?php
                  $e1=explode(',',$q2['availability']);
                  $e2=$e1[0];
                  if($e2==Availability)
                  {
                     echo "checked='checked'";
                  }
                  ?>/>
 <strong>Availability:</strong><input type="checkbox" name="check2"  value="rates" style="margin: 0px 0px 0px 3px"
<?php
                  $e1=explode(',',$q2['rates']);
                  $e2=$e1[0];
                  if($e2==rates)
                  {
                     echo "checked='checked'";
                  }
                  ?>/> 
<strong>Rates:</strong><input type="hidden" name="check3"  value="minstay" style="margin: 0px 0px 0px 3px" 
<?php
                 // $e1=explode(',',$q2['min_stay']);
                  //$e2=$e1[0];
                 // if($e2==minstay)
                  //{
                    // echo "checked='checked'";
                  //}
                  ?>
                  />
<strong></strong><input type="checkbox" name="check4"  value="stopsell" style="margin: 0px 0px 0px 3px" 
<?php
                  $e1=explode(',',$q2['stop_sell']);
                  $e2=$e1[0];
                  if($e2==stopsell)
                  {
                     echo "checked='checked'";
                  }
                  ?>/>
 <strong>Stop Sell:</strong>
&nbsp;

<strong>Range:</strong>

<select id="weeks-select" name="myselect">
<?php
$rangeselect=mysql_query("SELECT * FROM wp_range");
echo $rangeselect;
while($rangdata=mysql_fetch_array($rangeselect))
{
	$select="";
	if($rangdata['range_value']==$q2['date_range'])
	{
		$select='selected';
	}
	
 ?>
 <option value="<?php echo $rangdata['range_value'];?>" <?php echo $select; ?>><?php echo $rangdata['range_name'];?> </option>
<?php } ?>
</select>
<input type="hidden" name="user" value="<?php echo $uid;?>">
<input type="hidden" value="<?php echo $q2['id']?>" name="hide">
&nbsp;&nbsp;
<input type="submit"  name="update" value="Update Selection" style="background:#035e79; width:110px; height:33px; color:#FFF; -webkit-border-radius:12px;
	moz border radius:12px;
	border-radius:0px;
	-0-border-radius:12px;
	color:#fff;
    margin:5px 0px 0px 600px;"> </div>
    <div id="back_red"></div>
<br>
<div   style="background:#06F"></div></div> 
<div id="load" style="display:none; "><img src="images/ajax-loader3.gif" alt="please wait"/></div>

</form>
<div id="heading" align="left" style=" width:730px; height:32px; margin:0px 0px 0px 10px;"><font color="#000000"></div>
</div>
<script>
$("#weeks-select").bind('change', function(event){
	var v=$("#weeks-select").val;
	
	
	if($(this).val()=='1month')
	{
		
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 1);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
  //  $('#datepicker2').val( endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	  $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );  
	}
	else if($(this).val()=='2month')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 2);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
   //  $('#datepicker2').val( endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	   $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() ); 
	}
	else if($(this).val()=='3month')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 3);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
   //  $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	   $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() ); 
	}
	else if($(this).val()=='4month')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 4);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
    // $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	    $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );
	}
	else if($(this).val()=='6month')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 6);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
    // $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	    $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );
	}
	else if($(this).val()=='9month')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setMonth(endDate.getMonth() + 9);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
    // $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	    $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );
	}
	else if($(this).val()=='1year')
	{
		var endDate = new Date($('#datepicker1').val());
		
   endDate.setFullYear(endDate.getFullYear() + 1);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
  //   $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	  $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );  
	}
	else if($(this).val()=='2years')
	{
	var endDate = new Date($('#datepicker1').val());
	
   endDate.setFullYear(endDate.getFullYear() + 2);
   
    var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  var monName = monthname[endDate.getMonth()];
   
    // $('#datepicker2').val(  endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear() );
	    $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );	
	}
	else	
	{
   var days = $(this).val() * 7;
   var d=$('#datepicker1').val();
 // alert(d);
   var endDate = new Date($('#datepicker1').val());
  endDate.setDate(endDate.getDate()+days);
  
   //alert(endDate);
   //var monthname=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
 //var monName = monthname[endDate.getMonth()];
   //alert(days);
     $('#datepicker2').val(  endDate.getMonth() + 1 + '/' +  endDate.getDate()+ '/' + endDate.getFullYear() );
	  //$('#datepicker2').val( endDate.getFullYear()+ '-' + endDate.getMonth()+ '-' + endDate.getDate() );
	 // var end=endDate.getDate()+ '-' +  monName+ '-' + endDate.getFullYear();
	   //alert(end);
	}});
</script>

 
</div>

 <div id="inventery_state_content">
<div id="nventery_agovev3_background_2" style="background:url(images/header.png)  no-repeat; width:730px; height:58px; margin:0px 0px 0px 200px; float:left;   webkit-border-radius:20px;
	moz border radius:20px;
	border-radius:20px;
	-0-border-radius:20px;
	border:#CCC double 1px; width:730px; height:auto; margin:0px 0px 0px 10px;">
<div id="inventery_agovev3_heading"style="margin:0px 0px 0px 50px; width:650px;">  <div id="master_heading">
MASTER GRID (changes to the master grid will be pushed to ALL other channels)</div>
<div id="inventer_scrool">
</div>
</div>
<div id="room">

</div>


<!--<iframe scrolling="yes" width="510px" height="360px" src=""></iframe>-->

<div id="main_savchanges_buttion">
<div id="savechanges_button"></div>
<div id="cancel_button"></div>


</div>
<div id="inventer_agovev3_background_33"></div>

</div>
</div>

</div>


</div>

</body>
</html>