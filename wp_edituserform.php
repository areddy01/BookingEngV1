<?php
@session_start();
require_once('functions.php');
require_once('connection.php');
$user=new User(); 

if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}


$sele=$_SESSION['sele'];
 if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$sele=$_REQUEST['sele'];
	$_SESSION['sele']=$sele;
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wotusee</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/inclusions.css" rel="stylesheet" type="text/css" />
<link href="css/bokkingform.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/properties.js"></script>
<script type="text/javascript" src="js/jquery1.4.2.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>
  <link href="css/main.css" rel="stylesheet" type="text/css" /></head>

<body>
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

<form id="selfrm" name="frm" action="" method="post" >
<?php
$book_id=$_REQUEST['bookid'];
$uid=$_SESSION['id'];
$result = mysql_query("SELECT * FROM wp_properties")
or die(mysql_error());
?><div id="currenty_managing">
<div id="text_currenty_managing">Currenty Managing</div>
<div id="select_box">

<select id="ddlViewBy" name="sele" onChange="this.form.submit();" class="select_1" >
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
   <option value="<?php echo $row['ppro_id'];?>" <?php echo $select; ?> > <?php echo $row['Name'];?> </option>
  
<?php
 }
  

 ?>


</select>

</div></div></form></div>
<div id="main_content">
<div  style="  width:400px; height:40px; border: 1px solid #ccc;
    background-color: #F7F7F7;
    margin: 10px 0px 0px 250px;">
You are here:&nbsp;&nbsp;<span><a href="dashboard.php"><img src="images/desktop.png" />Dashboard</a></span>&nbsp;&nbsp;<img src="images/ForwardGreen.png" />&nbsp;&nbsp;
    <span><a href="settings.php"><img src="images/system.png"/>Settings</a></span></div><br>
<div id="navigation">
<ul>
<li>  <a href="dashboard.php">Dashboard</a></li>
<li> <a href="inventorygrid.php">Inventory</a></li>


<li><a href="propertysettings.php">Properties</a></li>
<li class="active"> <a href="settings.php"> Forms</a></li>
<li> <a href="user.php">Profile</a></li>




</ul>

</div>

<div id="reporting_buttion">
<ul>
<li > <a href="#">Step 1</a></li><li class="active"> <a href="">Create Newform</a></li></ul></div>
<?php

$qry=mysql_query("SELECT Distinct Name FROM wp_userforms WHERE book_id='$book_id' and user_id='$uid'");
$mm=mysql_fetch_array($qry);?>
<form  method='post'  name='form' action="wp_updateform.php">
    <table border="1" align="left" >
    <tr><td>
    <p class="contact"><label for="name">New Form Title:</label></p></td><td>
    <input type='text' name='name' id='name' required=" " value="<?php echo $mm['Name'];?>" maxlength="50"  /></td></tr>
     <input type='hidden' name='user_id' id='user_id' value=<?php echo  $_SESSION['id'];?>  maxlength="50"  />
      <input type='hidden' name='book_id'  value=<?php echo  $book_id;?> />
	 <tr><td colspan="2"> <p class="contact"><label for="name">Please select which Property you would like to include onthe Form</label></p></td></tr>
	 <?php   
	
	 $vvvv=mysql_query("SELECT distinct wp_properties.ppro_id,wp_properties.Name,wp_manage_mappings.ppro_id FROM wp_properties left join wp_manage_mappings on wp_properties.ppro_id=wp_manage_mappings.ppro_id where wp_manage_mappings.user_id='$uid'");
	    $c=mysql_query("SELECT Distinct ppro_id FROM wp_userforms WHERE book_id='$book_id' and user_id='$uid'");
	    $c=mysql_query("SELECT Distinct ppro_id FROM wp_userforms WHERE book_id='$book_id' and user_id='$uid'");
$ppd=array();
while($m=mysql_fetch_array($c)){ 
$ppd[]=$m['ppro_id'];
}



	   while($row=mysql_fetch_array($vvvv))
	   {
	   ?>
	     
	 <tr> <td colspan="2"> <input type="checkbox" name="ppro_id[]" value="<?php echo $row['ppro_id'];?>" <?php if (in_array($row['ppro_id'],$ppd))
  {
  echo "checked=='checked'";
 
  }else{
  }?>
 ><?php echo $row['Name'];?></td></tr>
	  
	
	  <?php
	  }?>
    
  
       <tr><td><p class="contact"><label for="name"><input class="button" type="submit"  name="cancel" value="Cancel"  /></td><td> <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="NEXT"  /></td></tr></table>
  

</form>

</body>
</body>
</html>