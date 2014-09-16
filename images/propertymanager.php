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
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="js/properties.js"></script>


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
<form id="selfrm" name="frm" action="" method="post">
<?php
 
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
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
</form>
</div>
<div id="main_content">
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php"> Inventary</a></li>

<li class="active">  <a href="propertymanager.php">Property Manager</a></li>

<!--<li>  <a href="inclusions.php">Inclusions</a></li>

<li>  <a href="#">Reporting</a></li>-->

<li> <a href="settings.php"> Setting</a></li>
<!--<li> <a href="messages.php"> Messages</a></li>
<li> <a href="logout.php"> Logout</a></li>-->



</ul>

</div>

<div id="reporting_buttion">
<ul>
<li> <a href="roomtypes.php">Room types</a></li>
<!--<li> <a href="wp_rooms.php">Rooms</a></li>-->
<!--<li><a href="#"> Property PMS</a></li>-->



</ul>

</div>

<div id="content"> 
<div  id="new">
<a href="javascript:void(0);" onClick="newProperty('wp_addnewproperty.php')">[ADD NEW PROPERTY]</a>
</div>
<table  border='1' bgcolor='#F7F7F7'  text-align='left' >
<tr> 
<th  width=400>Name</th>
<th colspan='2'>Options</th>
</tr>
<?php
$sql=mysql_query("SELECT * FROM wp_properties");

while($row1 = mysql_fetch_array( $sql))
{
?>
<tr class="act">
<td><b><font color="#663300"><?php echo $row1['Name'];?></font></b></td>
<td><b><font color="#663300">
<a href="javascript:void(0);" onclick="editProperty('wp_propertyedit.php?ppro_id=<?php echo $row1['ppro_id'] ?>')">Edit</a></font></b></td>
<td><b><font color="#663300">
<a href="deleteproperty.php?ppro_id=<?php echo $row1['ppro_id'] ?>">Delete</a></font></b></td>

<td><b><font color="#663300"><a href="roomtypes.php">Room Types</a></font></b></td>
<!--<td><a href=delete.php?id=" . $row['id'] ." onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a></td>";-->
</tr>
<?php } ?>

</table>

</div>






</div>




</div>










</div>



</body>
</html>
