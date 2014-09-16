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
<meta hWhytettp-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/inclusion_ajax.js"></script>
<script type="text/javascript" src="js/char.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>


<!-- Bootstrap --> 
<link href="http://static.scripting.com/github/bootstrap2/css/bootstrap.css" rel="stylesheet">
<script src="http://static.scripting.com/github/bootstrap2/js/jquery.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-transition.js"></script>
<script src="http://static.scripting.com/github/bootstrap2/js/bootstrap-modal.js"></script>
        
        
</head>

<body onload="load()">
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
<form id="selfrm" name="frm" action="" method="post">
<?php
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="ddlViewBy" name="sele" onChange="pluginCall('wp_inclusions_ajax.php?id='+this.value)" class="select_1">

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

<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php"> Inventary</a></li>

<li>  <a href="propertymanager.php">Property Manager</a></li>

<li class="active">  <a href="inclusions.php" >Inclusions</a></li>

<!--<li>  <a href="#">Reporting</a></li>-->

<li> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>-->
<li> <a href="logout.php"> Logout</a></li>



</ul>

</div>

<div id="reporting_buttion">
</div>

<div id="content"> 


</div>






</div>




</div>










</div>



</body>
</html>
