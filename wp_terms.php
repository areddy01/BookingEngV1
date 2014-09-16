<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
$ppro_id=$_REQUEST['ppro_id'];
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
<div  id="terms" >
<?php

$result = mysql_query("SELECT terms_and_conditions FROM wp_properties where ppro_id='$ppro_id'")
or die(mysql_error());
$m=mysql_fetch_array($result);
 $terms=$m['terms_and_conditions'];
?>
<!-- Form Code Start -->


<form id="signupForm"  method='post'  name='form' action="wp_updateterms.php" onsubmit="return validate(this);">
 <p class="contact"><label for="name">Please List the Terma and Conditions to be listed on the website and included at the bottom of conformation email at the Time of Booking.</label></p>
   <textarea style="width:700px; height:200px;" name="terms" required=" "  ><?php echo $terms;?></textarea>
    <input type="hidden" name="ppro_id" value="<?php echo $ppro_id;?>">
     <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SAVE"  /><input class="button" type="submit"  name="cancel" value="CANCEL"  />
     </label></p></form>
</div>


</body>
</html>