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
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript">
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
<option>All Properties</option>
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
<li class="active">  <a href="dashboard.php">Dashboard</a></li>
<li><a href="inventorygrid.php">Inventory</a></li>
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
<div id="reporting_buttion">
</div>
<div id="content">

  
  

<!-- Button to trigger modal 
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
 
 Modal 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>		
  -->
   


		
</div></div>
</div>


</div>



</body>
</html>