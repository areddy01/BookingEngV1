<?php
@session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>fitow</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/properties.js">
</script>



</head>
<body>
<div  id="new">
 NEW BookingForm
</div>
<!-- Form Code Start -->
<div  class="form">
<form id='register'  method='post'  name='form' action="wp_bforminsert.php">
    
    <p class="contact"><label for="name">BookingForm Name:</label></p>
    <input type='text' name='name' id='name' required=" " maxlength="50"  />
     <input type='hidden' name='user_id' id='user_id' value=<?php echo  $_SESSION['id'];?>  maxlength="50"  />
      <input type='hidden' name='book_id'  value=<?php echo  rand();?> />
	
    <p class="contact"><label for="name">BookingForm Mode:</label></p>
  <input type='text' name='mode' id='username' value="Account" required=" " maxlength="50" />
  
        <p class="contact"><label for="name"><input class="button" type="submit"  name="SUBMIT" value="SUBMIT"  />
  

</form>
</div>

</body>
</html>

