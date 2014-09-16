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
<title>Wotusee</title>

<link href="css/login.css" rel="stylesheet" type="text/css" />
 <link href="css/main.css" rel="stylesheet" type="text/css" />
 <link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript">
function newterms(str)
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
    document.getElementById("terms").innerHTML=xmlhttp.responseText;
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

</script>

</head>

<body>
<?php $uid= $_SESSION['id'];
//echo $_SESSION['userName'];
 ?>
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
 
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="select_1" name="sele" onChange="this.form.submit();" >
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
   <option value="<?php echo $row['ppro_id'];?>"<?php echo $select; ?> > <?php echo $row['Name'];;?> </option>
  
<?php } ?>
</select>
</div></div>
</form>
</div>



<div id="main_content">

<div style=" width:500px; height:40px;  border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin:10px 20px 0px 200px;">
You are here:&nbsp;&nbsp;<span style="
    font-size: 3;
    padding-left: 30px;
    padding-right: 30px;"><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" style="vertical-align: middle;" />&nbsp;&nbsp;
    <span style="
    font-size: 3;
    padding-left: 30px;
    padding-right: 30px;"><a href="user.php"><img src="images/PropertyManager.png" style="vertical-align: middle;"/>User Accounts</a></span></div><br />
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>


<li class="active"><a href="propertysettings.php">Properties</a></li>
<li> <a href="settings.php"> Forms</a></li>
<li> <a href="user.php">Profile</a></li>




</ul>

</div>

<div id="reporting_buttion">
<ul>

<!--<li> <a href="wp_rooms.php">Rooms</a></li>-->
<!--<li><a href="#"> Property PMS</a></li>-->



</ul>

</div>

<div id="content1"> 
<div  id="terms">



<table width="400px"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:#ccc;">
<tr > 
<td class="onmouse" ><a href="javascript:void(0);" onClick="newterms('wp_terms.php?ppro_id=<?php echo $sele;?>')"><img src="images/term.png" /></a></td>

<td class="onmouse"  ><a href="javascript:void(0);" onClick="newterms('wp_confemail.php?ppro_id=<?php echo $sele;?>')"><img src="images/cm.png" /></a></td>
</tr></table>
</div>


</div>




</div>










</div>



</body>
</html>