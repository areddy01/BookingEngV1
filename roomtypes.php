<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
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
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
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
	function editRoom(str)
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
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

function getProperty(str)
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
    else
        {
            //alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
            }
    }
    xmlhttp.open("GET",str,true);
    xmlhttp.send();

}function getProperty1(str)
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
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
	
    else
        {
           // alert("There was a problem while using XMLHTTP:\n" + xmlhttp.status);
        }
       }     
    }
    xmlhttp.open("GET","wp_properties_ajax.php?id="+str,true);
    xmlhttp.send();
    subm();
  }	
  function subm()
  {
	   document.frm.submit();
  }
function load()
{
		
var e=document.getElementById("ddlViewBy");
var strUser = e.options[e.selectedIndex].value;
getProperty("wp_properties_ajax.php?id="+strUser);

}
 
</script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
  <link href="css/main.css" rel="stylesheet" type="text/css" /></head>

<body onload="load()">
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

<form id="selfrm" name="frm" action="" method="post">
<?php
$uid=$_SESSION['id'];
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?>
<div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="ddlViewBy"  name="sele" onChange="getProperty1(this.value)" class="select_1">

<?php


while($row1 = mysql_fetch_array($result))
{
	$r1=$row1['ppro_id'];
	$select="";
if($sele==$r1)
{

   $select="selected='selected'";	
	}
?> 
   <option value="<?php echo $row1['ppro_id'];?>" <?php echo $select; ?> > <?php echo $row1['Name'];?> </option>
  
<?php
}
 ?>
</select>


</div></div>
</form></div>
<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php"> Inventory</a></li>

<li class="active">  <a href="propertymanager.php">Property Manager</a></li>

<!--<li>  <a href="inclusions.php">Inclusions</a></li>

<li>  <a href="#">Reporting</a></li>-->

<li> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>
<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>
<li> <a href="logout.php"> Logout</a></li>-->



</ul>

</div>

<div id="reporting_buttion">
<ul>
<li class="active"> <a href="roomtypes.php">Room types</a></li>
<!--<li> <a href="wp_rooms.php">Rooms</a></li>-->




</ul>

</div>

<div id="content">

</div></div></div>
<div style="width:auto; height:150px; float:left;">  
<?php
//include(footer.php); 
?></div>

</body>
</html>