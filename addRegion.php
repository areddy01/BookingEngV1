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

</head>
<body>
<div  id="new1">
Add Regions
</div>
<div  class="form">

  <form id='register'  method='post'  name='form' action="wp_areainsert.php">
   <p class="contact"><label for='country' >Country:</label></p>
   <select name="country" id="country" onChange="changeCity('changecountry.php?id='+this.value)" style="width:400px; height:27px;">
    <option selected="selected">--Select Country--</option>
    <?php
$sql=mysql_query("select * from wp_countrys ");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['cid'].'">'.$row['country_name'].'</option>';
 } ?>
  </select>
<p class="contact"><label for='country' >Region:</label></p>
  <input type='text' name='region' id='region'  maxlength="50" onBlur="checkSb(this.value)"/>
 
   <input class="button" type="submit"  name="SUBMIT" value="Add"  />
   </form>
</div>

</body>
</html>