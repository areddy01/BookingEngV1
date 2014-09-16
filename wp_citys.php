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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wotusee</title>
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
<?php $uid=$_SESSION['id'];
//echo $_SESSION['userName'];
 ?>
<div id="Propertish_page_css">

<div id="proprotish_logo">   </div>

<div id="text_img"></div>
<div id="blue_border"></div>
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
</form></div>



<div id="main_content">
<div id="navigation">
<ul>
<li >  <a href="dashboard.php">Dashboard</a></li>
<li><a href="inventorygrid.php">Inventory</a></li>

<?php
if($_SESSION['role']=='Super Admin'){ ?>

<li><a href="propertymanager.php">Property Manager</a></li>



<li> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">User Accounts</a></li>

<li><a href="regions.php">Regions</a></li>
<li><a href="wp_citys.php">Citys</a></li>
<?php } else{?>
<li> <a href="settings.php"> Setting</a></li>
<li> <a href="user.php">Profile</a></li>
<?php } ?>

</ul>
</div>
<div id="reporting_buttion">
</div>
<div id="content">
<div  id="new1">
<a href="javascript:void(0);" onClick="newRegion('addcity.php')">ADD NEW City</a>


<h2>here the list of Citys</h2>
<table width="743px"   border="1em"  text-align='left' cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:#ccc;">
<tr bgcolor="#faebc4" class="onmouse" colspan="4"> 
<td  width=400><b>Name</b></td>
<th colspan='3'>Options</th>
</tr>
<?php
$sql=mysql_query("SELECT * FROM wp_region");


while($row1 = mysql_fetch_array( $sql))
{
	
	?>
		<tr class="act">
		<td><font color="#000000" face="segoe ui" size="2"><?php echo $row1['region_name'];?></font></td>
		<?php 
		if($uid=='1')
		{
		?>
		
		<td><a href="deletecity.php?region_id=<?php echo $row1['region_id'] ?>">Delete</a></font></td>
		<?php
		}?>
		</tr>
	<?php
}
	?>
</table>


		
</div>
</div>
</div>


</div>



</body>
</html>