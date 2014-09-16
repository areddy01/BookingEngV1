<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
 require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$user_id = $_GET['user_id'];
$edit_property = mysql_query("SELECT * FROM wp_properties WHERE ppro_id='$ppro_id'")
or die(mysql_error());
$edit = mysql_fetch_array($edit_property);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
<div id="content"> 
<div  id="new">
 Change Password</div>
</div>
<!-- Form Code Start -->
<div  class="form">
<form id='register'  method='post' name='form' action="wp_updatepwd.php" onsubmit="return validate1(this);">
<input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
    <p class="contact"><label for="name">Old Password:</label></p>
    <input type='text' name='opwd' id='opwd' required=" " maxlength="50" value="" />
	
    <p class="contact"><label for="name">New Password:</label></p>
   <input type='text' name='npwd' id='npwd' required=" " maxlength="50" value="" />
    <p class="contact"><label for="name">Conform Password:</label></p>
    <input type='text' name='cpwd' id='cpwd' required=" " maxlength="50" value="" /><br><br>
     <input class="button" type="submit"  name="SUBMIT" value="SUBMIT" />
   
	

</form>
</div>
</div>


</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>