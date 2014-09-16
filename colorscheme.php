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
 if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty( $_POST['sele'] )) 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
} 

$uid=$_SESSION['id'];

if(isset($_POST['color'])){ 
echo $color=$_POST['color'];
     
$m=mysql_query("UPDATE `wp_color` SET `color`='$color'where user_id='$uid'");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/properties.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript">

  </script>
  <script type="text/javascript" src="jscolor/jscolor.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("#region").blur(function(){
    alert("This input field has lost its focus.");
 });
});
</script>
		
</head>

<body>
<?php 
//echo $_SESSION['userName'];
 ?>
<div id="Propertish_page_css">

<div id="proprotish_logo">   </div>

<div id="text_img"></div>
<div id="blue_border"></div>
       <a href="#" class="login_btn"><span><?php  echo $_SESSION['role'];?></span><div class="triangle"></div></a>          
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
// Session_status();
if($_SESSION['role']=='Super Admin')
{
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
}
else
{$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
}
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">
<select id="select_1" name="sele" onChange="this.form.submit();" >

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
</form></div>



<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li><a href="inventorygrid.php">Inventory</a></li>

<li><a href="propertymanager.php">Property Manager</a></li>



<!--<li><a href="#">Reporting</a></li>-->

<li class="active"> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>
<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>

</ul>
</div>
<div id="reporting_buttion">
</div>
<div id="content">
<div  id="new1">
<body>
<div  class="form">

  <form id='register'  method='post'  name='form' action="">
   <p class="contact"><label for='country' ><h4>Change Color Scheme for Booking Grid:</h4></label></p>
   <input class="color" value="" name="color"><br><br>
  
   <input class="button" type="submit"  name="SUBMIT" value="Change"  />
   </form>
</div>




</body>
		
</div>
</div>
</div>


</div>



</body>
</html>