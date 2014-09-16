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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){

  $("#name").blur(function(){
  var name=$("#name").val();
  alert(name);
    alert("This input field has lost its focus.");
  });
});
</script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>



<script type="text/javascript" src="js/properties.js"></script>




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

<form id="selfrm" name="frm" action="" method="post">
<?php
$uid= $_SESSION['id'];
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
    padding-right: 30px;"><a href="propertymanager.php"><img src="images/PropertyManager.png" style="vertical-align: middle;"/>PropertyManager</a></span></div><br />
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>

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
<li> <a href="roomtypes.php">Room types</a></li>
<!--<li> <a href="wp_rooms.php">Rooms</a></li>-->
<!--<li><a href="#"> Property PMS</a></li>-->



</ul>

</div>

<div id="content"> 
<div  id="new">
<a href="javascript:void(0);" onClick="newProperty('wp_addnewproperty.php')">[ADD NEW PROPERTY]</a>
</div>
<table width="743px"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:#ccc;">
<tr bgcolor="#faebc4" class="onmouse" colspan="4"> 
<td  width=400><b>Name</b></td>
<th colspan='3'>Options</th>
</tr>
<?php
//$sql=mysql_query("SELECT * FROM wp_properties where user_id='$uid'");

$sql=mysql_query("SELECT * FROM wp_properties");

while($row1 = mysql_fetch_array( $sql))
{
	if( $_SESSION['role']=='Super Admin')
	{
	
	?>
		<tr class="act">
		<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['Name'];?></font></td>
		<td><font color="#000000" face="segoe ui" size="2">
		<a href="javascript:void(0);" onclick="editProperty('wp_propertyedit.php?ppro_id=<?php echo $row1['ppro_id'] ?>')">Edit</a></font></td>
		<td><font color="#000000" face="segoe ui" size="2">
		<a href="deleteproperty.php?ppro_id=<?php echo $row1['ppro_id'] ?>">Delete</a></font></td>
		
		<td><font color="#000000" face="segoe ui" size="2"><a href="roomtypes.php?id=<?php echo $row1['ppro_id'] ?>">Room Types</a></font></td>
		<!--<td><a href=delete.php?id=" . $row['id'] ." onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a></td>";-->
		</tr>
	<?php
	}
	else
	{
	?>
		<tr class="act">
		<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['Name'];?></font></td>
		<?php
		
	      
	      ?>
	      	<td><font color="#000000" face="segoe ui" size="2">
		<a href="javascript:void(0);" onclick="editProperty('wp_propertyedit.php?ppro_id=<?php echo $row1['ppro_id'] ?>')">Edit</a></font></td>
		<td><font color="#000000" face="segoe ui" size="2">
		<a href="deleteproperty.php?ppro_id=<?php echo $row1['ppro_id'] ?>">Delete</a></font></td>
	<?php
	      
		
		?>

		<td><font color="#000000" face="segoe ui" size="2"><a href="roomtypes.php?id=<?php echo $row1['ppro_id'] ?>">Room Types</a></font></td>
		
		</tr>
	
	<?php
	  } 
	  
} 
	 ?>

</table>

</div>






</div>




</div>










</div>



</body>
</html>